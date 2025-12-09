@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="container mt-5 pt-5">
        <h2 class="text-primary mb-4">Profil Saya</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <!-- tambahkan enctype untuk upload file -->
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 text-center">
                        <label class="form-label d-block">Foto Profil</label>
                        @if ($user->avatar)
                            <img src="{{ route('avatar.show', basename($user->avatar)) }}" class="rounded-circle mb-2"
                                alt="avatar" width="120" height="120">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" class="rounded-circle mb-2" alt="avatar"
                                width="120" height="120">
                        @endif
                        <input type="file" class="form-control mt-2 @error('avatar') is-invalid @enderror" name="avatar"
                            accept="image/*">
                        @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <input type="text" class="form-control" value="{{ strtoupper($user->role) }}" disabled>
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui Profil</button>
                </form>
            </div>
        </div>
    </div>
@endsection
