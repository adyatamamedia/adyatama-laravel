<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\GuruStaff;
use App\Models\Post;
use App\Services\SiteMetaService;

class HomeController extends Controller
{
    public function __construct(private SiteMetaService $meta)
    {
    }

    public function __invoke()
    {
        $settings = $this->meta->settings();

        $featuredPost = Post::published()
            ->where(function($query) {
                $query->where('post_type', '!=', 'announcement')
                      ->orWhereNull('post_type');
            })
            ->with(['category', 'author', 'featuredMedia'])
            ->latest('published_at')
            ->first();

        $latestPosts = Post::published()
            ->where(function($query) {
                $query->where('post_type', '!=', 'announcement')
                      ->orWhereNull('post_type');
            })
            ->with(['category', 'featuredMedia'])
            ->latest('published_at')
            ->take(8)
            ->get();

        $breakingNews = Post::published()
            ->where('post_type', 'announcement')
            ->latest('published_at')
            ->take(5)
            ->get();

        $announcements = Post::published()
            ->where('post_type', 'announcement')
            ->with('featuredMedia')
            ->latest('published_at')
            ->take(3)
            ->get();

        $galleries = Gallery::query()
            ->with('items')
            ->where('status', 'published')
            ->latest()
            ->take(6)
            ->get();

        $guru = GuruStaff::active()->where('status', 'guru')->take(4)->get();

        $extracurriculars = Extracurricular::with(['galleries.items' => function($query) {
            $query->orderBy('order_num')->limit(1);
        }])->get();

        return view('home', [
            'settings' => $settings,
            'featuredPost' => $featuredPost,
            'latestPosts' => $latestPosts,
            'recentPosts' => $latestPosts, // For navbar mega menu
            'breakingNews' => $breakingNews,
            'announcements' => $announcements,
            'galleries' => $galleries,
            'guru' => $guru,
            'navigation' => $this->meta->navigation(),
            'extracurriculars' => $extracurriculars,
        ]);
    }
}
