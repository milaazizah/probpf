<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Bimbel',
                'email' => 'admin@bimbel.com',
                'role' => 'admin',
                // Pastikan password ini unik dan kuat
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(), 
            ],
            [
                'name' => 'Bapak Guru Aji',
                'email' => 'aji@bimbel.com',
                'role' => 'guru',
                // Pastikan password ini unik dan kuat
                'password' => Hash::make('password'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Jika ada user lain (misalnya Guru Budi), tambahkan di sini
        ];
        foreach ($users as $userData) {
            // Menggunakan firstOrCreate: 
            // 1. Cek berdasarkan 'email'. 
            // 2. Jika email sudah ada, record tidak dibuat (menghindari error duplikasi).
            // 3. Jika email belum ada, record baru dibuat dengan data lengkap.
            User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'role' => $userData['role'],
                    'password' => $userData['password'],
                    
                ]
            );
        }
    }
}
