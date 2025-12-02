<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\Post;
use App\Services\SiteMetaService;

class GalleryController extends Controller
{
    public function __construct(private SiteMetaService $meta)
    {
    }

    public function index(\Illuminate\Http\Request $request)
    {
        $galleries = Gallery::query()
            ->with(['items' => fn ($query) => $query->orderBy('order_num'), 'extracurricular'])
            ->where('status', 'published')
            ->when($request->filled('extracurricular'), function ($query) use ($request) {
                $slug = $request->get('extracurricular');
                $extraId = Extracurricular::where('slug', $slug)->value('id');
                if ($extraId) {
                    $query->where('extracurricular_id', $extraId);
                }
            })
            ->when($request->get('q'), fn ($query, $term) => $query->where('title', 'like', "%{$term}%"))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $recentPosts = Post::published()
            ->where(function($query) {
                $query->where('post_type', '!=', 'announcement')
                      ->orWhereNull('post_type');
            })
            ->with(['category'])
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('galleries.index', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'galleries' => $galleries,
            'extracurriculars' => Extracurricular::all(),
            'recentPosts' => $recentPosts,
            'selectedExtra' => $request->get('extracurricular'),
            'search' => $request->get('q'),
        ]);
    }

    public function show(Gallery $gallery)
    {
        abort_if($gallery->status !== 'published', 404);

        $gallery->load([
            'items' => fn ($query) => $query->orderBy('order_num'), 
            'extracurricular', 
            'author',
            'comments' => fn($q) => $q->where('is_approved', true)->latest()
        ]);
        $gallery->loadCount(['comments' => fn($q) => $q->where('is_approved', true)]);
        
        // Increment views
        $gallery->increment('view_count');

        // Get recent galleries
        $recent_galleries = Gallery::query()
            ->with(['items' => fn($q) => $q->orderBy('order_num')->limit(1)])
            ->where('status', 'published')
            ->whereKeyNot($gallery->id)
            ->latest('created_at')
            ->take(5)
            ->get();

        // Get popular galleries (by view count)
        $popular_galleries = Gallery::query()
            ->with(['items' => fn($q) => $q->orderBy('order_num')->limit(1)])
            ->where('status', 'published')
            ->whereKeyNot($gallery->id)
            ->orderByDesc('view_count')
            ->take(5)
            ->get();

        $recentPosts = Post::published()
            ->where(function($query) {
                $query->where('post_type', '!=', 'announcement')
                      ->orWhereNull('post_type');
            })
            ->with(['category'])
            ->latest('published_at')
            ->take(6)
            ->get();

        $extracurriculars = Extracurricular::with(['galleries.items' => function($query) {
            $query->orderBy('order_num')->limit(1);
        }])->get();

        return view('galleries.show', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'gallery' => $gallery,
            'recent_galleries' => $recent_galleries,
            'popular_galleries' => $popular_galleries,
            'reactions' => \App\Models\ReactionType::all(),
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }

    public function storeComment(\Illuminate\Http\Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:150',
            'author_email' => 'required|email|max:150',
            'content' => 'required|string|max:1000',
        ]);

        $gallery->comments()->create([
            'author_name' => $validated['author_name'],
            'author_email' => $validated['author_email'],
            'content' => $validated['content'],
            'is_approved' => true, // Auto-approve for demo purposes
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }
}
