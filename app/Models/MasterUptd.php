<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUptd extends Model
{
    use HasFactory;

    // INI BARIS YANG KEMARIN SAYA LUPA TULIS (Membuka izin input data)
    protected $fillable = ['kabupaten_id', 'nama_uptd'];

    // Relasi balik ke Kabupaten (Opsional tapi bagus untuk skripsi)
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}