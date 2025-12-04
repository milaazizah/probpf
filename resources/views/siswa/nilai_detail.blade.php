@extends('layouts.app')

@section('title', 'Nilai Perkembangan Siswa')

@section('content')
    <h2 class="text-success mb-4 fw-bold">
        <i class="fas fa-star me-2"></i> Nilai Perkembangan Saya
    </h2>
    <p class="text-muted">Ringkasan nilai perkembangan tugas mingguan Anda di setiap mata pelajaran.</p>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-center small">
                    <thead class="table-success text-white">
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Pekan 1</th>
                            <th>Pekan 2</th>
                            <th>Pekan 3</th>
                            <th>Pekan 4</th>
                            <th class="fw-bold">Rata-Rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($nilaiLengkap as $nilai)
                            <tr>
                                <td class="text-start fw-medium">{{ $nilai->jadwal->mata_pelajaran ?? 'N/A' }}</td>
                                <td>{{ $nilai->pekan_1 ?? '-' }}</td>
                                <td>{{ $nilai->pekan_2 ?? '-' }}</td>
                                <td>{{ $nilai->pekan_3 ?? '-' }}</td>
                                <td>{{ $nilai->pekan_4 ?? '-' }}</td>
                                <td class="fw-bold fs-6 text-success">{{ number_format($nilai->rata_rata, 1) ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="fas fa-exclamation-circle me-1"></i> Belum ada data nilai perkembangan yang diinput guru Anda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection