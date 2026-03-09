<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // Memanggil model Admin
use Illuminate\Support\Facades\Hash; // Memanggil fitur enkripsi password

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('password123'), // Password akan otomatis dienkripsi
        ]);
    }
}