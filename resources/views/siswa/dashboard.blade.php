@extends('layouts.app') 

@section('title', 'Dashboard Siswa')

@section('content')
    <h1 class="text-primary mb-2 fw-bold">
        <i class="fas fa-graduation-cap me-2"></i> Hai, {{ $siswa->nama_siswa }}!
    </h1>
    <p class="fs-5 text-muted">Selamat belajar! Kelas Anda saat ini: <span class="badge bg-info fs-6">{{ $kelasSiswa }}</span></p>

    {{-- ============================================= --}}
    {{-- A. QUICK STATS (PERKEMBANGAN SAYA) --}}
    {{-- ============================================= --}}
    <div class="row g-4 mb-5">
        
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm h-100 border-start border-4 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-star fa-3x text-success me-3"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 fw-bold">Rata-rata Nilai Saya</p>
                            <h4 class="mb-0 fw-bold">
                                {{ $nilaiRataRata ? number_format($nilaiRataRata, 1) : '-' }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm h-100 border-start border-4 border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-3x text-primary me-3"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 fw-bold">Kehadiran (Hadir)</p>
                            <h4 class="mb-0 fw-bold">{{ $persenHadir }}%</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-12">
            <div class="card shadow-sm h-100 border-start border-4 border-secondary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clipboard-list fa-3x text-secondary me-3"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 fw-bold">Total Sesi Diikuti</p>
                            <h4 class="mb-0 fw-bold">{{ $totalSesi }} Sesi</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- ============================================= --}}
    {{-- B. DETAIL INFORMASI (MATERI & NILAI) --}}
    {{-- ============================================= --}}
    <div class="row g-4">
        
        <div class="col-lg-6">
            <div class="card shadow-lg h-100 rounded-4">
                <div class="card-header bg-primary text-white fw-bold fs-5 rounded-top-4">
                    <i class="fas fa-file-alt me-2"></i> Materi Terbaru Kelas {{ $kelasSiswa }}
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($materis as $materi)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $materi->judul }}</h6>
                                    <small class="text-muted">Diunggah: {{ $materi->created_at->diffForHumans() }}</small>
                                </div>
                                
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted py-4">
                                <i class="fas fa-folder-open fa-2x mb-2"></i>
                                <p class="mb-0">Belum ada materi terbaru untuk kelas Anda.</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="card-footer text-end bg-light">
                     <a href="{{ route('siswa.materi') }}" class="text-primary fw-bold text-decoration-none">Lihat Semua Materi <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
             <div class="card shadow-lg h-100 rounded-4">
                <div class="card-header bg-success text-white fw-bold fs-5 rounded-top-4">
                    <i class="fas fa-star-half-alt me-2"></i> Nilai Perkembangan Saya
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover small mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Pelajaran</th>
                                    <th>P1</th>
                                    <th>P2</th>
                                    <th>P3</th>
                                    <th>P4</th>
                                    <th class="text-success">Rata-Rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($nilaiLengkap as $nilai)
                                    <tr>
                                        <td>{{ $nilai->jadwal->mata_pelajaran ?? 'N/A' }}</td>
                                        <td>{{ $nilai->pekan_1 ?? '-' }}</td>
                                        <td>{{ $nilai->pekan_2 ?? '-' }}</td>
                                        <td>{{ $nilai->pekan_3 ?? '-' }}</td>
                                        <td>{{ $nilai->pekan_4 ?? '-' }}</td>
                                        <td class="fw-bold text-success">{{ number_format($nilai->rata_rata, 1) ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada nilai perkembangan yang diinput guru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end bg-light">
                     <a href="{{ route('siswa.nilai') }}" class="text-success fw-bold text-decoration-none">Lihat Riwayat Lengkap <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-5">
        <h3 class="text-primary mb-3"><i class="fas fa-chart-pie me-2"></i> Analisis Kehadiran</h3>
        {{-- TAMPILAN KEHADIRAN BISA DITAMBAHKAN DI SINI, MIRIP DENGAN PROGRESS BAR GURU --}}
        @php
            // Memastikan array ini selalu ada
            $kehadiranDisplay = [
                'Hadir' => ['color' => 'success', 'percent' => $kehadiranStats['Hadir'] ?? collect()],
                'Sakit' => ['color' => 'warning', 'percent' => $kehadiranStats['Sakit'] ?? collect()],
                'Izin' => ['color' => 'info', 'percent' => $kehadiranStats['Izin'] ?? collect()],
                'Alpha' => ['color' => 'danger', 'percent' => $kehadiranStats['Alpha'] ?? collect()],
            ];
            $totalCount = $kehadiranStats->flatten()->count();
        @endphp
        
        @if ($totalCount > 0)
            <ul class="list-unstyled">
                @foreach ($kehadiranDisplay as $status => $data)
                    @php
                        $count = $data['percent']->count();
                        $percent = round(($count / $totalCount) * 100, 1);
                    @endphp
                    <li class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span class="fw-medium">{{ $status }} ({{ $count }} Sesi)</span>
                            <span class="badge bg-{{ $data['color'] }}">{{ $percent }}%</span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-{{ $data['color'] }}" role="progressbar" style="width: {{ $percent }}%;" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-info text-center">
                Belum ada data kehadiran yang tercatat untuk Anda.
            </div>
        @endif
        <div class="text-end mt-3">
             <a href="{{ route('siswa.kehadiran') }}" class="text-primary fw-bold text-decoration-none">Lihat Riwayat Kehadiran Lengkap <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
    </div>
@endsection