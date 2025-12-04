<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Bimbel',
                'email' => 'admin@bimbel.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bapak Guru Aji',
                'email' => 'aji@bimbel.com',
                'password' => Hash::make('password'),
                'role' => 'guru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
