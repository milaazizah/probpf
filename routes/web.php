<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Guru\JadwalController;
use App\Http\Controllers\Guru\MateriController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Guru\KehadiranController;
use App\Http\Controllers\Admin\AdminGuruController;
use App\Http\Controllers\Guru\GuruDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;

// ========================
// Halaman Publik
// ========================
Route::get('/', fn() => view('home'))->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/products', 'products')->name('products.public');
Route::view('/testimonials', 'testimonials')->name('testimonials');
Route::view('/contact', 'contact')->name('contact');

// ========================
// Auth Routes (Login & Register)
// ========================

// Route untuk menampilkan avatar, bisa diakses publik
Route::get('/avatar/{filename}', [App\Http\Controllers\ProfileController::class, 'showAvatar'])
    ->name('avatar.show');

Route::middleware('guest')->group(function () {
    // Login dengan Google
Route::get('/auth/redirect-google', [LoginController::class, 'redirectToGoogle'])->name('redirect.google');
// Gunakan ini
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);


    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register Calon Siswa
    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ========================
// Guru Routes
// ========================
Route::middleware(['auth', 'role.guru'])->prefix('guru')->name('guru.')->group(function () {

    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');

    Route::resource('jadwal', JadwalController::class);

    Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadiran.index');
    Route::get('/kehadiran/{jadwal}/absen', [KehadiranController::class, 'showFormAbsensi'])->name('kehadiran.absensi');
    Route::post('/kehadiran/{jadwal}/store', [KehadiranController::class, 'store'])->name('kehadiran.store');

    Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
    Route::get('/nilai/{jadwal}/input', [NilaiController::class, 'showFormInput'])->name('nilai.input');
    Route::post('/nilai/{jadwal}/store', [NilaiController::class, 'store'])->name('nilai.store');

    Route::resource('materi', MateriController::class);
});

// ========================
// Siswa Routes
// ========================
Route::middleware(['auth', 'role.siswa'])->prefix('siswa')->name('siswa.')->group(function () {

    Route::get('/', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'index'])->name('dashboard');

    Route::get('/materi', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'materiDetail'])->name('materi');
    Route::get('/materi/{id}', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'showMateri'])->name('materi.show');

    Route::get('/nilai', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'nilaiDetail'])->name('nilai');
    Route::get('/kehadiran', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'kehadiranDetail'])->name('kehadiran');
});

// ========================
// Admin Routes
// ========================
Route::middleware(['auth', 'role.admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('guru', AdminGuruController::class);
        Route::resource('siswa', SiswaController::class);

        // ====== PENDAFTARAN SISWA BARU ======
        Route::get('/pendaftaran', [AdminDashboardController::class, 'listCalon'])
            ->name('pendaftaran.index');

        Route::post('/pendaftaran/{id}/approve', [AdminDashboardController::class, 'approve'])
            ->name('pendaftaran.approve');

        Route::post('/pendaftaran/{id}/decline', [AdminDashboardController::class, 'decline'])
            ->name('pendaftaran.decline');
    });

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
