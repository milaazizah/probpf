@extends('app')

@section('video-bg', asset('videos/home.mp4'))

@section('title', 'Masuk Kelas')

@section('content')
<style>
    /* Animasi Latar Belakang Bergerak */
    @keyframes move-bg {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .animated-gradient-border {
        background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
        background-size: 300% 300%;
        animation: move-bg 4s ease infinite;
    }

    /* Input Focus Effect */
    .input-fun:focus {
        box-shadow: 0px 8px 0px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    /* Mata Maskot Bergerak */
    .eye {
        transition: all 0.1s;
    }

    /* Tombol Google */
    .btn-google {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        background-color: #fff;
        color: #444;
        border: 2px solid #ddd;
        font-weight: 700;
        padding: 0.75rem 1.5rem;
        border-radius: 2rem;
        text-decoration: none;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }

    .btn-google:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0,0,0,0.15);
        border-color: #ccc;
    }

    .btn-google svg {
        width: 20px;
        height: 20px;
    }
</style>

<div class="min-h-screen flex items-center justify-center py-10 px-4 relative overflow-hidden">
    <div class="w-full max-w-5xl bg-white rounded-[3rem] shadow-2xl relative z-10 flex flex-col md:flex-row overflow-hidden border-8 border-white">

        <!-- Kiri: Maskot + info -->
        <div class="w-full md:w-1/2 bg-blue-50 p-10 flex flex-col items-center justify-center relative overflow-hidden">
            <div class="bg-white px-6 py-2 rounded-full shadow-lg border-2 border-blue-200 mb-8 transform -rotate-3 hover:rotate-0 transition duration-300 z-10">
                <span class="text-blue-500 font-black tracking-widest text-xs uppercase">✨ Area Khusus Member CALISTUNG</span>
            </div>

            <div class="relative w-48 h-48 mb-6 z-10">
                <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="100" r="90" fill="#FCD34D" />
                    <circle cx="65" cy="90" r="35" fill="white" stroke="#374151" stroke-width="4" />
                    <circle cx="135" cy="90" r="35" fill="white" stroke="#374151" stroke-width="4" />
                    <circle id="left-eye" cx="65" cy="90" r="10" fill="#1F2937" />
                    <circle id="right-eye" cx="135" cy="90" r="10" fill="#1F2937" />
                </svg>
            </div>

            <h2 class="text-3xl font-display font-black text-gray-800 text-center mb-2">Selamat Datang!</h2>
            <p class="text-gray-500 text-center text-sm font-bold max-w-xs">
                Masukkan kunci rahasia kamu untuk membuka pintu kelas.
            </p>
        </div>

        <!-- Kanan: Form login -->
        <div class="w-full md:w-1/2 p-10 md:p-14 bg-white relative">

            <div class="md:hidden text-center mb-8">
                <h2 class="text-3xl font-black text-blue-600 font-display">Masuk Yuk!</h2>
            </div>

            {{-- FLASH MESSAGES --}}
            @if (session('success'))
                <div class="mb-6 bg-green-100 border-l-8 border-green-500 text-green-700 p-4 rounded-xl shadow-sm animate-wiggle">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('warning'))
                <div class="mb-6 bg-yellow-100 border-l-8 border-yellow-500 text-yellow-700 p-4 rounded-xl shadow-sm animate-wiggle">
                    {{ session('warning') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-100 border-l-8 border-red-500 text-red-700 p-4 rounded-xl shadow-sm animate-wiggle">
                    {{ session('error') }}
                </div>
            @endif

            {{-- VALIDATION ERRORS --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-100 border-l-8 border-red-500 text-red-700 p-4 rounded-xl shadow-sm animate-wiggle">
                    <p class="font-bold text-sm">Ups! Ada yang salah:</p>
                    <ul class="list-disc pl-4 text-sm mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM LOGIN --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                <div class="group">
                    <label class="block text-gray-700 font-black text-sm uppercase tracking-wider mb-2 ml-1">📧 Email Kamu</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-xl">👤</span>
                        </div>
                        <input type="email" name="email" class="input-fun w-full pl-12 pr-4 py-4 bg-gray-50 border-4 border-gray-100 rounded-2xl text-gray-800 font-bold placeholder-gray-300 focus:outline-none focus:bg-white focus:border-blue-400 transition-all duration-300" placeholder="nama@sekolah.id" required>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-gray-700 font-black text-sm uppercase tracking-wider mb-2 ml-1">🔑 Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-xl">🔒</span>
                        </div>
                        <input type="password" name="password" id="password-input" class="input-fun w-full pl-12 pr-4 py-4 bg-gray-50 border-4 border-gray-100 rounded-2xl text-gray-800 font-bold placeholder-gray-300 focus:outline-none focus:bg-white focus:border-yellow-400 transition-all duration-300" placeholder="********" required>
                    </div>
                </div>

                {{-- Login dengan Google --}}
                <div class="mt-6 text-center">
                    <a href="{{ route('redirect.google') }}" class="btn-google">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3">
                            <path fill="#4285F4" d="M533.5 278.4c0-18.5-1.6-36.4-4.7-53.7H272v101.5h146.9c-6.4 34.7-25.4 64.1-54.3 84v69.7h87.7c51.5-47.5 81.2-117.6 81.2-201.5z"/>
                            <path fill="#34A853" d="M272 544.3c73.5 0 135-24.3 180-66.1l-87.7-69.7c-24.3 16.3-55.6 25.9-92.3 25.9-70.9 0-131-47.9-152.5-112.4H28.3v70.7C73.2 489.5 167.3 544.3 272 544.3z"/>
                            <path fill="#FBBC05" d="M119.5 320.9c-5.6-16.9-8.8-34.9-8.8-53.4s3.2-36.5 8.8-53.4V143.4H28.3c-18.2 36.7-28.7 77.9-28.7 128.1s10.5 91.4 28.7 128.1l91.2-78.7z"/>
                            <path fill="#EA4335" d="M272 107.7c38.6 0 73.2 13.3 100.5 39.4l75.2-75.2C407.2 24.5 345.7 0 272 0 167.3 0 73.2 54.8 28.3 143.4l91.2 78.7c21.5-64.5 81.6-112.4 152.5-112.4z"/>
                        </svg>
                        <span>Masuk dengan Google</span>
                    </a>
                </div>

                {{-- Tombol Login --}}
                <button type="submit" class="w-full py-4 mt-4 rounded-2xl font-black text-white text-lg shadow-xl transform transition hover:scale-[1.02] active:scale-95 active:shadow-md animated-gradient-border p-1">
                    <div class="bg-blue-600 w-full h-full rounded-xl flex items-center justify-center py-3">
                        🚀 MELUNCUR KE KELAS
                    </div>
                </button>
            </form>

            <div class="mt-10 text-center border-t-2 border-dashed border-gray-100 pt-6">
                <p class="text-gray-400 font-bold text-sm mb-2">Belum punya akun?</p>
                <a href="{{ route('register') }}" class="inline-block text-pink-500 font-black text-lg hover:text-pink-600 transition underline decoration-4 decoration-pink-200 hover:decoration-pink-400">
                    Daftar Dulu Disini!
                </a>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT MATA --}}
<script>
    const passwordInput = document.getElementById('password-input');
    const leftEye = document.getElementById('left-eye');
    const rightEye = document.getElementById('right-eye');

    const baseLeftCX = 65,
          baseRightCX = 135,
          baseCY = 90;

    document.addEventListener('mousemove', (e) => {
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;

        const moveX = (x - 0.5) * 10;
        const moveY = (y - 0.5) * 10;

        leftEye.setAttribute('cx', baseLeftCX + moveX);
        leftEye.setAttribute('cy', baseCY + moveY);
        rightEye.setAttribute('cx', baseRightCX + moveX);
        rightEye.setAttribute('cy', baseCY + moveY);
    });

    passwordInput.addEventListener('focus', () => {
        leftEye.setAttribute('cy', 95);
        rightEye.setAttribute('cy', 95);
    });

    passwordInput.addEventListener('blur', () => {
        leftEye.setAttribute('cy', baseCY);
        rightEye.setAttribute('cy', baseCY);
    });
</script>
@endsection
