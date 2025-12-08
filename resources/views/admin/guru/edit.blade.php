@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Guru</h5>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mt-2">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Guru</label>
                    <input type="text" name="name" class="form-control" value="{{ $guru->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $guru->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Password Baru (Opsional)</label>
                    <input type="password" name="password" class="form-control" placeholder="Isi jika ingin mengganti password">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                </div>

                <button type="submit" class="btn btn-warning text-white px-4">
                    <i class="fas fa-save me-1"></i> Update
                </button>

                <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary px-4 ms-2">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>
@endsection
