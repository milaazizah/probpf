@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')
    <h2 class="text-primary mb-4">Edit Jadwal: {{ $jadwal->mata_pelajaran }} ({{ $jadwal->kelas }})</h2>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('guru.jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control @error('mata_pelajaran') is-invalid @enderror" id="mata_pelajaran" name="mata_pelajaran" value="{{ old('mata_pelajaran', $jadwal->mata_pelajaran) }}" required>
                        @error('mata_pelajaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-select @error('kelas') is-invalid @enderror" id="kelas" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelases as $kelas)
                                <option value="{{ $kelas }}" {{ old('kelas', $jadwal->kelas) == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="hari" class="form-label">Hari</label>
                        <select class="form-select @error('hari') is-invalid @enderror" id="hari" name="hari" required>
                            <option value="">Pilih Hari</option>
                            @foreach ($haris as $hari)
                                <option value="{{ $hari }}" {{ old('hari', $jadwal->hari) == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                            @endforeach
                        </select>
                        @error('hari') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="mb-3 col-md-4">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai', \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i')) }}" required>
                        @error('waktu_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                        <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai', \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i')) }}" required>
                        @error('waktu_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('guru.jadwal.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Perbarui Jadwal</button>
                </div>
            </form>
        </div>
    </div>
@endsection