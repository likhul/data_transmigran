<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterUptd;
use App\Models\Kecamatan;
use App\Models\Kabupaten;

class MasterUptdSeeder extends Seeder
{
    public function run(): void
    {
        $dataUptd = [
            'Tanjung Jabung Timur' => [
                'Rantau Rasau' => ['Rantau Rasau I', 'Rantau Rasau II', 'Rantau Rasau III', 'Rantau Rasau IV', 'Rantau Rasau V', 'Rantau Rasau VI', 'Rantau Rasau VII'],
                'Dendang' => ['Dendang I', 'Dendang II', 'Dendang III', 'Dendang IV', 'Dendang V'],
                'Muara Sabak' => ['Lambur I', 'Lambur II', 'Pamusiran', 'Lagan Ulu I', 'Lagan Ulu II', 'Lagan Ulu III', 'Lagan Simpang Pandan'],
                'Mendahara' => ['Simpang Pandan I', 'Simpang Pandan II', 'Simpang Pandan III'],
            ],
            'Tanjung Jabung Barat' => [
                'Tungkal Ulu' => ['Tebing Tinggi I', 'Tebing Tinggi II', 'Merlung V', 'Merlung VI', 'Merlung VII', 'Merlung VIII', 'Merlung IX', 'Suban'],
                'Pembantu Merlung' => ['Merlung I', 'Merlung II', 'Merlung III', 'Merlung IV'],
            ],
            'Bungo' => [
                'Jujuhan' => ['Jujuhan Blok E', 'Jujuhan Blok FG'],
                'Pelepat' => ['Kuamang Kuning I', 'Kuamang Kuning III', 'Kuamang Kuning IV', 'Kuamang Kuning V', 'Kuamang Kuning VI', 'Kuamang Kuning VII', 'Kuamang Kuning X', 'Kuamang Kuning XIV', 'Kuamang Kuning XV', 'Kuamang Kuning XVI', 'Kuamang Kuning XVII', 'Kuamang Kuning XIX', 'Pelepat II'],
                'Tabir' => ['Kuamang Kuning VIII', 'Kuamang Kuning IX'],
                'Muaro Bungo' => ['Dusun Danau'],
                'Tanah Tumbuh' => ['Jujuhan I', 'Jujuhan II', 'Desa Datar', 'Jujuhan III', 'Jujuhan IV', 'Jujuhan V'],
                'Rantau Pandan' => ['Desa Pelepat', 'Rantau Pandan I', 'Rantau Pandan II', 'Rantau Pandan III', 'Rantau Pandan IV', 'Rantau Pandan V']
            ],
            'Merangin' => [
                'Pemenang' => ['Pemenang I', 'Pemenang II', 'Pemenang III', 'Pemenang IV', 'Pemenang VI', 'Pemenang VII', 'Pemenang VIII', 'Pemenang IX', 'Kubang Ujo I', 'Kubang Ujo II', 'Kubang Ujo III'],
                'Bangko' => ['Pemenang V', 'Pemenang X', 'Pemenang XI', 'Pemenang XII', 'Tiang Pumpung'],
                'Tabir' => ['Hitam Ulu I', 'Hitam Ulu II', 'Hitam Ulu III', 'Hitam Ulu IV', 'Hitam Ulu IX'],
                'Sei. Bengkal' => ['Hitam Ulu V', 'Hitam Ulu VI'],
                'Muaro Siau' => ['Baru Nalo', 'Pulau Bayur'],
                'Nalo Gedang' => ['Nalo Gedang'],
                'Muaro Bungo' => ['Kuamang Kuning XI', 'Kuamang Kuning XII', 'Kuamang Kuning XIII'],
                'Tabir Ulu' => ['Batang Kibul I', 'Batang Kibul II'],
                '-' => ['Pulau Tebakar']
            ],
            'Muaro Jambi' => [
                'Kumpeh Ulu' => [
                    'Kumpeh Ulu I', 'Kumpeh Ulu II', 'Petaling', 'Sungai Gelam I', 
                    'Sungai Gelam II', 'Sungai Gelam III', 'Arang-Arang', 'G. Karya/ Jebus/ Sei Aur'
                ],
                'Sungai Bahar' => [
                    'Sungai Bahar I', 'Sungai Bahar II', 'Sungai Bahar III', 'Sungai Bahar IV',
                    'Sungai Bahar V', 'Sungai Bahar VI', 'Sungai Bahar VII', 'Sungai Bahar VIII',
                    'Sungai Bahar IX', 'Sungai Bahar X', 'Sungai Bahar XI', 'Sungai Bahar XII',
                    'Sungai Bahar XIII', 'Sungai Bahar XIV', 'Sungai Bahar XV', 'Sungai Bahar XVI',
                    'Sungai Bahar XVII', 'Sungai Bahar XVIII', 'Sungai Bahar XIX', 'Sungai Bahar XX',
                    'Sungai Bahar XXI', 'Sungai Bahar XXII', 'Rawa Pudak'
                ]
            ],
            'Batang Hari' => [
                'Batin XXIV' => ['Durian Luncuk I', 'Durian Luncuk II', 'Durian Luncuk VII'],
                'Mestong' => ['Kilangan I', 'Kilangan II'],
                'Muara Bulian' => ['Muara Bulian I', 'Muara Bulian III', 'Muara Bulian IV'],
                'Pemayung' => ['Muara Bulian II', 'Muara Bulian V'],
                'Mersam' => ['Mersam I', 'Mersam II', 'Mersam III', 'Mersam IV'],
                'Bathin XXIV' => ['Metagoal'],
                'Maro Sebo' => ['Tebing Jaya I', 'Tebing Jaya II', 'Tebing Jaya III', 'Tebing Jaya IV']
            ],

            // --- DATA BARU TEBO ---
            'Tebo' => [
                'Rimbo Bujang' => [
                    'Rimbo Bujang I', 'Rimbo Bujang II', 'Rimbo Bujang III', 'Rimbo Bujang IV', 'Rimbo Bujang V', 
                    'Rimbo Bujang VI', 'Rimbo Bujang VII', 'Rimbo Bujang VIII', 'Rimbo Bujang IX', 'Rimbo Bujang X', 
                    'Rimbo Bujang XI', 'Rimbo Bujang XII', 'Rimbo Bujang XV', 
                    'Alai Ilir Blok A', 'Alai Ilir Blok BC', 'Alai Ilir Blok D', 'Alai Ilir Blok E', 'Alai Ilir Blok F'
                ],
                'Tebo Ulu' => [
                    'Batang Sumai I', 'Batang Sumai II', 'Batang Sumai III', 'Batang Sumai IV', 
                    'Sungai Karang', 'Hitam Ulu VIII', 'Batang Sumai V'
                ],
                'Tuju Koto' => [
                    'Hitam Ulu VII'
                ]
            ]
        ];

        foreach ($dataUptd as $namaKabupaten => $kecamatans) {
            $kabupaten = Kabupaten::where('nama_kabupaten', $namaKabupaten)->first();
            
            if ($kabupaten) {
                foreach ($kecamatans as $namaKecamatan => $uptds) {
                    $kecamatan = Kecamatan::where('nama_kecamatan', $namaKecamatan)
                                          ->where('kabupaten_id', $kabupaten->id)
                                          ->first();
                    
                    if ($kecamatan) {
                        foreach ($uptds as $namaUptd) {
                            MasterUptd::updateOrCreate([
                                'nama_uptd' => $namaUptd,
                                'kecamatan_id' => $kecamatan->id
                            ]);
                        }
                    }
                }
            }
        }
    }
}