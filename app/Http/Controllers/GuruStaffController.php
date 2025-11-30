<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\GuruStaff;
use App\Models\Post;
use App\Services\SiteMetaService;

class GuruStaffController extends Controller
{
    public function __construct(private SiteMetaService $meta)
    {
    }

    public function index()
    {
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

        return view('guru-staff.index', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'guru' => GuruStaff::active()->where('status', 'guru')->orderBy('nama_lengkap')->get(),
            'staff' => GuruStaff::active()->where('status', 'staff')->orderBy('nama_lengkap')->get(),
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }

    public function show($id)
    {
        $person = GuruStaff::active()->findOrFail($id);

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
        
        return view('guru-staff.show', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'person' => $person,
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }
}
