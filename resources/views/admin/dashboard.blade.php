@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<style>
    /* Fade-in animation */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Main Header */
    .admin-header {
        background: linear-gradient(135deg, #ffffff, #e3f2fd);
        border-left: 5px solid #42a5f5;
        padding: 22px 28px;
        border-radius: 14px;
        margin-bottom: 28px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    }

    /* Stat Cards */
    .stats-card {
        border-radius: 14px;
        padding: 25px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .stats-blue {
        background: linear-gradient(135deg, #42a5f5, #1e88e5);
        box-shadow: 0 6px 16px rgba(66,165,245,0.35);
    }

    .stats-green {
        background: linear-gradient(135deg, #66bb6a, #43a047);
        box-shadow: 0 6px 16px rgba(102,187,106,0.35);
    }

    .stats-icon {
        position: absolute;
        bottom: -8px;
        right: -8px;
        font-size: 80px;
        opacity: 0.18;
        color: white;
    }

    /* Section title */
    .section-title {
        font-weight: 600;
        font-size: 1.05rem;
        border-left: 4px solid #42a5f5;
        padding-left: 10px;
        margin-bottom: 15px;
        color: #37474f;
        opacity: 0.9;
    }

    /* Table style */
    .table thead {
        background-color: #e3f2fd;
        font-weight: 600;
        color: #1e88e5;
    }

    .table tbody tr:hover {
        background-color: rgba(33,150,243,0.08);
        cursor: pointer;
    }

    .card-shadow {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.07);
    }
</style>


<div class="container-fluid fade-in">

    <!-- Header -->
    <div class="admin-header">
        <h3 class="fw-bold text-primary m-0">
            <i class="fas fa-user-shield me-2"></i> Dashboard Admin
        </h3>
        <p class="text-secondary m-0">Kelola guru dan siswa dengan mudah & cepat.</p>
    </div>


    <!-- Statistik -->
    <div class="row g-4 mb-4 fade-in">

        <div class="col-md-6">
            <div class="stats-card stats-blue">
                <h5>Total Guru</h5>
                <h1 class="fw-bold">{{ $jumlahGuru }}</h1>
                <i class="fas fa-chalkboard-teacher stats-icon"></i>
            </div>
        </div>

        <div class="col-md-6">
            <div class="stats-card stats-green">
                <h5>Total Siswa</h5>
                <h1 class="fw-bold">{{ $jumlahSiswa }}</h1>
                <i class="fas fa-user-graduate stats-icon"></i>
            </div>
        </div>

    </div>


    <!-- Data Terbaru -->
    <div class="row fade-in">

        <!-- Guru Baru -->
        <div class="col-lg-6 mb-4">
            <div class="card card-shadow">
                <div class="card-body">
                    <div class="section-title">Guru Terbaru</div>

                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($guruBaru as $guru)
                            <tr>
                                <td>{{ $guru->name }}</td>
                                <td>{{ $guru->email }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-3">
                                    <i class="fas fa-info-circle me-1"></i> Tidak ada guru baru.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- Siswa Baru -->
        <div class="col-lg-6 mb-4">
            <div class="card card-shadow">
                <div class="card-body">
                    <div class="section-title">Siswa Terbaru</div>

                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswaBaru as $siswa)
                            <tr>
                                <td>{{ $siswa->name }}</td>
                                <td>{{ $siswa->email }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-3">
                                    <i class="fas fa-info-circle me-1"></i> Tidak ada siswa baru.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
