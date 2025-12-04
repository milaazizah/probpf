@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
    <h1 class="text-primary mb-4 fw-bold">
        <i class="fas fa-home me-2"></i> Selamat Datang, {{ Auth::user()->name }}!
    </h1>
    <p class="text-muted fs-5">Inilah ringkasan tugas dan perkembangan kelas Anda hari ini.</p>

    {{-- ============================================= --}}
    {{-- A. QUICK STATS (METRIK UTAMA) --}}
    {{-- ============================================= --}}
    <div class="row g-4 mb-5">
        
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm h-100 border-start border-4 border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-chalkboard fa-3x text-primary me-3"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 fw-bold">Kelas Diajar</p>
                            <h4 class="mb-0 fw-bold">{{ $totalKelasDiajar }} Kelas</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm h-100 border-start border-4 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-chart-bar fa-3x text-success me-3"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 fw-bold">Rata-Rata Nilai</p>
                            <h4 class="mb-0 fw-bold">
                                {{ $rataRataNilaiUmum ? number_format($rataRataNilaiUmum, 1) : '-' }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm h-100 border-start border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-book-open fa-3x text-info me-3"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 fw-bold">Materi Diunggah</p>
                            <h4 class="mb-0 fw-bold">{{ $totalMateri }} File</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm h-100 border-start border-4 border-secondary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-calendar-check fa-3x text-secondary me-3"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 fw-bold">Sesi Kehadiran</p>
                            <h4 class="mb-0 fw-bold">{{ $totalAbsensi }} Sesi (30 Hari)</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================= --}}
    {{-- B. ACTIONABLE INSIGHTS & KEHADIRAN HARI INI --}}
    {{-- ============================================= --}}
    <div class="row g-4">
        
        <div class="col-lg-6">
            <div class="card shadow-lg h-100 rounded-4">
                <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
                    <i class="fas fa-bell me-2"></i> Tugas & Jadwal Hari Ini
                </div>
                <div class="card-body">
                    
                    {{-- 1. Pengingat Nilai Tertunda --}}
                    @if (!empty($jadwalPerluInputNilai))
                        <div class="alert alert-warning border-start border-4 border-danger shadow-sm mb-3">
                            <h6 class="text-danger fw-bold"><i class="fas fa-exclamation-triangle me-1"></i> Perhatian: Nilai Tertunda</h6>
                            <p class="small mb-2">Ada {{ count($jadwalPerluInputNilai) }} jadwal yang nilai rata-ratanya belum terisi penuh:</p>
                            <ul class="mb-0 list-unstyled small">
                                @foreach ($jadwalPerluInputNilai as $jadwal)
                                    <li>
                                        <i class="fas fa-dot-circle me-1 text-danger"></i> 
                                        {{ $jadwal->mata_pelajaran }} ({{ $jadwal->kelas }})
                                        <a href="{{ route('guru.nilai.input', $jadwal->id) }}" class="badge bg-danger ms-2 text-decoration-none">Input Sekarang</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="alert alert-success shadow-sm mb-3">
                            <i class="fas fa-check-circle me-1"></i> **Luar Biasa!** Semua nilai perkembangan telah terisi.
                        </div>
                    @endif

                    <hr class="my-3">
                    
                    {{-- 2. Jadwal Hari Ini --}}
                    <h6 class="fw-bold text-dark mb-3">Jadwal Absensi Hari Ini ({{ $dayName }})</h6>
                    @forelse ($jadwalHariIni as $jadwal)
                        <div class="d-flex align-items-center mb-3 p-2 bg-light rounded-3 shadow-sm">
                            <i class="fas fa-clock fa-2x text-info me-3"></i>
                            <div>
                                <p class="mb-0 fw-bold">{{ $jadwal->mata_pelajaran }} - {{ $jadwal->kelas }}</p>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}</small>
                            </div>
                            <a href="{{ route('guru.kehadiran.absensi', $jadwal->id) }}" class="btn btn-sm btn-primary ms-auto">Absensi</a>
                        </div>
                    @empty
                         <div class="alert alert-info border-start border-4 border-info">
                            <i class="fas fa-info-circle me-1"></i> Tidak ada jadwal hari ini.
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

        <div class="col-lg-6">
             <div class="card shadow-lg h-100 rounded-4">
                <div class="card-header bg-info text-dark fw-bold fs-5 rounded-top-4">
                    <i class="fas fa-percent me-2"></i> Distribusi Kehadiran (30 Hari)
                </div>
                <div class="card-body">
                    <p class="text-muted small">Total {{ $totalAbsensi }} sesi terdata dalam 30 hari terakhir:</p>
                    
                    <ul class="list-unstyled">
                        @foreach (['Hadir', 'Sakit', 'Izin', 'Alpha'] as $status)
                            @php
                                $percent = $kehadiranStats[$status];
                                $color = ['Hadir' => 'success', 'Sakit' => 'warning', 'Izin' => 'info', 'Alpha' => 'danger'][$status];
                            @endphp
                            <li class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-medium">{{ $status }}</span>
                                    <span class="badge bg-{{ $color }}">{{ $percent }}%</span>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-{{ $color }}" role="progressbar" style="width: {{ $percent }}%;" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    
                    <div class="alert alert-light text-center mt-4 border-bottom">
                         Data ini membantu Anda melihat tren kehadiran siswa secara umum.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection