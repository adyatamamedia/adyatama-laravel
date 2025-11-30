<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\GuruStaff;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::published()->with(['featuredMedia', 'author'])->latest('updated_at')->get();
        $galleries = Gallery::with(['items'])->latest('updated_at')->get();
        $pages = Page::latest('updated_at')->get();
        $guruStaff = GuruStaff::active()->latest('updated_at')->get();

        return response()->view('sitemap.index', [
            'posts' => $posts,
            'galleries' => $galleries,
            'pages' => $pages,
            'guruStaff' => $guruStaff,
        ])->header('Content-Type', 'text/xml');
    }
}
