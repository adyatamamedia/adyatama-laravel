<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuruStaffController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/media/uploads/{path}', [MediaController::class, 'show'])
    ->where('path', '.*')
    ->name('media.show');

Route::get('/', HomeController::class)->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{post:slug}/comments', [PostController::class, 'storeComment'])->name('comments.store');
Route::post('/posts/{post}/reactions', [PostController::class, 'addReaction'])->name('posts.reactions.store');
Route::get('/pengumuman', [PostController::class, 'announcements'])->name('posts.announcements');

Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/{gallery:slug}', [GalleryController::class, 'show'])->name('galleries.show');
Route::post('/galleries/{gallery:slug}/comments', [GalleryController::class, 'storeComment'])->name('gallery.comments.store');

Route::get('/ekstrakurikuler', [ExtracurricularController::class, 'index'])->name('extracurriculars.index');
Route::get('/guru-staff', [GuruStaffController::class, 'index'])->name('guru-staff.index');
Route::get('/guru-staff/{guruStaff}', [GuruStaffController::class, 'show'])->name('guru-staff.show');

Route::get('/page/{page:slug}', [PageController::class, 'show'])->name('pages.show');
Route::get('/kontak', ContactController::class)->name('contact');

Route::get('/daftar-online', [StudentApplicationController::class, 'create'])->name('registration.create');
Route::post('/daftar-online', [StudentApplicationController::class, 'store'])->name('registration.store');
