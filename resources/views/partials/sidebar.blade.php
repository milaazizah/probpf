<div class="sidebar d-flex flex-column p-3">
    <h5 class="fw-bold mb-4 text-secondary">Menu Guru</h5>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->is('guru/dashboard') ? 'bg-custom-light border-start border-primary border-4 fw-bold' : '' }}" 
               href="{{ route('guru.dashboard') }}">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->is('guru/jadwal*') ? 'bg-custom-light border-start border-primary border-4 fw-bold' : '' }}" 
               href="{{ route('guru.jadwal.index') }}">
                <i class="fas fa-calendar-alt me-2"></i> Manajemen Jadwal
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->is('guru/kehadiran*') ? 'bg-custom-light border-start border-primary border-4 fw-bold' : '' }}" 
               href="{{ route('guru.kehadiran.index') }}">
                <i class="fas fa-user-check me-2"></i> Input Kehadiran
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->is('guru/nilai*') ? 'bg-custom-light border-start border-primary border-4 fw-bold' : '' }}" 
               href="{{ route('guru.nilai.index') }}">
                <i class="fas fa-graduation-cap me-2"></i> Input Nilai
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('guru.materi.index') }}" class="nav-link text-dark {{ request()->is('guru/materi*') ? 'bg-custom-light border-start border-primary border-4 fw-bold' : '' }}">
                <i class="fas fa-book-reader me-3 fa-fw"></i> Materi Pembelajaran
            </a>
        </li>
    </ul>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <div class="mt-auto pt-3 border-top">
        <form method="POST" action="{{ route('logout') }}" class="w-100">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-danger text-decoration-none w-100 text-start">
                <i class="fas fa-sign-out-alt me-2 fa-fw"></i> Keluar
            </button>
        </form>
    </div>
</div>