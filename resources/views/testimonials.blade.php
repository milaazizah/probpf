@extends('app')

@section('title', 'Kisah Sukses')

@section('content')
<div class="space-y-16 pb-12">

    {{-- 1. HEADER SECTION --}}
    <div class="text-center container mx-auto px-4 pt-8">
        <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Kata Mereka</span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 mt-2 mb-4">
            Cerita Bahagia <span class="text-yellow-500">Ayah & Bunda</span>
        </h1>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg">
            Ribuan siswa telah merasakan perubahan positif. Bukan hanya nilai yang naik, tapi semangat belajar yang tumbuh kembali.
        </p>
    </div>

    {{-- 2. TESTIMONIAL GRID --}}
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white p-8 rounded-3xl shadow-lg border-t-4 border-blue-500 hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-1 text-yellow-400 mb-4">
                    ★★★★★
                </div>
                <p class="text-gray-600 italic mb-6 text-lg">
                    "Awalnya Kevin benci banget sama Matematika. Tapi setelah 3 bulan di Rumah Belajar, nilainya naik drastis dari 60 jadi 90! Gurunya pinter banget ambil hati anak."
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/150?img=5" alt="Bunda Kevin" class="w-12 h-12 rounded-full border-2 border-blue-100">
                    <div>
                        <h4 class="font-bold text-gray-800">Bunda Rina</h4>
                        <p class="text-xs text-gray-500">Orang tua Kevin (Kelas 5 SD)</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-lg border-t-4 border-yellow-500 hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-1 text-yellow-400 mb-4">
                    ★★★★★
                </div>
                <p class="text-gray-600 italic mb-6 text-lg">
                    "Yang paling saya suka, anak saya jadi gak perlu disuruh-suruh lagi buat belajar. Dia malah yang ngajak berangkat les duluan. Suasananya asik katanya."
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/150?img=9" alt="Mama Putri" class="w-12 h-12 rounded-full border-2 border-yellow-100">
                    <div>
                        <h4 class="font-bold text-gray-800">Ibu Sarah</h4>
                        <p class="text-xs text-gray-500">Orang tua Putri (Kelas 2 SD)</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-lg border-t-4 border-green-500 hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-1 text-yellow-400 mb-4">
                    ★★★★★
                </div>
                <p class="text-gray-600 italic mb-6 text-lg">
                    "Metode calistungnya top banget! Anak saya umur 5 tahun sekarang sudah lancar baca buku cerita. Kakak pengajarnya sabar luar biasa."
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/150?img=12" alt="Ayah Budi" class="w-12 h-12 rounded-full border-2 border-green-100">
                    <div>
                        <h4 class="font-bold text-gray-800">Pak Budi Santoso</h4>
                        <p class="text-xs text-gray-500">Ayah Rafa (TK B)</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-lg border-t-4 border-purple-500 hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-1 text-yellow-400 mb-4">
                    ★★★★★
                </div>
                <p class="text-gray-600 italic mb-6 text-lg">
                    "Saya ambil paket privat ke rumah. Sangat membantu karena jadwal saya sibuk. Laporan harian via WA sangat detail, jadi saya tau progres anak."
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/150?img=3" alt="Mama Dinda" class="w-12 h-12 rounded-full border-2 border-purple-100">
                    <div>
                        <h4 class="font-bold text-gray-800">Ibu Diana</h4>
                        <p class="text-xs text-gray-500">Wiraswasta</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-lg border-t-4 border-red-500 hover:-translate-y-1 transition duration-300">
                <div class="flex items-center gap-1 text-yellow-400 mb-4">
                    ★★★★★
                </div>
                <p class="text-gray-600 italic mb-6 text-lg">
                    "Persiapan Ujian Nasional jadi tenang. Latihan soalnya akurat dan pembahasannya mudah dimengerti anak. Alhamdulillah lulus dengan nem tinggi."
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/150?img=11" alt="Ayah Dimas" class="w-12 h-12 rounded-full border-2 border-red-100">
                    <div>
                        <h4 class="font-bold text-gray-800">Pak Hendra</h4>
                        <p class="text-xs text-gray-500">Ayah Dimas (Kelas 6 SD)</p>
                    </div>
                </div>
            </div>

             <div class="bg-blue-600 p-8 rounded-3xl shadow-lg flex flex-col justify-center text-center text-white transform scale-105">
                <div class="text-6xl opacity-20 mb-4">❝</div>
                <h3 class="text-xl font-bold mb-2">Bergabunglah dengan mereka!</h3>
                <p class="text-blue-100 mb-6">Berikan pendidikan terbaik untuk buah hati tercinta.</p>
                <a href="{{ route('contact') }}" class="bg-white text-blue-600 font-bold py-2 px-4 rounded-full hover:bg-blue-50 transition">
                    Daftar Sekarang
                </a>
            </div>

        </div>
    </div>

    {{-- 3. VIDEO SECTION (Optional Placeholder) --}}
    <div class="container mx-auto px-4 mt-12">
        <div class="bg-yellow-50 rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Lihat Keseruan Belajar di Sini</h2>
                <p class="text-gray-600 mb-6">
                    Intip bagaimana suasana kelas kami yang interaktif. Tidak ada rasa takut salah, semua anak didukung untuk berani mencoba.
                </p>
                <div class="flex gap-4">
                    <div class="text-center">
                        <span class="block text-2xl font-bold text-blue-600">98%</span>
                        <span class="text-xs text-gray-500">Anak Happy</span>
                    </div>
                    <div class="text-center">
                        <span class="block text-2xl font-bold text-blue-600">90%</span>
                        <span class="text-xs text-gray-500">Nilai Naik</span>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 w-full">
                <div class="aspect-video bg-gray-800 rounded-2xl shadow-2xl relative flex items-center justify-center group cursor-pointer overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Video Cover" class="absolute w-full h-full object-cover opacity-50 group-hover:scale-105 transition duration-500">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center relative z-10 shadow-lg group-hover:scale-110 transition">
                        <svg class="w-6 h-6 text-blue-600 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
