@extends('layouts.app')

@section('title', 'Manajemen Kehadiran Siswa')

@section('content')
    <h2 class="text-primary mb-4"><i class="fas fa-clipboard-check me-2"></i> Dashboard Kehadiran</h2>
    
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="card shadow-sm mb-5 border-start border-4 border-success">
        <div class="card-header bg-white pt-3 pb-0">
            <h5 class="m-0 text-success fw-bold">
                <i class="fas fa-calendar-day me-1"></i> Jadwal Mengajar Hari Ini 
                <span class="text-muted small">({{ $dayName }}, {{ now()->isoFormat('D MMMM Y') }})</span>
            </h5>
            <hr class="mt-2 mb-0">
        </div>
        
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @forelse ($jadwalHariIni as $jadwal)
                    <div class="col">
                        <div class="card shadow-sm h-100 border-success border-2">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title text-dark fw-bold">{{ $jadwal->mata_pelajaran }}</h4>
                                <span class="badge bg-primary text-white mb-3 align-self-start">{{ $jadwal->kelas }}</span>
                                <p class="card-text text-muted mb-3">
                                    <i class="fas fa-clock me-1"></i> Waktu: {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                                </p>
                                <a href="{{ route('guru.kehadiran.absensi', $jadwal->id) }}" class="btn btn-success mt-auto d-block">
                                    <i class="fas fa-user-edit me-1"></i> **Mulai / Edit Absensi**
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info mb-0 border-start border-4 border-info shadow-sm">
                            <i class="fas fa-info-circle me-1"></i> **Tidak ada jadwal mengajar** Anda untuk hari **{{ $dayName }}**. Nikmati waktu luang Anda!
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <h3 class="mt-5 mb-3 text-secondary fw-bold">Riwayat Kehadiran Siswa</h3>
    
    <div class="card shadow">
        <div class="card-header bg-light border-bottom">
            <form method="GET" action="{{ route('guru.kehadiran.index') }}" class="row g-3 align-items-end">
                
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label for="kelas_filter" class="form-label fw-bold">1. Filter Kelas</label>
                    <select class="form-select" id="kelas_filter" name="kelas_filter" onchange="this.form.submit()">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelasDiajar as $kelas)
                            <option value="{{ $kelas }}" {{ $selectedKelas == $kelas ? 'selected' : '' }}>
                                {{ $kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                @if ($selectedKelas)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <label for="tanggal_filter" class="form-label fw-bold">2. Filter Tanggal (Opsional)</label>
                        <input type="date" class="form-control" id="tanggal_filter" name="tanggal_filter" value="{{ $filterDate }}">
                    </div>
                    
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary w-100 mb-0">
                            <i class="fas fa-search me-1"></i> Cari Riwayat
                        </button>
                        <a href="{{ route('guru.kehadiran.index') }}" class="btn btn-outline-secondary w-100 mt-2">Reset</a>
                    </div>
                @endif
            </form>
        </div>
        
        <div class="card-body">
            @if ($showRiwayat)
                <div class="alert alert-light text-primary border-start border-4 border-primary shadow-sm mb-4">
                    <i class="fas fa-table me-1"></i> **Riwayat Kehadiran** ditampilkan untuk kelas **{{ $selectedKelas }}**.
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover small align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Tanggal</th>
                                <th>Sesi/Mapel</th>
                                <th>Siswa</th>
                                <th class="text-center">Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($riwayatKehadiran as $absen)
                                <tr>
                                    <td>
                                        <div class="fw-bold">{{ \Carbon\Carbon::parse($absen->tanggal)->isoFormat('D MMM Y') }}</div>
                                        <span class="text-muted small">{{ \Carbon\Carbon::parse($absen->tanggal)->isoFormat('dddd') }}</span>
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ $absen->jadwal->mata_pelajaran }}</div>
                                        <span class="text-muted small">{{ \Carbon\Carbon::parse($absen->jadwal->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($absen->jadwal->waktu_selesai)->format('H:i') }}</span>
                                    </td>
                                    <td>
                                        <i class="fas fa-user me-1 text-secondary"></i> {{ $absen->siswa->nama_siswa }}
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $badgeClass = ['Hadir' => 'success', 'Sakit' => 'warning', 'Izin' => 'info', 'Alpha' => 'danger'][$absen->status] ?? 'secondary';
                                        @endphp
                                        <span class="badge bg-{{ $badgeClass }} py-2 px-3 fw-bold">{{ $absen->status }}</span>
                                    </td>
                                    <td>{{ $absen->keterangan ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="fas fa-exclamation-circle me-1"></i> Tidak ada riwayat absensi ditemukan untuk kelas ini dalam rentang waktu yang dipilih.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    {{ $riwayatKehadiran->links() }}
                </div>
            @else
                <div class="alert alert-warning text-center py-4 border-start border-4 border-warning shadow-sm">
                    <i class="fas fa-hand-point-up fa-2x mb-2 text-warning"></i>
                    <p class="mb-0">Mohon pilih **Kelas** terlebih dahulu dari *dropdown* di atas untuk memuat riwayat kehadiran siswa.</p>
                </div>
            @endif
        </div>
    </div>
@endsection