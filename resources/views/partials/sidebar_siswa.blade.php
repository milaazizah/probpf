<style>
    /* Tambahkan style kustom jika diperlukan di sini,
       misalnya untuk mendefinisikan .bg-custom-light jika belum ada */
    .bg-custom-light {
        background-color: #e3f2fd; /* Warna biru muda, sesuai dengan primary-light di layout utama */
    }
</style>

<div class="sidebar d-flex flex-column p-3">
    
    <h5 class="fw-bold mb-4 text-primary">
        <i class="fas fa-hat-wizard me-2"></i> Area Belajar Siswa
    </h5>
    
    <ul class="nav flex-column flex-grow-1">
        
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('siswa.dashboard') ? 'bg-custom-light border-start border-success border-4 fw-bold' : '' }}" 
               href="{{ route('siswa.dashboard') }}">
                <i class="fas fa-rocket me-2 fa-fw"></i> 
                Dashboard
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('siswa.materi') ? 'bg-custom-light border-start border-warning border-4 fw-bold' : '' }}" 
               href="{{ route('siswa.materi') }}">
                <i class="fas fa-book-reader me-2 fa-fw"></i> 
                Materi Pelajaran
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('siswa.nilai') ? 'bg-custom-light border-start border-info border-4 fw-bold' : '' }}" 
               href="{{ route('siswa.nilai') }}">
                <i class="fas fa-trophy me-2 fa-fw"></i> 
                Rapor Nilai
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link text-dark {{ request()->routeIs('siswa.kehadiran') ? 'bg-custom-light border-start border-danger border-4 fw-bold' : '' }}" 
               href="{{ route('siswa.kehadiran') }}">
                <i class="fas fa-fingerprint me-2 fa-fw"></i> 
                Absensi & Kehadiran
            </a>
        </li>
        
    </ul>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <div class="mt-auto pt-3 border-top">
        <form method="POST" action="{{ route('logout') }}" class="w-100">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-danger text-decoration-none w-100 text-start">
                <i class="fas fa-sign-out-alt me-2 fa-fw"></i> Keluar
            </button>
        </form>
    </div>
</div>