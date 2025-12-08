@extends('app')

@section('title', 'Hubungi Kami')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="space-y-12 pb-12">

    {{-- 1. HEADER SECTION --}}
    <div class="text-center container mx-auto px-4 pt-8">
        <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Pusat Bantuan</span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 mt-2 mb-4">
            Yuk, Ngobrol dengan <span class="text-yellow-500">Kami!</span>
        </h1>
        <p class="text-gray-500 max-w-2xl mx-auto text-lg">
            Punya pertanyaan soal biaya, jadwal, atau metode belajar? Tim kami siap menjawab semua pertanyaan Ayah & Bunda.
        </p>
    </div>

    {{-- 2. CONTENT GRID (Info & Form) --}}
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1 bg-blue-600 rounded-[2.5rem] p-8 text-white shadow-xl relative overflow-hidden flex flex-col justify-between h-full min-h-[500px]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-bl-full"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-yellow-400 opacity-20 rounded-tr-full"></div>

                <div class="relative z-10 space-y-8">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Kantor Pusat</h3>
                        <p class="text-blue-100">Datang dan lihat langsung fasilitas belajar kami.</p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                                <svg class="w-6 h-6 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Alamat</h4>
                                <p class="text-blue-100 text-sm leading-relaxed">Jl. Jend. Sudirman No. 45, Pekanbaru, Riau, Indonesia</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                                <svg class="w-6 h-6 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Telepon / WA</h4>
                                <p class="text-blue-100 text-sm">+62 812-3456-7890</p>
                                <p class="text-blue-200 text-xs mt-1">Senin - Sabtu (08.00 - 17.00)</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                                <svg class="w-6 h-6 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Email</h4>
                                <p class="text-blue-100 text-sm">tanya@rumahbelajar.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative z-10 mt-8 rounded-2xl overflow-hidden h-48 shadow-lg border-2 border-white/30">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127669.05077933641!2d101.36559186952803!3d0.5105450630365995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aea443c42f81%3A0xdb5f7e6b9604d17d!2sPekanbaru%2C%20Pekanbaru%20City%2C%20Riau!5e0!3m2!1sen!2sid!4v1625567891234!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>

            <div class="lg:col-span-2 bg-white rounded-[2.5rem] p-8 md:p-12 shadow-lg border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>

                <form id="contactForm" action="" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2 text-sm">Nama Ayah/Bunda</label>
                            <input type="text" required class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 rounded-xl focus:outline-none focus:bg-white focus:border-blue-500 transition" placeholder="Contoh: Ibu Budi">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2 text-sm">Nomor WhatsApp</label>
                            <input type="number" required class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 rounded-xl focus:outline-none focus:bg-white focus:border-blue-500 transition" placeholder="08123xxxxx">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Tertarik Paket Apa?</label>
                        <select class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 rounded-xl focus:outline-none focus:bg-white focus:border-blue-500 transition cursor-pointer">
                            <option>Pilih Paket Belajar...</option>
                            <option>TK & PAUD (Calistung)</option>
                            <option>Sekolah Dasar (SD)</option>
                            <option>Privat ke Rumah</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-8">
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Pesan / Pertanyaan</label>
                        <textarea required class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 rounded-xl focus:outline-none focus:bg-white focus:border-blue-500 h-40 transition resize-none" placeholder="Tuliskan pertanyaan Ayah/Bunda di sini..."></textarea>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-600 text-white font-bold py-4 px-10 rounded-full shadow-lg hover:bg-blue-700 hover:-translate-y-1 transition transform flex items-center gap-2">
                            Kirim Pesan
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Rumah%20Belajar..."
       target="_blank"
       class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white py-3 px-5 rounded-full shadow-xl flex items-center gap-2 transition-all duration-300 transform hover:-translate-y-1 z-50 no-underline">

        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>

        <span class="font-bold whitespace-nowrap">Hubungi WA</span>
    </a>

</div>

{{-- SCRIPT UNTUK SWEETALERT --}}
<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah refresh halaman sementara

        // Tampilkan Notifikasi Sukses
        Swal.fire({
            title: 'Pesan Terkirim!',
            text: 'Terima kasih Ayah/Bunda, tim kami akan segera membalas pesan Anda.',
            icon: 'success',
            confirmButtonColor: '#2563EB', // Warna biru
            confirmButtonText: 'Siap!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Reset form setelah diklik Oke
                document.getElementById('contactForm').reset();
            }
        });
    });
</script>
@endsection
