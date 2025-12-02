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
            'guru' => GuruStaff::active()
                ->whereIn('status', ['guru', 'kepala-sekolah'])
                ->orderByRaw("CASE WHEN status = 'kepala-sekolah' THEN 0 ELSE 1 END, nama_lengkap ASC")
                ->get(),
            'staff' => GuruStaff::active()
                ->whereIn('status', [
                    'staff', 
                    'tenaga-administrasi', 
                    'tenaga-perpustakaan', 
                    'tenaga-laboratorium', 
                    'tenaga-kebersihan', 
                    'tenaga-keamanan', 
                    'bendahara', 
                    'operator'
                ])
                ->orderBy('nama_lengkap')
                ->get(),
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
