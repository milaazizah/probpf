<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calistung - @yield('title')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Outfit', sans-serif; }
        
        #bg-video {
            position: fixed; right: 0; bottom: 0;
            min-width: 100%; min-height: 100%;
            z-index: -50; object-fit: cover;
        }

        /* EFEK KACA ES (FROSTED GLASS) */
        .glass-card {
            background: rgba(255, 255, 255, 0.7); /* Putih Transparan */
            backdrop-filter: blur(20px); /* Blur Kuat */
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }

        /* ANIMASI BOLA-BOLA BACKGROUND */
        @keyframes float {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .orb {
            position: fixed; z-index: -40; border-radius: 50%;
            filter: blur(80px); opacity: 0.6; animation: float 10s infinite ease-in-out;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen text-gray-800 antialiased selection:bg-blue-500 selection:text-white">

    <video autoplay muted loop playsinline id="bg-video">
        <source src="@yield('video-bg', asset('videos/home.mp4'))" type="video/mp4">
    </video>

    <div class="orb w-96 h-96 bg-purple-400 top-0 left-0 animate-blob"></div>
    <div class="orb w-96 h-96 bg-blue-400 bottom-0 right-0 animate-blob animation-delay-2000"></div>
    <div class="orb w-80 h-80 bg-pink-400 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>

    <nav class="sticky top-0 z-50 glass-card border-b border-white/50 m-4 rounded-2xl">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between h-20 items-center">
                
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white text-xl shadow-lg group-hover:rotate-12 transition">R</div>
                    <span class="font-bold text-2xl tracking-tight text-gray-900"><span class="text-blue-600">Calistung</span></span>
                </a>

                <div class="hidden md:flex items-center space-x-1 bg-white/50 p-1 rounded-full border border-white">
                    <a href="{{ route('home') }}" class="px-5 py-2 rounded-full text-sm font-semibold hover:bg-white hover:shadow-sm transition {{ request()->routeIs('home') ? 'bg-white shadow-sm text-blue-600' : 'text-gray-600' }}">Home</a>
                    <a href="{{ route('about') }}" class="px-5 py-2 rounded-full text-sm font-semibold hover:bg-white hover:shadow-sm transition {{ request()->routeIs('about') ? 'bg-white shadow-sm text-blue-600' : 'text-gray-600' }}">Tentang</a>
                    <a href="{{ route('products.public') }}" class="px-5 py-2 rounded-full text-sm font-semibold hover:bg-white hover:shadow-sm transition {{ request()->routeIs('products.public') ? 'bg-white shadow-sm text-blue-600' : 'text-gray-600' }}">Produk</a>
                    <a href="{{ route('testimonials') }}" class="px-5 py-2 rounded-full text-sm font-semibold hover:bg-white hover:shadow-sm transition {{ request()->routeIs('testimonials') ? 'bg-white shadow-sm text-blue-600' : 'text-gray-600' }}">Testimoni</a>
                    <a href="{{ route('contact') }}" class="px-5 py-2 rounded-full text-sm font-semibold hover:bg-white hover:shadow-sm transition {{ request()->routeIs('contact') ? 'bg-white shadow-sm text-blue-600' : 'text-gray-600' }}">Kontak</a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-700 hover:text-blue-600 transition">Masuk</a>
                        <a href="{{ route('register') }}" class="px-6 py-2.5 bg-gray-900 text-white text-sm font-bold rounded-xl shadow-lg hover:bg-gray-800 hover:scale-105 transition transform">
                            Daftar Sekarang
                        </a>
                    @else
                        <div class="flex items-center gap-3">
                            <a href="{{ route('profile.index') }}" class="flex items-center gap-3 pl-2 pr-4 py-1.5 bg-white border border-gray-200 rounded-full shadow-sm hover:shadow-md transition">
                                @if(Auth::user()->profile_photo)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" class="w-8 h-8 rounded-full object-cover">
                                @else
                                    <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xs font-bold">{{ substr(Auth::user()->name, 0, 1) }}</div>
                                @endif
                                <span class="text-sm font-bold text-gray-700">{{ Auth::user()->name }}</span>
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="w-10 h-10 rounded-full bg-red-100 hover:bg-red-500 text-red-500 hover:text-white flex items-center justify-center transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                </button>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-10 relative z-10">
        @yield('content')
    </main>

    <footer class="mt-auto m-4">
        <div class="glass-card rounded-2xl p-6 text-center">
            <p class="text-gray-600 text-sm font-medium">&copy; {{ date('Y') }} Calistung Dibuat dengan cinta untuk pendidikan Indonesia.</p>
        </div>
    </footer>

</body>
</html>