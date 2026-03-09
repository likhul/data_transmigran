<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kabupaten;

class KabupatenSeeder extends Seeder
{
    public function run(): void
    {
        $kabupatens = [
            'Kabupaten Kerinci',             // ID: 1
            'Kabupaten Merangin',            // ID: 2
            'Kabupaten Sarolangun',          // ID: 3
            'Kabupaten Batanghari',          // ID: 4
            'Kabupaten Muaro Jambi',         // ID: 5
            'Kabupaten Tanjung Jabung Timur',// ID: 6
            'Kabupaten Tanjung Jabung Barat',// ID: 7
            'Kabupaten Tebo',                // ID: 8
            'Kabupaten Bungo',               // ID: 9
            'Kota Jambi',                    // ID: 10
            'Kota Sungai Penuh'              // ID: 11
        ];

        foreach ($kabupatens as $kab) {
            Kabupaten::create(['nama_kabupaten' => $kab]);
        }
    }
}