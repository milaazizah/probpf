@extends('layouts.app')

@section('title', 'Pilih Jadwal Input Nilai')

@section('content')
    <h2 class="text-primary mb-4"><i class="fas fa-calculator me-2"></i> Input Nilai Perkembangan</h2>
    <p class="text-muted">Pilih jadwal mengajar yang ingin Anda inputkan nilai tugas/perkembangan mingguan siswanya.</p>
    
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm"><i class="fas fa-check-circle me-1"></i> {{ session('success') }}</div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($jadwals as $jadwal)
            <div class="col">
                <div class="card shadow-sm h-100 border-start border-4 border-info">
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-primary align-self-start mb-2">{{ $jadwal->kelas }}</span>
                        <h4 class="card-title fw-bold text-dark">{{ $jadwal->mata_pelajaran }}</h4>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-calendar-alt me-1"></i> {{ $jadwal->hari }} | 
                            <i class="fas fa-clock me-1"></i> {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }}
                        </p>
                        <a href="{{ route('guru.nilai.input', $jadwal->id) }}" class="btn btn-info mt-auto d-block text-white fw-bold">
                            <i class="fas fa-edit me-1"></i> Input Nilai
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning border-start border-4 border-warning">Tidak ada jadwal mengajar yang terdaftar untuk Anda.</div>
            </div>
        @endforelse
    </div>
@endsection