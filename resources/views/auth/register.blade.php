@extends('app')

@section('video-bg', asset('videos/home.mp4'))

@section('title', 'Daftar Murid Baru')

@section('content')
<style>
    /* Pattern Background Kotak-kotak (Buku Tulis) */
    .notebook-bg {
        background-color: #ffffff;
        background-image: linear-gradient(#e5e7eb 1px, transparent 1px), linear-gradient(90deg, #e5e7eb 1px, transparent 1px);
        background-size: 20px 20px;
    }
    
    /* Tombol Timbul */
    .btn-pop {
        transition: all 0.1s;
        box-shadow: 0px 6px 0px #b91c1c; /* Shadow Merah Gelap */
    }
    .btn-pop:active {
        box-shadow: 0px 0px 0px #b91c1c;
        transform: translateY(6px);
    }
</style>

<div class="min-h-screen flex items-center justify-center py-10 px-4 relative">

    <div class="absolute bottom-10 left-10 animate-float hidden lg:block z-0">
        <div class="relative w-40 h-40 transform rotate-45">
            <div class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 w-10 h-20 bg-orange-500 rounded-full blur-md animate-pulse"></div>
            <svg viewBox="0 0 24 24" fill="none" class="w-full h-full text-white drop-shadow-xl" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z" fill="#EF4444"></path>
                <path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z" fill="#FCD34D"></path>
                <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0" fill="#3B82F6"></path>
                <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5" fill="#3B82F6"></path>
            </svg>
        </div>
    </div>

    <div class="w-full max-w-2xl bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.2)] relative z-10 overflow-hidden border-8 border-yellow-400">
        
        <div class="bg-yellow-400 p-8 text-center relative border-b-4 border-yellow-500">
            <div class="absolute bottom-0 left-0 w-full border-b-4 border-dashed border-white/50 mb-2"></div>
            
            <h1 class="text-4xl font-display font-black text-yellow-900 tracking-wide mb-2">
                Daftar Petualangan! 🗺️
            </h1>
            <p class="text-yellow-800 font-bold text-lg">
                Isi formulir ini untuk mendapatkan tiket emas.
            </p>
        </div>

        <div class="p-10 notebook-bg relative">
            
            <div class="absolute top-4 left-4 w-4 h-12 bg-gray-300 rounded-full shadow-inner border border-gray-400"></div>
            <div class="absolute top-4 right-4 w-4 h-12 bg-gray-300 rounded-full shadow-inner border border-gray-400"></div>

            <form action="{{ route('register') }}" method="POST" class="space-y-6 mt-4">
                @csrf
                
                <div class="group">
                    <label class="flex items-center gap-2 text-gray-600 font-black text-sm uppercase tracking-wider mb-2">
                        <span class="bg-blue-100 p-1 rounded-md text-xl">📛</span> Nama Lengkap
                    </label>
                    <input type="text" name="name" 
                           class="w-full px-5 py-4 bg-white border-4 border-blue-100 rounded-2xl text-gray-800 font-bold focus:outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-100 transition shadow-sm" 
                           placeholder="Contoh: Budi Juara" required>
                </div>

                <div class="group">
                    <label class="flex items-center gap-2 text-gray-600 font-black text-sm uppercase tracking-wider mb-2">
                        <span class="bg-green-100 p-1 rounded-md text-xl">📧</span> Alamat Email
                    </label>
                    <input type="email" name="email" 
                           class="w-full px-5 py-4 bg-white border-4 border-green-100 rounded-2xl text-gray-800 font-bold focus:outline-none focus:border-green-400 focus:ring-4 focus:ring-green-100 transition shadow-sm" 
                           placeholder="budi@rumahbelajar.id" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="flex items-center gap-2 text-gray-600 font-black text-sm uppercase tracking-wider mb-2">
                            <span class="bg-pink-100 p-1 rounded-md text-xl">🔒</span> Kata Sandi
                        </label>
                        <input type="password" name="password" 
                               class="w-full px-5 py-4 bg-white border-4 border-pink-100 rounded-2xl text-gray-800 font-bold focus:outline-none focus:border-pink-400 focus:ring-4 focus:ring-pink-100 transition shadow-sm" 
                               placeholder="********" required>
                    </div>
                    <div class="group">
                        <label class="flex items-center gap-2 text-gray-600 font-black text-sm uppercase tracking-wider mb-2">
                            <span class="bg-pink-100 p-1 rounded-md text-xl">✅</span> Ulangi Sandi
                        </label>
                        <input type="password" name="password_confirmation" 
                               class="w-full px-5 py-4 bg-white border-4 border-pink-100 rounded-2xl text-gray-800 font-bold focus:outline-none focus:border-pink-400 focus:ring-4 focus:ring-pink-100 transition shadow-sm" 
                               placeholder="********" required>
                    </div>
                </div>

                <button type="submit" class="btn-pop w-full py-5 bg-red-500 text-white font-black text-xl rounded-2xl mt-6 flex items-center justify-center gap-3 border-4 border-red-600">
                    <span>✨ DAFTAR SEKARANG</span>
                </button>

            </form>

            <div class="mt-8 text-center bg-gray-50 p-4 rounded-xl border border-gray-200">
                <p class="text-gray-500 font-bold text-sm">Sudah jadi murid?</p>
                <a href="{{ route('login') }}" class="text-blue-500 font-black text-base hover:text-blue-600 underline decoration-wavy decoration-2">
                    Masuk Kelas Disini
                </a>
            </div>

        </div>
    </div>

    <style>
        .star {
            position: absolute; width: 0; height: 0;
            border-right: 10px solid transparent; border-bottom: 7px solid #FFD700; border-left: 10px solid transparent;
            transform: rotate(35deg);
        }
        .star:before {
            border-bottom: 8px solid #FFD700; border-left: 3px solid transparent; border-right: 3px solid transparent;
            position: absolute; height: 0; width: 0; top: -4.5px; left: -6.5px; display: block; content: '';
            transform: rotate(-35deg);
        }
        .star:after {
            position: absolute; display: block; color: #FFD700; top: 0.3px; left: -10.5px; width: 0; height: 0;
            border-right: 10px solid transparent; border-bottom: 7px solid #FFD700; border-left: 10px solid transparent;
            transform: rotate(-70deg); content: '';
        }
    </style>
    <div class="star top-20 left-20 animate-spin-slow opacity-60"></div>
    <div class="star top-40 right-20 animate-spin-slow opacity-60" style="animation-direction: reverse;"></div>
    <div class="star bottom-20 left-1/2 animate-pulse opacity-60"></div>

</div>
@endsection