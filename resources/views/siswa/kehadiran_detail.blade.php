@extends('layouts.app')

@section('title', 'Riwayat Kehadiran Siswa')

@section('content')
    <h2 class="text-info mb-4 fw-bold">
        <i class="fas fa-clipboard-check me-2"></i> Riwayat Kehadiran Saya
    </h2>
    <p class="text-muted">Lihat semua catatan kehadiran Anda di setiap sesi pelajaran.</p>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle small">
                    <thead class="table-info text-dark">
                        <tr>
                            <th>Tanggal</th>
                            <th>Mata Pelajaran</th>
                            <th class="text-center">Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayatKehadiran as $absen)
                            <tr>
                                <td>
                                    <div class="fw-bold">{{ \Carbon\Carbon::parse($absen->tanggal)->isoFormat('D MMMM Y') }}</div>
                                    <span class="text-muted small">{{ \Carbon\Carbon::parse($absen->tanggal)->isoFormat('dddd') }}</span>
                                </td>
                                <td>{{ $absen->jadwal->mata_pelajaran ?? 'N/A' }}</td>
                                <td class="text-center">
                                    @php
                                        $badgeClass = ['Hadir' => 'success', 'Sakit' => 'warning', 'Izin' => 'info', 'Alpha' => 'danger'][$absen->status] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $badgeClass }} py-1 px-2 fw-bold">{{ $absen->status }}</span>
                                </td>
                                <td>{{ $absen->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="fas fa-exclamation-circle me-1"></i> Belum ada riwayat kehadiran yang tercatat untuk Anda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection