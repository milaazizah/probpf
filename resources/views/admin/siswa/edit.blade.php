@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning">
        <h5 class="mb-0 text-white">Edit Data Siswa</h5>
    </div>

    <div class="card-body">

        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary btn-sm mb-3">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" name="name" class="form-control"
                       value="{{ $siswa->user->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Siswa</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $siswa->user->email }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control"
                       value="{{ $siswa->kelas }}" required>
            </div>

            <button class="btn btn-warning w-100 text-white">
                <i class="fa fa-save"></i> Perbarui
            </button>
        </form>

    </div>
</div>
@endsection
