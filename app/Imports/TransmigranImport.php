<?php

namespace App\Imports;

use App\Models\Transmigran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransmigranImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Pastikan nama kolom di file Excel huruf kecil semua (contoh: nama_kepala_keluarga, asal_daerah)
        return new Transmigran([
            'nama_kepala_keluarga' => $row['nama_kepala_keluarga'],
            'jumlah_anggota'       => $row['jumlah_anggota'],
            'asal_daerah'          => $row['asal_daerah'],
            'kabupaten_id'         => $row['kabupaten_id'], // Di excel wajib diisi angka ID Kabupaten
            'uptd_id'              => $row['uptd_id'],      // Di excel wajib diisi angka ID UPTD
            'tahun_penempatan'     => $row['tahun_penempatan'],
            'status'               => $row['status'] ?? 'Aktif',
        ]);
    }
}