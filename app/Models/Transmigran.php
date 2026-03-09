<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Memanggil fitur Soft Deletes

class Transmigran extends Model
{
    use SoftDeletes; // Mengaktifkan fitur Soft Deletes

    protected $fillable = [
        'nama_kepala_keluarga', 
        'jumlah_anggota', 
        'asal_daerah', 
        'kabupaten_id', 
        'tahun_penempatan', 
        'status'
    ];

    // Relasi: Transmigran ini milik satu Kabupaten tertentu
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }

    public function uptd()
    {
        // Relasi ke model MasterUptd (sesuaikan nama model master Anda)
        // Jika nama model Anda adalah MasterUptd, gunakan MasterUptd::class
        return $this->belongsTo(MasterUptd::class, 'uptd_id');
    }

    // Relasi: Satu Transmigran bisa memiliki banyak riwayat Mutasi
    public function mutasis()
    {
        return $this->hasMany(Mutasi::class);
    }
}