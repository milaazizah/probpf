@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <h5 class="mb-0">Data Siswa</h5>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-light btn-sm">+ Tambah Siswa</a>
    </div>

    <div class="card-body">

        {{-- FILTER & SEARCH --}}
        <form class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari nama atau email..." value="{{ $search }}">
            </div>

            <div class="col-md-3">
                <select name="kelas" class="form-select">
                    <option value="">-- Semua Kelas --</option>
                    @foreach($kelasList as $k)
                        <option value="{{ $k }}" {{ $kelas == $k ? 'selected' : '' }}>
                            {{ $k }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">Filter</button>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($siswa as $s)
                <tr>
                    <td>{{ $loop->iteration + $siswa->firstItem() - 1 }}</td>
                    <td>{{ $s->user->name }}</td>
                    <td>{{ $s->user->email }}</td>
                    <td>{{ $s->kelas }}</td>

                    <td class="d-flex gap-2">
                        <a href="{{ route('admin.siswa.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $siswa->links() }}
        </div>

    </div>
</div>
@endsection
