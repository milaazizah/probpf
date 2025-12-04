<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bimbel App')</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMDJd/rtyX69N74f4E6N5E3D5z7D6L6lYw5J9Wz90K9b7v5Qc8hFz2w0Pq8u5T5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        :root {
            --bs-primary: #42a5f5; /* Biru Sedang, lebih tegas */
            --bs-primary-light: #e3f2fd; /* Biru Sangat Muda (untuk hover) */
            --bs-secondary: #546e7a; /* Abu-abu kebiruan untuk teks sekunder */
            --bs-bg-light: #ffffff;
        }

        /* Mengganti variabel default Bootstrap */
        .btn-primary, .bg-primary, .text-primary, .border-primary, .form-check-input:checked {
            --bs-primary-rgb: 66, 165, 245; /* RGB dari #42a5f5 */
        }
        
        /* Layout Utama */
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: var(--bs-bg-light); 
            border-right: 1px solid #dee2e6;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05); /* Shadow halus untuk kesan modern */
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1030; /* Z-index lebih tinggi dari navbar */
            padding-top: 56px; 
            overflow-y: auto; /* Untuk sidebar yang panjang */
        }
        .main-content {
            margin-left: 280px; 
            padding-top: 70px; 
            padding-bottom: 20px;
        }
        
        /* Style Navbar */
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04); /* Shadow pada Navbar */
            z-index: 1020;
        }

        /* Style Sidebar */
        .sidebar .nav-link {
            color: var(--bs-secondary);
            padding: 10px 15px;
            border-radius: 0.25rem;
            margin: 2px 8px; /* Memberi sedikit margin dari pinggir */
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover {
            background-color: var(--bs-primary-light);
            color: var(--bs-primary) !important;
        }
        .sidebar .nav-link.active {
            background-color: var(--bs-primary); /* Warna aktif lebih tegas */
            color: white !important;
            font-weight: 600;
        }
        .sidebar .nav-header {
            color: var(--bs-secondary);
            font-size: 0.85rem;
            padding: 10px 15px 5px 15px;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 10px;
        }

        /* Responsiveness Dasar (Opsional: Sembunyikan sidebar di mobile) */
        @media (max-width: 992px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                padding-top: 0;
            }
            .main-content {
                margin-left: 0;
                padding-top: 20px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    
    @guest
        {{-- Tampilan untuk Guest (Login/Register) --}}
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            @yield('content')
        </div>
    @endguest

    @auth
        {{-- Tampilan untuk User yang Sudah Login --}}
        @include('partials.header')
        
        <div class="d-flex">
            @include('partials.sidebar')

            <div class="main-content flex-grow-1">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>