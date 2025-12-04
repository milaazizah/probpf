@extends('layouts.app')

@section('title', 'Absensi Kelas')

@section('content')
    <h2 class="text-primary mb-4">Absensi: {{ $jadwal->mata_pelajaran }} ({{ $jadwal->kelas }})</h2>
    <h5 class="text-secondary mb-4">Tanggal: {{ now()->isoFormat('D MMMM Y') }}</h5>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('guru.kehadiran.store', $jadwal->id) }}" method="POST">
                @csrf
                <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 25%;">Nama Siswa</th>
                                <th style="width: 30%;">Status Kehadiran</th>
                                <th style="width: 40%;">Keterangan (Izin/Sakit)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswas as $siswa)
                                @php
                                    $currentStatus = $kehadiranTersimpan[$siswa->id] ?? 'Hadir';
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswa->nama_siswa }} ({{ $siswa->nis }})</td>
                                    <td>
                                        <select class="form-select" name="status[{{ $siswa->id }}]" required>
                                            <option value="Hadir" {{ $currentStatus == 'Hadir' ? 'selected' : '' }} class="text-success">Hadir</option>
                                            <option value="Sakit" {{ $currentStatus == 'Sakit' ? 'selected' : '' }} class="text-warning">Sakit</option>
                                            <option value="Izin" {{ $currentStatus == 'Izin' ? 'selected' : '' }} class="text-info">Izin</option>
                                            <option value="Alpha" {{ $currentStatus == 'Alpha' ? 'selected' : '' }} class="text-danger">Alpha</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="keterangan[{{ $siswa->id }}]" value="" placeholder="Opsional: Keterangan Izin/Sakit">
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada siswa terdaftar di kelas ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary btn-lg shadow">
                        <i class="fas fa-save me-1"></i> Simpan Absensi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection