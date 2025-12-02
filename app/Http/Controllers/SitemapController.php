<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\GuruStaff;
use App\Models\User;
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
        
        // Get authors who have published posts or galleries
        $authors = User::where('status', 'active')
            ->where(function($query) {
                $query->whereHas('posts', fn($q) => $q->published())
                      ->orWhereHas('galleries', fn($q) => $q->where('status', 'published'));
            })
            ->latest('updated_at')
            ->get();

        return response()->view('sitemap.index', [
            'posts' => $posts,
            'galleries' => $galleries,
            'pages' => $pages,
            'guruStaff' => $guruStaff,
            'authors' => $authors,
        ])->header('Content-Type', 'text/xml');
    }
}
