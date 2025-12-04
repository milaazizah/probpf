<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswas')->insert([
            ['nama_siswa' => 'Budi Santoso', 'nis' => 'S1001', 'kelas' => '10 IPA 1'],
            ['nama_siswa' => 'Citra Dewi', 'nis' => 'S1002', 'kelas' => '10 IPA 1'],
            ['nama_siswa' => 'Doni Kusuma', 'nis' => 'S1101', 'kelas' => '11 IPS 2'],
            ['nama_siswa' => 'Rina Sastrawan', 'nis' => 'S1102', 'kelas' => '11 IPS 1'], // Siswa baru
        ]);
    }
}
