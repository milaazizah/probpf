<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Jadwal;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MateriController extends Controller
{
    private $tipeMateri = ['video', 'dokumen', 'link', 'foto'];

    public function index()
    {
        $materis = Auth::user()->materis()->orderBy('created_at', 'desc')->paginate(10);
        return view('guru.materi.index', compact('materis'));
    }

    public function create()
    {
        $kelasOptions = ['Kelas A', 'Kelas B', 'Kelas C', 'Kelas D'];
        $mapelOptions = Auth::user()->jadwals()->select('mata_pelajaran')->distinct()->pluck('mata_pelajaran');
        return view('guru.materi.create', compact('kelasOptions', 'mapelOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'mata_pelajaran' => 'required|string|max:50',
            'tipe' => ['required', Rule::in($this->tipeMateri)],
            'deskripsi' => 'nullable|string',
            'materi_file' => 'nullable|file|max:50000', // Maks 50MB
            'materi_link' => 'nullable|url|max:2048',
        ]);

        $urlFile = null;

        if ($request->tipe === 'link' && $request->materi_link) {
            // Jika tipe link, simpan URL link
            $urlFile = $request->materi_link;
        } elseif ($request->hasFile('materi_file')) {
            // Jika tipe file (video/dokumen/foto), unggah dan simpan path
            $folder = $request->tipe === 'video' ? 'videos' : ($request->tipe === 'dokumen' ? 'documents' : 'photos');
            $path = $request->file('materi_file')->store('materi/' . $folder, 'public');
            $urlFile = Storage::url($path);
        } else {
            return redirect()->back()->withInput()->withErrors(['materi_file' => 'File atau link materi wajib diisi sesuai tipe.']);
        }

        Materi::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'kelas' => $request->kelas,
            'mata_pelajaran' => $request->mata_pelajaran,
            'tipe' => $request->tipe,
            'url_file' => $urlFile,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil ditambahkan!');
    }
  
    public function edit(Materi $materi)
    {
        // Pastikan Guru yang login adalah pemilik materi ini
        if ($materi->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit materi ini.');
        }

        $kelasOptions = Materi::select('kelas')->distinct()->pluck('kelas');
        $mapelOptions = Auth::user()->jadwals()->select('mata_pelajaran')->distinct()->pluck('mata_pelajaran');
        
        return view('guru.materi.edit', compact('materi', 'kelasOptions', 'mapelOptions'));
    }

    /** Proses update materi. */
    public function update(Request $request, Materi $materi)
    {
        if ($materi->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk memperbarui materi ini.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'mata_pelajaran' => 'required|string|max:50',
            'tipe' => ['required', Rule::in($this->tipeMateri)],
            'deskripsi' => 'nullable|string',
            'materi_file' => 'nullable|file|max:50000', 
            'materi_link' => 'nullable|url|max:2048',
        ]);
        
        $urlFile = $materi->url_file; // Pertahankan URL lama secara default

        if ($request->tipe === 'link' && $request->materi_link) {
            // Jika tipe link baru diinput, gunakan link baru
            $urlFile = $request->materi_link;
            
            // Jika materi sebelumnya adalah file, hapus file lama
            if ($materi->tipe !== 'link' && Storage::exists(str_replace('/storage/', 'public/', $materi->url_file))) {
                Storage::delete(str_replace('/storage/', 'public/', $materi->url_file));
            }
            
        } elseif ($request->hasFile('materi_file')) {
            // Jika ada file baru diunggah
            
            // 1. Hapus file lama jika ada dan bukan link
            if ($materi->tipe !== 'link' && Storage::exists(str_replace('/storage/', 'public/', $materi->url_file))) {
                 Storage::delete(str_replace('/storage/', 'public/', $materi->url_file));
            }
            
            // 2. Unggah file baru
            $folder = $request->tipe === 'video' ? 'videos' : ($request->tipe === 'dokumen' ? 'documents' : 'photos');
            $path = $request->file('materi_file')->store('public/materi/' . $folder);
            $urlFile = Storage::url($path);
        } elseif ($request->tipe !== 'link' && !$urlFile) {
             // Validasi jika bukan link dan tidak ada file baru diunggah, tapi file lama tidak ada
             return redirect()->back()->withInput()->withErrors(['materi_file' => 'File materi wajib ada. Silakan unggah ulang.']);
        }
        
        $materi->update([
            'judul' => $request->judul,
            'kelas' => $request->kelas,
            'mata_pelajaran' => $request->mata_pelajaran,
            'tipe' => $request->tipe,
            'url_file' => $urlFile,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil diperbarui!');
    }

    /** Hapus materi. */
    public function destroy(Materi $materi)
    {
        if ($materi->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus materi ini.');
        }

        // Hapus file dari storage (kecuali jika itu adalah link eksternal)
        if ($materi->tipe !== 'link') {
             // Konversi URL storage kembali ke path publik untuk dihapus
             if (Storage::exists(str_replace('/storage/', 'public/', $materi->url_file))) {
                Storage::delete(str_replace('/storage/', 'public/', $materi->url_file));
             }
        }
        
        $materi->delete();

        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil dihapus!');
    }

}
