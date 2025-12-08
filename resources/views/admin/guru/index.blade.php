@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')
<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-primary">
            <i class="fas fa-chalkboard-teacher me-2"></i> Data Guru
        </h4>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle me-1"></i> Tambah Guru
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h6 class="mb-0 fw-bold"><i class="fas fa-list me-2"></i> Daftar Guru</h6>
        </div>

        <div class="card-body p-0">

            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th style="width: 120px;">Role</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($guru as $index => $g)
                        <tr>
                            <td class="fw-semibold text-secondary">{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $g->name }}</td>
                            <td>{{ $g->email }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    <i class="fas fa-chalkboard-teacher me-1"></i> Guru
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.guru.edit', $g->id) }}"
                                   class="btn btn-sm btn-warning text-white me-1">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.guru.destroy', $g->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                <i class="fas fa-info-circle me-2"></i> Belum ada data guru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
