<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\PublicController;

Route::get('/berita', [PublicController::class, 'beritaIndex'])->name('berita.index');
Route::get('/profil', [PublicController::class, 'profilIndex'])->name('profil.index');
Route::get('/layanan', [PublicController::class, 'layananIndex'])->name('layanan.index');
Route::get('/kontak', [PublicController::class, 'kontakIndex'])->name('kontak.index');

Route::get('/berita/{slug}', [PublicController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/kategori/{slug}', [PublicController::class, 'kategoriDetail'])->name('kategori.detail');
Route::get('/halaman/{slug}', [PublicController::class, 'halamanDetail'])->name('halaman.detail');
Route::get('/galeri/foto', [PublicController::class, 'galeriFoto'])->name('galeri.foto');
Route::get('/galeri/video', [PublicController::class, 'galeriVideo'])->name('galeri.video');
