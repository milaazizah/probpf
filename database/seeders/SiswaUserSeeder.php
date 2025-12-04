<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiswaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Siswa yang akan dihubungkan (ID ini merujuk ke siswas.id yang sudah ada)
        $siswaDataToLink = [
            [
                'siswa_id_lama' => 1, // ID Budi Santoso di tabel siswas
                'name' => 'Budi Santoso',
                'email' => 'budi@siswa.com',
                'password' => 'password',
            ],
            [
                'siswa_id_lama' => 2, // ID Citra Dewi di tabel siswas
                'name' => 'Citra Dewi',
                'email' => 'citra@siswa.com',
                'password' => 'password',
            ]
        ];

        foreach ($siswaDataToLink as $data) {
            // 1. Buat User baru di tabel 'users'
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'role' => 'siswa', // ROLE SEBAGAI SISWA
                    'password' => Hash::make($data['password']), // HASH PASSWORD
                ]
            );

            // 2. Hubungkan User ID dengan Siswa di tabel 'siswas'
            // Kita mencari siswa berdasarkan ID lama mereka di tabel siswas
            $siswa = Siswa::find($data['siswa_id_lama']);
            
            if ($siswa) {
                // UPDATE KOLOM user_id di tabel siswas
                $siswa->user_id = $user->id;
                $siswa->save();
            }
        }
    }
}