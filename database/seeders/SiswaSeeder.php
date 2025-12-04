<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswas = [
            [
                'nama_siswa' => 'Budi Santoso', 
                'nis' => 'S1001', 
                'kelas' => 'Kelas A'
            ],
            [
                'nama_siswa' => 'Citra Dewi', 
                'nis' => 'S1002', 
                'kelas' => 'Kelas A'
            ],
        ];

        foreach ($siswas as $data) {
            Siswa::firstOrCreate(
                ['nis' => $data['nis']], // Kolom yang digunakan untuk mencari (asumsi NIS unik)
                [
                    'nama_siswa' => $data['nama_siswa'],
                    'kelas' => $data['kelas'],
                  
                ]
            );
        }
    }
}
