<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterUptd;

class MasterUptdSeeder extends Seeder
{
    public function run(): void
    {
        $uptd_data = [
            // 1. Kerinci
            ['kabupaten_id' => 1, 'nama_uptd' => 'UPTD Kayu Aro'],
            
            // 2. Merangin
            ['kabupaten_id' => 2, 'nama_uptd' => 'UPTD Hitam Ulu'],
            ['kabupaten_id' => 2, 'nama_uptd' => 'UPTD Pamenang'],
            ['kabupaten_id' => 2, 'nama_uptd' => 'UPTD Tabir'],
            
            // 3. Sarolangun
            ['kabupaten_id' => 3, 'nama_uptd' => 'UPTD Singkut'],
            ['kabupaten_id' => 3, 'nama_uptd' => 'UPTD Mandiangin'],
            
            // 4. Batanghari
            ['kabupaten_id' => 4, 'nama_uptd' => 'UPTD Bajubang'],
            ['kabupaten_id' => 4, 'nama_uptd' => 'UPTD Maro Sebo Ulu'],
            
            // 5. Muaro Jambi
            ['kabupaten_id' => 5, 'nama_uptd' => 'UPTD Sungai Bahar'],
            ['kabupaten_id' => 5, 'nama_uptd' => 'UPTD Kumpeh Ulu'],
            
            // 6. Tanjung Jabung Timur
            ['kabupaten_id' => 6, 'nama_uptd' => 'UPTD Rantau Rasau (KTM)'],
            ['kabupaten_id' => 6, 'nama_uptd' => 'UPTD Geragai'],
            
            // 7. Tanjung Jabung Barat
            ['kabupaten_id' => 7, 'nama_uptd' => 'UPTD Tebing Tinggi'],
            ['kabupaten_id' => 7, 'nama_uptd' => 'UPTD Pengabuan'],
            
            // 8. Tebo
            ['kabupaten_id' => 8, 'nama_uptd' => 'UPTD Rimbo Bujang'],
            ['kabupaten_id' => 8, 'nama_uptd' => 'UPTD Rimbo Ulu'],
            ['kabupaten_id' => 8, 'nama_uptd' => 'UPTD Rimbo Ilir'],
            
            // 9. Bungo
            ['kabupaten_id' => 9, 'nama_uptd' => 'UPTD Kuamang Kuning'],
            ['kabupaten_id' => 9, 'nama_uptd' => 'UPTD Pelepat Ilir'],
            
            // 10 & 11. Wilayah Kota (Biasanya administratif, kita beri nama UPTD Dinas)
            ['kabupaten_id' => 10, 'nama_uptd' => 'UPTD Dinas Kota Jambi'],
            ['kabupaten_id' => 11, 'nama_uptd' => 'UPTD Dinas Sungai Penuh'],
        ];

        foreach ($uptd_data as $data) {
            MasterUptd::create($data);
        }
    }
}