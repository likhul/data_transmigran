<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kecamatan;
use App\Models\Kabupaten;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        $dataKecamatan = [
            'Tanjung Jabung Timur' => ['Rantau Rasau', 'Dendang', 'Muara Sabak', 'Mendahara'],
            'Tanjung Jabung Barat' => ['Tungkal Ulu', 'Pembantu Merlung'],
            'Bungo' => ['Jujuhan', 'Pelepat', 'Tabir', 'Muaro Bungo', 'Tanah Tumbuh', 'Rantau Pandan'],
            'Merangin' => ['Pemenang', 'Bangko', 'Tabir', 'Sei. Bengkal', 'Muaro Siau', 'Nalo Gedang', 'Muaro Bungo', 'Tabir Ulu', '-'],
            'Muaro Jambi' => ['Kumpeh Ulu', 'Sungai Bahar'],
            'Batang Hari' => ['Batin XXIV', 'Mestong', 'Muara Bulian', 'Pemayung', 'Mersam', 'Bathin XXIV', 'Maro Sebo'],
            
            // --- DATA BARU TEBO ---
            'Tebo' => ['Rimbo Bujang', 'Tebo Ulu', 'Tuju Koto']
        ];

        foreach ($dataKecamatan as $namaKabupaten => $kecamatans) {
            $kabupaten = Kabupaten::where('nama_kabupaten', $namaKabupaten)->first();
            
            if ($kabupaten) {
                foreach ($kecamatans as $kec) {
                    Kecamatan::updateOrCreate([
                        'nama_kecamatan' => $kec,
                        'kabupaten_id' => $kabupaten->id
                    ]);
                }
            }
        }
    }
}