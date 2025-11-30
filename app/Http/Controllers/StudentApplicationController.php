<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentApplicationRequest;
use App\Models\Extracurricular;
use App\Models\Post;
use App\Models\StudentApplication;
use App\Services\SiteMetaService;
use Illuminate\Support\Facades\DB;

class StudentApplicationController extends Controller
{
    public function __construct(private SiteMetaService $meta)
    {
    }

    public function create()
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

        return view('registration.index', [
            'settings' => $this->meta->settings(),
            'navigation' => $this->meta->navigation(),
            'recentPosts' => $recentPosts,
            'extracurriculars' => $extracurriculars,
        ]);
    }

    public function store(StoreStudentApplicationRequest $request)
    {
        $data = $request->validated();

        foreach (['dokumen_kk', 'dokumen_akte', 'pas_foto', 'foto_ijazah'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $fileName = time() . '_' . $request->file($fileField)->getClientOriginalName();
                $targetPath = base_path('dash/public/uploads/pendaftaran');
                $request->file($fileField)->move($targetPath, $fileName);
                $data[$fileField] = 'dash/public/uploads/pendaftaran/' . $fileName;
            }
        }

        $application = StudentApplication::create($data);

        DB::table('activity_log')->insert([
            'user_id' => null,
            'action' => 'student_application.created',
            'subject_type' => StudentApplication::class,
            'subject_id' => $application->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'meta' => json_encode(['nama_lengkap' => $application->nama_lengkap]),
            'created_at' => now(),
        ]);

        return redirect()->route('registration.create')->with('success', 'Pendaftaran berhasil dikirim. Tim kami akan menghubungi Anda.');
    }
}
