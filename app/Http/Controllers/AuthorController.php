<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Post;
use App\Models\User;
use App\Services\SiteMetaService;

class AuthorController extends Controller
{
    public function __construct(private SiteMetaService $meta)
    {
    }

    public function index()
    {
        // Get all users with their published posts count
        $authors = User::withCount(['posts' => function($query) {
                $query->where('status', 'published');
            }])
            ->orderBy('fullname')
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

        return view('authors.index', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'authors' => $authors,
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }

    public function show(User $user)
    {
        // Get published posts by this author (exclude announcements)
        $posts = Post::where('author_id', $user->id)
            ->where('status', 'published')
            ->where(function($query) {
                $query->where('post_type', '!=', 'announcement')
                      ->orWhereNull('post_type');
            })
            ->with(['category', 'featuredMedia'])
            ->latest('published_at')
            ->paginate(12);

        // Get published announcements by this author
        $announcements = Post::where('author_id', $user->id)
            ->where('status', 'published')
            ->where('post_type', 'announcement')
            ->with(['category', 'featuredMedia'])
            ->latest('published_at')
            ->paginate(12);

        // Get galleries by this author
        $galleries = \App\Models\Gallery::where('author_id', $user->id)
            ->where('status', 'published')
            ->with('items')
            ->latest()
            ->paginate(12);

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

        return view('authors.show', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'author' => $user,
            'posts' => $posts,
            'announcements' => $announcements,
            'galleries' => $galleries,
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }
}
