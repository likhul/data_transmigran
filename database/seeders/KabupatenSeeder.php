<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Kabupaten;

class KabupatenSeeder extends Seeder
{
    public function run(): void
    {
        $kabupatens = [
            'Tanjung Jabung Timur',
            'Tanjung Jabung Barat',
            'Bungo',
            'Merangin',
            'Sarolangun',
            'Muaro Jambi',
            'Batang hari',
            'Tebo',
        ];

        foreach ($kabupatens as $kab) {
            Kabupaten::updateOrCreate(['nama_kabupaten' => $kab]);
        }
    }
}