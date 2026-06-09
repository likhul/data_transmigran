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
        \App\Models\ProfilWeb::updateOrCreate(
            ['id' => 1],
            [
                'nama_instansi' => 'Dinas Tenaga Kerja dan Transmigrasi Jambi',
                'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            ]
        );

        \App\Models\User::updateOrCreate(
            ['email' => 'admin@gmail.com'], 
            [
                'name' => 'Super Admin',
                'password' => bcrypt('admin123'),
                'role' => 'superadmin',
            ]
        );

        $this->call([
            KabupatenSeeder::class,
            KecamatanSeeder::class,
            MasterUptdSeeder::class,
        ]);

        $this->command->info('Profil Web, Akun Admin, dan Data Master Wilayah Berhasil Ditanam! 🌱');
    }
}