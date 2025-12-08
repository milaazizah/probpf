@extends('app')

@section('title', 'Tentang Kami')

@section('content')
<div class="space-y-16 pb-12 overflow-hidden">

    {{-- SECTION 1: HERO (Ceria & Anak-anak) --}}
    <div class="container mx-auto px-4 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6 order-2 md:order-1">
                <div class="inline-block bg-orange-100 text-orange-600 py-2 px-4 rounded-full text-sm font-bold mb-2">
                    🎈 Teman Belajar Si Kecil
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 leading-tight">
                    Bikin Belajar Jadi <span class="text-blue-500">Petualangan Seru!</span>
                </h1>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Di Calistung, kami percaya bahwa setiap anak itu jenius dengan caranya sendiri. Kami hadir untuk membantu anak-anak memahami pelajaran sekolah dengan cara yang asik, santai, dan jauh dari kata membosankan.
                </p>
                <div class="flex gap-4">
                    <div class="bg-blue-50 px-4 py-2 rounded-lg border border-blue-100">
                        <span class="block font-bold text-blue-600 text-xl">Calistung</span>
                        <span class="text-xs text-gray-500">Membaca, Menulis, Berhitung</span>
                    </div>
                    <div class="bg-green-50 px-4 py-2 rounded-lg border border-green-100">
                        <span class="block font-bold text-green-600 text-xl">Mapel SD</span>
                        <span class="text-xs text-gray-500">Matematika, IPA, B.Inggris</span>
                    </div>
                </div>
            </div>

            <div class="relative order-1 md:order-2">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                <div class="absolute -left-4 -bottom-4 w-24 h-24 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>


                <img src="https://cnc-magazine.oramiland.com/parenting/images/aplikasi-belajar-bahasa-asing-unt.width-800.format-webp.webp"
                     alt="Anak-anak belajar dengan ceria"
                     class="relative rounded-3xl shadow-2xl w-full object-cover h-80 md:h-96 transform hover:rotate-2 transition duration-500">
            </div>
        </div>
    </div>

    {{-- SECTION 2: VISI KAMI (Fokus Karakter Anak) --}}
    <div class="bg-blue-50 py-16 rounded-3xl mx-4">
        <div class="container mx-auto px-4 text-center max-w-3xl">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Impian Kami</h2>
            <p class="text-xl text-gray-600 leading-relaxed italic">
                "Menciptakan generasi yang tidak hanya pintar secara akademik, tapi juga memiliki rasa ingin tahu yang tinggi, percaya diri, dan bahagia saat belajar."
            </p>
        </div>
    </div>

    {{-- SECTION 3: MENGAPA KAMI (Friendly Icons) --}}
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Kenapa Ayah & Bunda Memilih Kami?</h2>
            <p class="text-gray-500 mt-2">Kenyamanan anak adalah prioritas utama kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
                <div class="w-16 h-16 mx-auto bg-yellow-100 rounded-full flex items-center justify-center text-3xl mb-4">
                    🧩
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Metode "Play & Learn"</h3>
                <p class="text-gray-500">Kami menyelipkan permainan edukatif agar materi sulit jadi mudah dimengerti.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
                <div class="w-16 h-16 mx-auto bg-red-100 rounded-full flex items-center justify-center text-3xl mb-4">
                    ❤️
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Guru yang Sabar</h3>
                <p class="text-gray-500">Kakak pengajar yang ramah, sabar, dan bisa menjadi sahabat bagi anak.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
                <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center text-3xl mb-4">
                    🏡
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Suasana Homy</h3>
                <p class="text-gray-500">Ruang kelas yang nyaman, bersih, dan aman seperti belajar di rumah sendiri.</p>
            </div>

        </div>
    </div>

    {{-- SECTION 4: Call to Action --}}
    <div class="container mx-auto px-4 text-center pb-8">
        <div class="bg-blue-600 rounded-2xl p-8 md:p-12 text-white relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-3xl font-bold mb-4">Siap Membantu Anak Juara di Sekolah?</h2>
                <p class="mb-8 text-blue-100">Konsultasikan kebutuhan belajar buah hati Anda sekarang. Gratis uji coba kelas pertama!</p>
                <a href="{{ route('contact') }}" class="bg-yellow-400 text-yellow-900 font-bold py-3 px-8 rounded-full hover:bg-yellow-300 transition shadow-lg transform hover:-translate-y-1">
                    Hubungi Kakak Admin
                </a>
            </div>

            <div class="absolute top-0 left-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-x-16 -translate-y-16"></div>
            <div class="absolute bottom-0 right-0 w-40 h-40 bg-white opacity-10 rounded-full translate-x-16 translate-y-16"></div>
        </div>
    </div>

</div>
@endsection
