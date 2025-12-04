<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public function user()
    {
        // Siswa dimiliki oleh satu User, kuncinya adalah siswas.user_id ke users.id
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function kehadirans()
    {
        return $this->hasMany(Kehadiran::class);
    }
    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
