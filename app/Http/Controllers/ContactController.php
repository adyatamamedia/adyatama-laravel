<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Post;
use App\Services\SiteMetaService;

class ContactController extends Controller
{
    public function __construct(private SiteMetaService $meta)
    {
    }

    public function __invoke()
    {
        $settings = $this->meta->settings();

        $recentPosts = Post::published()
            ->with(['category'])
            ->latest('published_at')
            ->take(6)
            ->get();

        $extracurriculars = Extracurricular::with(['galleries.items' => function($query) {
            $query->orderBy('order_num')->limit(1);
        }])->get();

        return view('contact.index', [
            'settings' => $settings,
            'navigation' => $this->meta->navigation(),
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }
}
