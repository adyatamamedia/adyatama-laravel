<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Post;
use App\Services\SiteMetaService;

class ExtracurricularController extends Controller
{
    public function __construct(private SiteMetaService $meta)
    {
    }

    public function index()
    {
        $extracurriculars = Extracurricular::with(['galleries.items' => function($query) {
            $query->orderBy('order_num')->limit(1);
        }])->get();

        $recentPosts = Post::published()
            ->with(['category'])
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('extracurriculars.index', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'extracurriculars' => $extracurriculars,
            'recentPosts' => $recentPosts,
        ]);
    }
}
