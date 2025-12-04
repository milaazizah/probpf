@extends('layouts.app')

@section('title', 'Semua Materi Kelas ' . $siswa->kelas)

@section('content')
    <div class="row g-4">
        @forelse ($materis as $materi)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm h-100 border-start border-4 border-primary">
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-info text-dark align-self-start mb-2">{{ $materi->kelas }}</span>
                        <h5 class="card-title fw-bold text-dark">{{ $materi->judul }}</h5>
                        <p class="card-text small text-muted mb-3">{{ Str::limit($materi->deskripsi, 80) }}</p>
                        
                        <div class="mt-auto">
                            <p class="small mb-2">
                                <i class="fas fa-calendar-alt me-1"></i> {{ $materi->created_at->isoFormat('D MMMM Y') }}
                            </p>
                            
                            <a href="{{ route('siswa.materi.show', $materi->id) }}" class="btn btn-primary w-100 fw-bold">
                                <i class="fas fa-eye me-1"></i> Lihat Detail
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        @empty
            @endforelse
    </div>

@endsection