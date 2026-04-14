<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        // 1. Setup Data Profil Website (Wajib agar tidak error di halaman depan)
        \App\Models\ProfilWeb::updateOrCreate(
            ['id' => 1],
            [
                'nama_instansi' => 'Dinas Tenaga Kerja dan Transmigrasi Jambi',
                'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            ]
        );

        // 2. Setup Akun Super Admin (Bisa berulang kali dijalankan tanpa error)
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@gmail.com'], 
            [
                'name' => 'Super Admin',
                'password' => bcrypt('admin123'),
                'role' => 'superadmin',
            ]
        );

        // 3. Panggil File Seeder Wilayah (Sesuai Urutan Hierarki)
        // Pastikan kamu sudah mengisi file-file ini sesuai kode yang saya berikan sebelumnya
        $this->call([
            KabupatenSeeder::class,
            KecamatanSeeder::class,
            MasterUptdSeeder::class,
        ]);

        // Pesan sukses di terminal
        $this->command->info('Profil Web, Akun Admin, dan Data Master Wilayah Berhasil Ditanam! 🌱');
    }
}