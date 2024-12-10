<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
// Menampilkan halaman detail post
Route::get('/post/{slug}', [MainController::class, 'show'])->name('post.show');
// Rute untuk menampilkan halaman utama blog atau daftar postingan
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
