<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Extracurricular;
use App\Models\Post;
use App\Models\Tag;
use App\Models\ReactionType;
use App\Services\SiteMetaService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private SiteMetaService $meta)
    {
    }

    public function index(Request $request)
    {
        $posts = Post::published()
            ->with(['category', 'featuredMedia'])
            ->when($request->get('category'), function ($query, $slug) {
                $categoryId = Category::where('slug', $slug)->value('id');
                if ($categoryId) {
                    $query->where('category_id', $categoryId);
                }
            })
            ->when($request->get('q'), fn ($query, $term) => $query->where('title', 'like', "%{$term}%"))
            ->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();

        $recentPosts = Post::published()
            ->with(['category'])
            ->latest('published_at')
            ->take(6)
            ->get();

        $extracurriculars = Extracurricular::with(['galleries.items' => function($query) {
            $query->orderBy('order_num')->limit(1);
        }])->get();

        return view('posts.index', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'posts' => $posts,
            'categories' => Category::all(),
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
            'selectedCategory' => $request->get('category'),
            'search' => $request->get('q'),
        ]);
    }

    public function announcements(Request $request)
    {
        $posts = Post::published()
            ->where('post_type', 'announcement')
            ->with(['category', 'featuredMedia'])
            ->orderByDesc('published_at')
            ->paginate(10)
            ->withQueryString();

        $recentPosts = Post::published()
            ->with(['category'])
            ->latest('published_at')
            ->take(6)
            ->get();

        $extracurriculars = Extracurricular::with(['galleries.items' => function($query) {
            $query->orderBy('order_num')->limit(1);
        }])->get();

        return view('posts.announcements', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'posts' => $posts,
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }

    public function show(Post $post)
    {
        abort_if($post->status !== 'published', 404);

        // Increment view count
        $post->increment('view_count');

        $post->load([
            'author', 
            'category', 
            'tags', 
            'featuredMedia', 
            'comments' => fn($q) => $q->with('replies')->whereNull('parent_id')->latest()
        ]);
        $post->loadCount(['comments' => fn($q) => $q->whereNull('parent_id')]); // Count only parent comments
        
        $related = Post::published()
            ->with('featuredMedia')
            ->where('category_id', $post->category_id)
            ->whereKeyNot($post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $recent_posts = Post::published()
            ->with(['featuredMedia', 'category'])
            ->whereKeyNot($post->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $popular_posts = Post::published()
            ->with(['featuredMedia', 'category'])
            ->whereKeyNot($post->id)
            ->orderByDesc('view_count')
            ->take(5)
            ->get();

        $recentPosts = Post::published()
            ->with(['category'])
            ->latest('published_at')
            ->take(6)
            ->get();
            
        $categories = Category::whereHas('posts', fn($q) => $q->where('status', 'published'))
            ->withCount(['posts' => fn($q) => $q->where('status', 'published')])
            ->get();
            
        $tags = Tag::select('name', 'slug')
            ->distinct()
            ->limit(20)
            ->get();

        // Load reactions with counts
        $reactionsWithCounts = ReactionType::withCount(['postReactions' => function($q) use ($post) {
            $q->where('post_id', $post->id);
        }])->get()->map(function($reaction) {
            $reaction->reactions_count = $reaction->post_reactions_count;
            return $reaction;
        });

        $extracurriculars = Extracurricular::with(['galleries.items' => function($query) {
            $query->orderBy('order_num')->limit(1);
        }])->get();

        return view('posts.show', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'post' => $post,
            'related' => $related,
            'recent_posts' => $recent_posts,
            'popular_posts' => $popular_posts,
            'categories' => $categories,
            'tags' => $tags,
            'reactions' => $reactionsWithCounts,
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }

    public function storeComment(Request $request, Post $post)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:150',
            'author_email' => 'required|email|max:150',
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $post->comments()->create([
            'author_name' => $validated['author_name'],
            'author_email' => $validated['author_email'],
            'content' => $validated['content'],
            'parent_id' => $validated['parent_id'] ?? null,
            'is_approved' => true, // Auto-approve for demo purposes
        ]);

        $message = $validated['parent_id'] ? 'Balasan berhasil dikirim.' : 'Komentar berhasil dikirim.';
        
        return back()->with('success', $message);
    }

    public function addReaction(Request $request, Post $post)
    {
        $validated = $request->validate([
            'reaction_type_id' => 'required|exists:reaction_types,id',
        ]);

        // Create or update reaction based on session/IP
        $sessionId = session()->getId();
        $ipAddress = $request->ip();

        $post->postReactions()->create([
            'reaction_type_id' => $validated['reaction_type_id'],
            'session_id' => $sessionId,
            'ip_address' => $ipAddress,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reaksi berhasil ditambahkan',
        ]);
    }
}
