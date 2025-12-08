@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Siswa</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.siswa.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="kelas" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        <option>7A</option><option>7B</option>
                        <option>8A</option><option>8B</option>
                        <option>9A</option><option>9B</option>
                    </select>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
@endsection
