<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUptd extends BaseModel
{
    use HasFactory;

    // INI BARIS YANG KEMARIN SAYA LUPA TULIS (Membuka izin input data)
    protected $fillable = ['kabupaten_id', 'kecamatan_id', 'nama_uptd'];

    // Relasi balik ke Kabupaten (Opsional tapi bagus untuk skripsi)
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}