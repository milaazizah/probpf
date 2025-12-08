@extends('app')

@section('title', 'Pilihan Kelas')

@section('content')
<div class="space-y-16 pb-12">

    {{-- 1. HEADER: Judul Halaman --}}
    <div class="text-center container mx-auto px-4 pt-8">
        <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Investasi Masa Depan</span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 mt-2 mb-4">
            Pilih Paket Belajar <span class="text-yellow-500">Sesuai Kebutuhan</span>
        </h1>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg">
            Kami menyediakan berbagai program bimbingan belajar dengan kurikulum yang disesuaikan dengan tingkat pemahaman anak.
        </p>
    </div>

    {{-- 2. PRICING CARDS (Daftar Produk) --}}
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 align-top">

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-green-100 hover:shadow-2xl hover:-translate-y-2 transition duration-300 relative flex flex-col">
                <div class="h-3 bg-green-400 w-full"></div>
                <div class="p-8 flex-grow">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Calistung Ceria</h3>
                            <span class="text-xs font-bold text-green-600 bg-green-100 px-2 py-1 rounded-full">TK & PAUD</span>
                        </div>
                        <div class="text-4xl">🧸</div>
                    </div>
                    <p class="text-gray-500 text-sm mb-6">
                        Fokus melatih motorik halus, mengenal huruf, angka, dan membaca dasar dengan metode bermain.
                    </p>
                    <div class="mb-6">
                        <span class="text-3xl font-extrabold text-gray-800">Rp 150.000</span>
                        <span class="text-gray-500 text-sm">/ bulan</span>
                    </div>

                    <ul class="space-y-3 mb-8 text-sm text-gray-600">
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            2x Pertemuan / Minggu
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Durasi 60 Menit
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Maksimal 5 Anak / Kelas
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Gratis Modul Belajar
                        </li>
                    </ul>
                </div>
                <div class="p-6 bg-gray-50 border-t border-gray-100">
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20tertarik%20daftar%20Calistung" class="block w-full py-3 px-6 text-center rounded-xl font-bold text-green-600 bg-green-100 hover:bg-green-200 transition">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-2 border-blue-500 transform md:-translate-y-4 relative flex flex-col">
                <div class="absolute top-0 right-0 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg z-10">
                    TERLARIS 🏆
                </div>

                <div class="p-8 flex-grow">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">SD Juara Kelas</h3>
                            <span class="text-xs font-bold text-blue-600 bg-blue-100 px-2 py-1 rounded-full">Kelas 1 - 6 SD</span>
                        </div>
                        <div class="text-4xl">🎒</div>
                    </div>
                    <p class="text-gray-500 text-sm mb-6">
                        Pendampingan PR sekolah, persiapan ulangan harian, PTS, dan PAS agar nilai rapor memuaskan.
                    </p>
                    <div class="mb-6">
                        <span class="text-3xl font-extrabold text-gray-800">Rp 250.000</span>
                        <span class="text-gray-500 text-sm">/ bulan</span>
                    </div>

                    <ul class="space-y-3 mb-8 text-sm text-gray-600">
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            3x Pertemuan / Minggu
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Durasi 90 Menit
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Konsultasi PR Tiap Hari
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Try Out Ujian Sekolah
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Semua Mata Pelajaran
                        </li>
                    </ul>
                </div>
                <div class="p-6 bg-blue-600">
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20tertarik%20daftar%20SD%20Juara" class="block w-full py-3 px-6 text-center rounded-xl font-bold text-blue-600 bg-white hover:bg-blue-50 transition shadow-md">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-purple-100 hover:shadow-2xl hover:-translate-y-2 transition duration-300 relative flex flex-col">
                <div class="h-3 bg-purple-400 w-full"></div>
                <div class="p-8 flex-grow">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Privat Eksklusif</h3>
                            <span class="text-xs font-bold text-purple-600 bg-purple-100 px-2 py-1 rounded-full">SD / SMP</span>
                        </div>
                        <div class="text-4xl">💎</div>
                    </div>
                    <p class="text-gray-500 text-sm mb-6">
                        Guru datang ke rumah siswa. Waktu belajar fleksibel dan materi fokus pada kesulitan siswa.
                    </p>
                    <div class="mb-6">
                        <span class="text-3xl font-extrabold text-gray-800">Rp 75.000</span>
                        <span class="text-gray-500 text-sm">/ pertemuan</span>
                    </div>

                    <ul class="space-y-3 mb-8 text-sm text-gray-600">
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Jadwal Bebas Diatur
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            1 Guru 1 Siswa (Intensif)
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Laporan Perkembangan Harian
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Bebas Pilih Mata Pelajaran
                        </li>
                    </ul>
                </div>
                <div class="p-6 bg-gray-50 border-t border-gray-100">
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20tertarik%20daftar%20Privat" class="block w-full py-3 px-6 text-center rounded-xl font-bold text-purple-600 bg-purple-100 hover:bg-purple-200 transition">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- 3. FAQ SECTION --}}
    <div class="container mx-auto px-4 mt-16">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-gray-800">Pertanyaan Sering Diajukan (FAQ)</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2">
                    <span class="bg-blue-100 text-blue-600 rounded-full w-6 h-6 flex items-center justify-center text-xs">?</span>
                    Apakah ada biaya pendaftaran?
                </h4>
                <p class="text-gray-600 text-sm ml-8">Ya, biaya pendaftaran awal Rp 50.000 (sudah termasuk modul bulan pertama dan tas).</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2">
                    <span class="bg-blue-100 text-blue-600 rounded-full w-6 h-6 flex items-center justify-center text-xs">?</span>
                    Bagaimana jika anak berhalangan hadir?
                </h4>
                <p class="text-gray-600 text-sm ml-8">Bisa ganti hari (reschedule) asalkan memberitahu admin minimal 1 hari sebelumnya.</p>
            </div>
        </div>
    </div>

    {{-- 4. BANNER CTA FOTO --}}
    <div class="container mx-auto px-4 mt-8">
        <div class="bg-yellow-100 rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-2/3">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Belum yakin paket mana yang cocok?</h2>
                <p class="text-gray-700 mb-6">
                    Konsultasikan kebutuhan belajar anak Anda dengan tim akademik kami. Kami akan bantu merekomendasikan program terbaik.
                </p>
                <a href="{{ route('contact') }}" class="inline-block bg-gray-900 text-white font-bold py-3 px-8 rounded-full hover:bg-gray-800 transition">
                    Hubungi Kami Gratis
                </a>
            </div>
            <div class="md:w-1/3 flex justify-center">

                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                     alt="Konsultasi" class="rounded-2xl shadow-lg rotate-3 border-4 border-white w-48 md:w-64">
            </div>
        </div>
    </div>

</div>
@endsection
