<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uptd extends BaseModel
{
    protected $fillable = [
        'tahun_penyerahan', 'kabupaten_id', 'kecamatan_id', 'nama_upt', 
        'waktu_penempatan', 'kk_awal', 'jiwa_awal', 'status_desa', 
        'nama_desa_baru', 'kk_baru', 'jiwa_baru', 'no_ba_penyerahan', 
        'pola', 'permasalahan'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
