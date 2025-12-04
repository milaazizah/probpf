<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'mata_pelajaran', 
        'kelas', 
        'hari', 
        'waktu_mulai', 
        'waktu_selesai'
    ];

    public function guru()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'jadwal_id');
    }
}
