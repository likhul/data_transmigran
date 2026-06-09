<?php

namespace App\Imports;

use App\Models\Transmigran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransmigranImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Transmigran([
            'nama_kepala_keluarga' => $row['nama_kepala_keluarga'],
            'jumlah_anggota'       => $row['jumlah_anggota'],
            'asal_daerah'          => $row['asal_daerah'],
            'kabupaten_id'         => $row['kabupaten_id'], 
            'uptd_id'              => $row['uptd_id'],      
            'tahun_penempatan'     => $row['tahun_penempatan'],
            'status'               => $row['status'] ?? 'Aktif',
        ]);
    }
}