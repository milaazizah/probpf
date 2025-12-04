<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'siswa_id', 
        'jadwal_id', 
        'pekan_1', 
        'pekan_2', 
        'pekan_3', 
        'pekan_4', 
        'rata_rata',
        'user_id',
        'mata_pelajaran',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function jadwal()
    {
        // Relasi ke jadwal (untuk tahu mapel dan guru)
        return $this->belongsTo(Jadwal::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
