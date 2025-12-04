<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public function kehadirans()
    {
        return $this->hasMany(Kehadiran::class);
    }
}
