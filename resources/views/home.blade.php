@extends('app')

@section('title', 'Beranda')

@section('content')
<div class="space-y-20 pb-12 overflow-x-hidden">

    {{-- 1. HERO SECTION: Ceria & Mengundang --}}
    <div class="container mx-auto px-4 pt-8 lg:pt-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="space-y-6 text-center lg:text-left order-2 lg:order-1 relative z-10">
                <div class="inline-block bg-yellow-100 text-yellow-700 font-bold py-2 px-4 rounded-full text-sm uppercase tracking-wider mb-2 animate-bounce">
                    👋 Halo Ayah & Bunda!
                </div>
                <h1 class="text-4xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
                    Buat Belajar Jadi <br>
                    <span class="text-blue-600 relative">
                        Lebih Seru
                        <svg class="absolute w-full h-3 -bottom-1 left-0 text-yellow-400 opacity-60" viewBox="0 0 200 9" fill="currentColor"><path d="M2.00025 6.99999C21.5003 2.99999 48.0002 1.00002 75.0002 2.50002C105.5 4.16669 135.5 8.33335 162.5 7.00002C182.5 6.01169 196.501 3.50002 198.001 2.00002"/></svg>
                    </span>
                    Dari Main Game!
                </h1>
                <p class="text-lg text-gray-600 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                    Rumah Belajar membantu anak meningkatkan prestasi akademik tanpa rasa tertekan. Metode kami: <b>Paham Konsep, Bukan Hafalan.</b>
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-4">
                    <a href="{{ route('products.public') }}" class="bg-blue-600 text-white font-bold py-4 px-8 rounded-full shadow-xl hover:bg-blue-700 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        <span>🚀</span> Pilih Kelas
                    </a>
                    <a href="{{ route('about') }}" class="bg-white text-blue-600 border-2 border-blue-100 font-bold py-4 px-8 rounded-full hover:bg-blue-50 transition flex items-center justify-center">
                        Kenalan Yuk
                    </a>
                </div>

                <div class="pt-6 flex items-center justify-center lg:justify-start gap-3 opacity-90">
                    <div class="flex -space-x-2">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=1" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=5" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=8" alt="User">
                    </div>
                    <div class="text-sm text-gray-500">
                        <span class="font-bold text-gray-800">500+ Siswa</span> bergabung bulan ini.
                    </div>
                </div>
            </div>

            <div class="relative order-1 lg:order-2">
                <div class="absolute top-10 right-10 bg-blue-200 w-64 h-64 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
                <div class="absolute -bottom-8 -left-8 bg-yellow-200 w-64 h-64 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-8 right-20 bg-pink-200 w-64 h-64 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>

                <img src="https://i2.wp.com/aksesprivat.com/wp-content/uploads/2021/04/13.-Kelebihan-Calistung-dan-Manfaatnya-untuk-Prestasi-Anak.jpg"
                     alt="Anak Ceria Belajar"
                     class="relative w-full rounded-[2.5rem] shadow-2xl transform rotate-2 border-4 border-white z-10 hover:rotate-0 transition duration-500">
            </div>
        </div>
    </div>

    {{-- 2. SECTION PROGRAM PILIHAN (Highlight) --}}
    <div class="bg-blue-50 py-16 rounded-[3rem] mx-4 lg:mx-8">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Program Favorit</h2>
                <p class="text-gray-600">Kelas yang dirancang khusus sesuai usia tumbuh kembang anak.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <a href="{{ route('products.public') }}" class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition duration-300 border border-transparent hover:border-green-200 group">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition">🧸</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">TK & PAUD</h3>
                    <p class="text-gray-500 text-sm mb-4">Belajar Calistung (Baca, Tulis, Hitung) sambil bermain puzzle dan dongeng.</p>
                    <span class="text-green-600 font-bold text-sm flex items-center gap-1">Lihat Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                </a>

                <a href="{{ route('products.public') }}" class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition duration-300 border border-transparent hover:border-blue-200 group relative">
                    <div class="absolute top-4 right-4 bg-red-100 text-red-600 text-xs font-bold px-2 py-1 rounded-lg">POPULER</div>
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition">🎒</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Sekolah Dasar (SD)</h3>
                    <p class="text-gray-500 text-sm mb-4">Bimbingan PR harian, persiapan UH/PTS/PAS untuk semua mata pelajaran.</p>
                    <span class="text-blue-600 font-bold text-sm flex items-center gap-1">Lihat Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                </a>

                <a href="{{ route('products.public') }}" class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition duration-300 border border-transparent hover:border-purple-200 group">
                    <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition">🏡</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Privat ke Rumah</h3>
                    <p class="text-gray-500 text-sm mb-4">Guru datang ke rumah. Jadwal fleksibel, materi fokus pada kesulitan anak.</p>
                    <span class="text-purple-600 font-bold text-sm flex items-center gap-1">Lihat Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                </a>
            </div>
        </div>
    </div>

    {{-- 3. MENGAPA MEMILIH KAMI (Poin Plus) --}}
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <img src=" https://www.citrakasih.sch.id/wp-content/uploads/2024/09/calistung-baca-tulis-hitung.jpg"
                     class="rounded-3xl shadow-lg transform -rotate-2 border-4 border-yellow-100" alt="Guru Mengajar">
                <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-2xl shadow-lg flex items-center gap-3 border border-gray-100 animate-bounce">
                    <div class="bg-yellow-100 p-2 rounded-full text-2xl">⭐</div>
                    <div>
                        <p class="font-bold text-gray-800 text-lg">4.9/5.0</p>
                        <p class="text-xs text-gray-500">Rating Orang Tua</p>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <h2 class="text-3xl font-bold text-gray-800">Kenapa Anak Betah Belajar di Sini?</h2>

                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex-shrink-0 flex items-center justify-center text-blue-600 text-xl font-bold">1</div>
                    <div>
                        <h4 class="font-bold text-lg text-gray-800">Pendekatan Personal</h4>
                        <p class="text-gray-600 text-sm">Satu guru maksimal pegang 5 anak, jadi setiap anak dapat perhatian penuh.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex-shrink-0 flex items-center justify-center text-green-600 text-xl font-bold">2</div>
                    <div>
                        <h4 class="font-bold text-lg text-gray-800">Laporan Harian via WA</h4>
                        <p class="text-gray-600 text-sm">Bunda bisa pantau perkembangan belajar anak setiap hari lewat laporan digital.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex-shrink-0 flex items-center justify-center text-orange-600 text-xl font-bold">3</div>
                    <div>
                        <h4 class="font-bold text-lg text-gray-800">Fasilitas Lengkap</h4>
                        <p class="text-gray-600 text-sm">Ruang AC, WiFi, Modul berwarna, dan Snack sehat saat istirahat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. CTA: GRATIS COBA KELAS --}}
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[2.5rem] p-8 md:p-16 text-center relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-white opacity-10 rounded-full"></div>
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-yellow-300 opacity-20 rounded-full"></div>

            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Masih Ragu? Coba Gratis Dulu Aja!</h2>
                <p class="text-blue-100 text-lg mb-8">
                    Dapatkan 1x pertemuan gratis (Free Trial) untuk melihat apakah metode kami cocok dengan buah hati Anda.
                </p>
                <a href="{{ route('contact') }}" class="inline-block bg-yellow-400 text-yellow-900 font-bold text-lg py-4 px-10 rounded-full shadow-lg hover:bg-yellow-300 transition transform hover:scale-105">
                    👉 Klaim Voucher Trial
                </a>
                <p class="mt-4 text-blue-200 text-sm">*Slot terbatas setiap minggunya</p>
            </div>
        </div>
    </div>

</div>
@endsection
