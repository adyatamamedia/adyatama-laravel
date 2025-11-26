<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Page;
use App\Models\Post;
use App\Services\SiteMetaService;

class PageController extends Controller
{
    public function __construct(private SiteMetaService $meta)
    {
    }

    public function show(Page $page)
    {
        abort_if($page->status !== 'published', 404);

        $recentPosts = Post::published()
            ->with(['category'])
            ->latest('published_at')
            ->take(6)
            ->get();

        $extracurriculars = Extracurricular::with(['galleries.items' => function($query) {
            $query->orderBy('order_num')->limit(1);
        }])->get();

        return view('pages.show', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'page' => $page,
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }
}
