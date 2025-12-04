@extends('layouts.app')

@section('title', 'Input Nilai ' . $jadwal->mata_pelajaran)

@section('content')
    <h2 class="text-primary mb-3">
        <i class="fas fa-square-poll-vertical me-2"></i> Input Nilai 
    </h2>
    <p class="text-muted">
        Jadwal: <span class="badge bg-primary">{{ $jadwal->mata_pelajaran }} - {{ $jadwal->kelas }}</span>
        ({{ $jadwal->hari }}, {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }})
    </p>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('guru.nilai.store', $jadwal->id) }}" method="POST">
                @csrf
                
                @if ($errors->any())
                    <div class="alert alert-danger shadow-sm">
                        <i class="fas fa-exclamation-triangle me-1"></i> **Peringatan:** Harap periksa kembali input nilai Anda. Nilai harus berupa angka 0-100.
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover small align-middle">
                        <thead class="table-info text-dark">
                            <tr>
                                <th rowspan="2" style="width: 30%;">Nama Siswa</th>
                                <th colspan="4" class="text-center border-bottom border-dark">Nilai Perkembangan Siswa (Pekan)</th>
                                <th rowspan="2" class="text-center bg-primary text-white">Rata-rata</th>
                            </tr>
                            <tr>
                                <th class="text-center">Pekan 1</th>
                                <th class="text-center">Pekan 2</th>
                                <th class="text-center">Pekan 3</th>
                                <th class="text-center">Pekan 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $siswa)
                                @php
                                    $nilaiSiswa = $dataNilai->get($siswa->id);
                                @endphp
                                <tr>
                                    <td><i class="fas fa-user-circle me-1 text-secondary"></i> {{ $siswa->nama_siswa }}</td>
                                    
                                    @for ($i = 1; $i <= 4; $i++)
                                        <td class="text-center p-1">
                                            <input type="number" name="pekan[{{ $siswa->id }}][pekan_{{ $i }}]" 
                                                class="form-control form-control-sm text-center @error('pekan.'.$siswa->id.'.pekan_'.$i) is-invalid @enderror" 
                                                min="0" max="100" 
                                                value="{{ old('pekan.'.$siswa->id.'.pekan_'.$i, $nilaiSiswa?->{"pekan_$i"}) }}"
                                                style="width: 70px; margin: auto;">
                                        </td>
                                    @endfor

                                    <td class="text-center fw-bold fs-6 text-primary">
                                        {{ $nilaiSiswa?->rata_rata ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('guru.nilai.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg fw-bold">
                        <i class="fas fa-save me-1"></i> Simpan Nilai 
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection