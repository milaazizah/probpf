<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Guru\GuruDashboardController;
use App\Http\Controllers\Guru\JadwalController;
use App\Http\Controllers\Guru\KehadiranController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\Guru\MateriController;

Route::get('/', function () {
    return redirect()->route('login');
});


// Rute Auth (Login & Logout)
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route Group untuk Role Guru
Route::middleware(['auth', 'role.guru:guru'])->prefix('guru')->group(function () {
    
    // 1. Dashboard Guru 
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('guru.dashboard');

    // 2. Route CRUD Jadwal 
    Route::resource('jadwal', JadwalController::class)->names('guru.jadwal');
    
    // 3. Route CRUD Kehadiran 
    Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('guru.kehadiran.index');
    Route::get('/kehadiran/{jadwal}/absen', [KehadiranController::class, 'showFormAbsensi'])->name('guru.kehadiran.absensi');
    Route::post('/kehadiran/{jadwal}/store', [KehadiranController::class, 'store'])->name('guru.kehadiran.store');
    // 4. Route CRUD Nilai 
    Route::get('/nilai', [NilaiController::class, 'index'])->name('guru.nilai.index');
    Route::get('/nilai/{jadwal}/input', [NilaiController::class, 'showFormInput'])->name('guru.nilai.input');
    Route::post('/nilai/{jadwal}/store', [NilaiController::class, 'store'])->name('guru.nilai.store');
    // 5. Route Materi Pembelajaran  
    Route::resource('materi', App\Http\Controllers\Guru\MateriController::class)->names('guru.materi');
});

Route::middleware(['auth'])->prefix('siswa')->group(function () { 
    
    // Dashboard Siswa (Materi, Nilai, Kehadiran)
    Route::get('/', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'index'])->name('siswa.dashboard');
    
    // Halaman Detail
    Route::get('/materi', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'materiDetail'])->name('siswa.materi');
    Route::get('/nilai', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'nilaiDetail'])->name('siswa.nilai');
    Route::get('/kehadiran', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'kehadiranDetail'])->name('siswa.kehadiran');

    Route::get('/materi/{id}', [App\Http\Controllers\Siswa\DashboardSiswaController::class, 'showMateri'])->name('siswa.materi.show');
    
});