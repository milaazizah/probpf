@extends('layouts.app')

@section('title', 'Pendaftaran Siswa Baru')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <h5 class="mb-0">Pendaftaran Siswa Baru</h5>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif

        <table class="table table-hover table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                    <th>Status Akun</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($calon as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->created_at->format('d M Y') }}</td>
                    <td>
                        @if($c->status_akun === 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($c->status_akun === 'approved')
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>

                    <td class="d-flex gap-2">
                        <form action="{{ route('admin.pendaftaran.approve', $c->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success btn-sm">Approve</button>
                        </form>

                        <form action="{{ route('admin.pendaftaran.decline', $c->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">Decline</button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Belum ada pendaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
