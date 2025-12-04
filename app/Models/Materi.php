<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'kelas',
        'mata_pelajaran',
        'tipe',
        'url_file',
        'deskripsi',
    ];

    // Relasi ke Guru yang mengupload
    public function guru()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}