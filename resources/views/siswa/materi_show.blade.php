@extends('layouts.app')

@section('title', $materi->judul)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h2 class="text-primary fw-bold">
            <i class="fas fa-eye me-2"></i> {{ $materi->judul }}
        </h2>
        <a href="{{ route('siswa.materi') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Materi
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white fw-bold">
                    Detail Materi (Kelas {{ $materi->kelas }})
                </div>
                <div class="card-body">
                    
                    {{-- 1. DESKRIPSI LENGKAP --}}
                    <h5 class="fw-bold text-dark mb-3">Deskripsi:</h5>
                    <p class="text-muted">{{ $materi->deskripsi }}</p>
                    
                    <hr>
                    
                    {{-- 2. TAMPILKAN KONTEN FILE/LINK --}}
                    @if ($materi->url_file)
                        <h5 class="fw-bold text-dark mb-3">Konten Pembelajaran:</h5>
                        
                        @php
                            $extension = pathinfo($materi->url_file, PATHINFO_EXTENSION);
                            $url = asset('storage/' . $materi->url_file);
                        @endphp

                        @if (in_array($extension, ['pdf', 'doc', 'docx', 'ppt', 'pptx']))
                            {{-- Tampilan Dokumen --}}
                            <div class="alert alert-info d-flex align-items-center">
                                <i class="fas fa-file-alt me-2 fa-2x"></i>
                                <div>
                                    Dokumen tersedia. Klik untuk melihat di jendela baru atau unduh:
                                    <a href="{{ $url }}" target="_blank" class="alert-link fw-bold ms-2">Buka Dokumen (.{{ $extension }})</a>
                                </div>
                            </div>
                        
                        @elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            {{-- Tampilan Foto/Gambar --}}
                            <p class="text-muted">Foto Materi:</p>
                            <img src="{{ $url }}" alt="Materi Gambar" class="img-fluid rounded shadow-sm mb-3" style="max-height: 400px; object-fit: contain;">
                            <p><a href="{{ $url }}" target="_blank" class="btn btn-sm btn-outline-secondary">Lihat Gambar Asli</a></p>

                        @else
                            {{-- Asumsi konten berupa Link/URL yang disimpan di url_file --}}
                            <div class="alert alert-success d-flex align-items-center">
                                <i class="fas fa-link me-2 fa-2x"></i>
                                <div>
                                    Materi berbentuk tautan eksternal.
                                    <a href="{{ $materi->url_file }}" target="_blank" class="alert-link fw-bold ms-2">Buka Tautan Materi</a>
                                </div>
                            </div>
                        @endif
                        
                    @else
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i> Guru tidak menyediakan file atau tautan terlampir untuk materi ini.
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            {{-- INFORMASI PENTING --}}
            <div class="card shadow-sm border-info">
                <div class="card-body">
                    <h6 class="text-info mb-3 fw-bold"><i class="fas fa-info-circle me-1"></i> Informasi Tambahan</h6>
                    <p class="mb-2"><strong>Tanggal Unggah:</strong> {{ $materi->created_at->isoFormat('D MMMM Y') }}</p>
                    <p class="mb-2"><strong>Kelas Tujuan:</strong> <span class="badge bg-primary">{{ $materi->kelas }}</span></p>
                    {{-- Anda dapat menambahkan info guru di sini jika relasi Guru-Materi tersedia --}}
                    <p class="mb-0"><strong>Dibuat Oleh:</strong> Guru {{ $materi->guru->name ?? 'N/A'}}</p> 
                </div>
            </div>
        </div>
    </div>
@endsection