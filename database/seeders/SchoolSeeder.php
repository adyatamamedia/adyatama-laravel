<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\GalleryItem;
use App\Models\GuruStaff;
use App\Models\Media;
use App\Models\Page;
use App\Models\Post;
use App\Models\ReactionType;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $roles = collect([
                ['name' => 'super_admin', 'description' => 'Super Administrator - all permissions'],
                ['name' => 'operator', 'description' => 'Operator - manage content & master data'],
                ['name' => 'guru', 'description' => 'Guru - create/edit own posts'],
            ])->mapWithKeys(fn ($role) => [
                $role['name'] => DB::table('roles')->updateOrInsert(
                    ['name' => $role['name']],
                    ['description' => $role['description']]
                )
            ]);

            $permissions = [
                ['name' => 'posts.create', 'label' => 'Buat Post', 'resource' => 'posts', 'action' => 'create', 'description' => 'Membuat artikel/pengumuman'],
                ['name' => 'posts.edit', 'label' => 'Edit Post', 'resource' => 'posts', 'action' => 'update', 'description' => 'Mengedit artikel/pengumuman'],
                ['name' => 'posts.delete', 'resource' => 'posts', 'action' => 'delete', 'description' => 'Menghapus artikel/pengumuman'],
                ['name' => 'posts.publish', 'resource' => 'posts', 'action' => 'publish', 'description' => 'Mempublikasikan artikel/pengumuman'],
                ['name' => 'users.manage', 'resource' => 'users', 'action' => 'manage', 'description' => 'CRUD user & role'],
                ['name' => 'galleries.manage', 'resource' => 'galleries', 'action' => 'manage', 'description' => 'CRUD galeri'],
                ['name' => 'pages.manage', 'resource' => 'pages', 'action' => 'manage', 'description' => 'CRUD halaman statis'],
            ];

            foreach ($permissions as $permission) {
                DB::table('permissions')->updateOrInsert(
                    ['name' => $permission['name']],
                    $permission
                );
            }

            $permissionIds = DB::table('permissions')->pluck('id', 'name');

            $rolePermissionMap = [
                'super_admin' => $permissionIds->values()->all(),
                'operator' => $permissionIds->only(['posts.create', 'posts.edit', 'posts.publish', 'galleries.manage', 'pages.manage'])->values()->all(),
                'guru' => $permissionIds->only(['posts.create', 'posts.edit'])->values()->all(),
            ];

            foreach ($rolePermissionMap as $roleName => $permissionList) {
                $roleId = DB::table('roles')->where('name', $roleName)->value('id');
                foreach ($permissionList as $permissionId) {
                    DB::table('role_permissions')->updateOrInsert(
                        ['role_id' => $roleId, 'permission_id' => $permissionId],
                        []
                    );
                }
            }

            $adminId = User::query()->updateOrCreate(
                ['username' => 'admin'],
                [
                    'email' => 'admin@adyatama.school',
                    'password_hash' => Hash::make('admin123'),
                    'fullname' => 'Administrator',
                    'role_id' => DB::table('roles')->where('name', 'super_admin')->value('id'),
                    'status' => 'active',
                ]
            )->id;

            $category = Category::query()->firstOrCreate(
                ['slug' => 'berita'],
                ['name' => 'Berita', 'description' => 'Kategori berita umum']
            );

            $heroPost = Post::query()->firstOrCreate(
                ['slug' => 'selamat-datang'],
                [
                    'author_id' => $adminId,
                    'category_id' => $category->id,
                    'post_type' => 'article',
                    'title' => 'Selamat Datang di ADYATAMA SCHOOL',
                    'excerpt' => 'Pengantar singkat...',
                    'content' => '<p>Selamat datang di website ADYATAMA SCHOOL...</p>',
                    'status' => 'published',
                    'published_at' => now(),
                ]
            );

            // Create featured media with caption
            $featuredMedia = Media::query()->firstOrCreate(
                ['path' => '/uploads/hero-image.jpg'],
                [
                    'origin_post_id' => $heroPost->id,
                    'type' => 'image',
                    'caption' => 'Suasana pembelajaran di ADYATAMA SCHOOL yang kondusif dan menyenangkan',
                    'order_num' => 0,
                ]
            );

            // Update post with featured_media_id if not set
            if (!$heroPost->featured_media_id) {
                $heroPost->update(['featured_media_id' => $featuredMedia->id]);
            }

            Tag::query()->firstOrCreate([
                'post_id' => $heroPost->id,
                'slug' => 'profil',
            ], [
                'name' => 'Profil',
            ]);

            foreach ([
                ['code' => 'like', 'emoji' => '👍', 'label' => 'Like'],
                ['code' => 'love', 'emoji' => '❤️', 'label' => 'Love'],
                ['code' => 'haha', 'emoji' => '😂', 'label' => 'Haha'],
                ['code' => 'sad', 'emoji' => '😢', 'label' => 'Sad'],
                ['code' => 'angry', 'emoji' => '😡', 'label' => 'Angry'],
            ] as $reaction) {
                ReactionType::query()->updateOrCreate(
                    ['code' => $reaction['code']],
                    $reaction
                );
            }

            foreach ([
                ['key_name' => 'site_name', 'value' => 'ADYATAMA SCHOOL', 'description' => 'Nama situs'],
                ['key_name' => 'site_description', 'value' => 'Website resmi ADYATAMA SCHOOL', 'type' => 'textarea'],
                ['key_name' => 'logo', 'value' => '/uploads/logo.png', 'type' => 'image'],
                ['key_name' => 'favicon', 'value' => '/uploads/favicon.ico', 'type' => 'image'],
                ['key_name' => 'address', 'value' => 'Jl. Contoh No.1, Kota', 'group_name' => 'contact'],
                ['key_name' => 'phone', 'value' => '081234567890', 'group_name' => 'contact'],
                ['key_name' => 'email', 'value' => 'info@adyatama.school', 'group_name' => 'contact'],
                ['key_name' => 'whatsapp', 'value' => '628123456789', 'group_name' => 'contact'],
            ] as $setting) {
                Setting::query()->updateOrCreate(
                    ['key_name' => $setting['key_name']],
                    $setting
                );
            }

            Extracurricular::query()->firstOrCreate(
                ['name' => 'Pramuka'],
                ['description' => 'Kegiatan pramuka rutin setiap pekan.']
            );

            // Create multiple galleries
            $galleries = [
                [
                    'slug' => 'kegiatan-unggulan',
                    'title' => 'Kegiatan Unggulan',
                    'description' => 'Dokumentasi kegiatan unggulan siswa.',
                    'view_count' => 125,
                ],
                [
                    'slug' => 'kegiatan-pembelajaran',
                    'title' => 'Kegiatan Pembelajaran',
                    'description' => 'Dokumentasi proses belajar mengajar di kelas.',
                    'view_count' => 98,
                ],
                [
                    'slug' => 'ekstrakurikuler',
                    'title' => 'Ekstrakurikuler',
                    'description' => 'Beragam kegiatan ekstrakurikuler yang menarik.',
                    'view_count' => 156,
                ],
                [
                    'slug' => 'kegiatan-olahraga',
                    'title' => 'Kegiatan Olahraga',
                    'description' => 'Dokumentasi berbagai kegiatan olahraga siswa.',
                    'view_count' => 87,
                ],
                [
                    'slug' => 'lomba-dan-prestasi',
                    'title' => 'Lomba dan Prestasi',
                    'description' => 'Pencapaian dan prestasi siswa dalam berbagai lomba.',
                    'view_count' => 203,
                ],
            ];

            foreach ($galleries as $galleryData) {
                $gallery = Gallery::query()->firstOrCreate(
                    ['slug' => $galleryData['slug']],
                    [
                        'author_id' => $adminId,
                        'title' => $galleryData['title'],
                        'description' => $galleryData['description'],
                        'view_count' => $galleryData['view_count'],
                        'status' => 'published',
                    ]
                );

                // Add sample items only for the first gallery
                if ($galleryData['slug'] === 'kegiatan-unggulan') {
                    $galleryItems = [
                        ['path' => '/uploads/gallery/sample-1.jpg', 'caption' => 'Kegiatan belajar mengajar di kelas dengan metode interaktif', 'order_num' => 1],
                        ['path' => '/uploads/gallery/sample-2.jpg', 'caption' => 'Siswa sedang melakukan praktek laboratorium komputer', 'order_num' => 2],
                        ['path' => '/uploads/gallery/sample-3.jpg', 'caption' => 'Upacara bendera setiap hari Senin dengan khidmat', 'order_num' => 3],
                        ['path' => '/uploads/gallery/sample-4.jpg', 'caption' => 'Kegiatan ekstrakurikuler Pramuka di lapangan sekolah', 'order_num' => 4],
                        ['path' => '/uploads/gallery/sample-5.jpg', 'caption' => 'Lomba Matematika tingkat sekolah dengan antusias', 'order_num' => 5],
                        ['path' => '/uploads/gallery/sample-6.jpg', 'caption' => 'Perpustakaan sekolah dengan koleksi buku lengkap', 'order_num' => 6],
                        ['path' => '/uploads/gallery/sample-7.jpg', 'caption' => 'Kegiatan olahraga bersama di pagi hari', 'order_num' => 7],
                        ['path' => '/uploads/gallery/sample-8.jpg', 'caption' => 'Acara wisuda siswa kelas 6 yang meriah', 'order_num' => 8],
                    ];

                    foreach ($galleryItems as $item) {
                        GalleryItem::query()->firstOrCreate(
                            ['gallery_id' => $gallery->id, 'path' => $item['path']],
                            ['caption' => $item['caption'], 'order_num' => $item['order_num']]
                        );
                    }
                }
            }

            GuruStaff::query()->firstOrCreate(
                ['nama_lengkap' => 'Ustadz Ahmad'],
                [
                    'jabatan' => 'Kepala Sekolah',
                    'status' => 'guru',
                    'is_active' => true,
                ]
            );

            Page::query()->firstOrCreate(
                ['slug' => 'tentang-kami'],
                [
                    'title' => 'Tentang Kami',
                    'content' => '<p>ADYATAMA SCHOOL adalah lembaga pendidikan Islam terpadu...</p>',
                    'status' => 'published',
                ]
            );
        });
    }
}
