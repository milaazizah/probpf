@extends('layouts.app')

@section('title', 'Manajemen Materi Pembelajaran')

@section('content')
    <h2 class="text-primary mb-4">📚 Manajemen Materi Pembelajaran</h2>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('guru.materi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Materi Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Kelas / Mapel</th>
                            <th>Tipe</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($materis as $materi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $materi->judul }}</td>
                                <td>{{ $materi->kelas }} ({{ $materi->mata_pelajaran }})</td>
                                <td><span class="badge bg-secondary">{{ strtoupper($materi->tipe) }}</span></td>
                                <td>{{ $materi->created_at->isoFormat('D MMM Y, HH:mm') }}</td>

                                <td>

                                    {{-- === BAGIAN Aksi dari kode asli, DIPINDAHKAN KE SINI === --}}
                                    <a href="{{ $materi->url_file }}" 
                                       target="_blank" 
                                       class="btn btn-sm btn-info text-white" 
                                       title="Lihat Materi">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('guru.materi.edit', $materi->id) }}" 
                                       class="btn btn-sm btn-warning text-dark" 
                                       title="Edit Materi">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('guru.materi.destroy', $materi->id) }}" 
                                          method="POST" 
                                          class="d-inline" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus Materi">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- ======================================================== --}}

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada materi yang Anda unggah.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $materis->links() }}
            </div>
        </div>
    </div>
@endsection
