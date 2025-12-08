<div class="sidebar d-flex flex-column p-3 vh-100 bg-light">
    <h5 class="fw-bold mb-4 text-secondary">Menu Admin</h5>

    <ul class="nav flex-column">

        {{-- Dashboard --}}
        <li class="nav-item">
            <a class="nav-link text-dark
               {{ request()->is('admin/dashboard') ? 'bg-custom-light border-start border-primary border-4 fw-bold' : '' }}"
               href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-line me-2"></i> Dashboard Admin
            </a>
        </li>

        {{-- Pendaftaran --}}
        <li class="nav-item mt-4">
            <span class="text-secondary fw-bold small ps-2">Pendaftaran</span>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark
               {{ request()->is('admin/pendaftaran*') ? 'bg-custom-light border-start border-primary border-4 fw-bold' : '' }}"
               href="{{ route('admin.pendaftaran.index') }}">
                <i class="fas fa-user-plus me-2"></i> Pendaftaran Siswa
            </a>
        </li>

        {{-- Manajemen Guru --}}
        <li class="nav-item mt-4">
            <span class="text-secondary fw-bold small ps-2">Manajemen</span>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark
               {{ request()->is('admin/guru*') ? 'bg-custom-light border-start border-primary border-4 fw-bold' : '' }}"
               href="{{ route('admin.guru.index') }}">
                <i class="fas fa-chalkboard-teacher me-2"></i> Data Guru
            </a>
        </li>

        {{-- Manajemen Siswa --}}
        <li class="nav-item">
            <a class="nav-link text-dark
               {{ request()->is('admin/siswa*') ? 'bg-custom-light border-start border-primary border-4 fw-bold' : '' }}"
               href="{{ route('admin.siswa.index') }}">
                <i class="fas fa-user-graduate me-2"></i> Data Siswa
            </a>
        </li>

    </ul>

    {{-- Logout --}}
    <div class="mt-auto pt-3 border-top">
        <form method="POST" action="{{ route('logout') }}" class="w-100">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-danger text-decoration-none w-100 text-start">
                <i class="fas fa-sign-out-alt me-2 fa-fw"></i> Keluar
            </button>
        </form>
    </div>
</div>

{{-- Custom CSS --}}
<style>
    .nav-link:hover {
        background-color: #e9ecef;
        border-radius: 5px;
    }
    .bg-custom-light {
        background-color: #f8f9fa !important;
    }
</style>
