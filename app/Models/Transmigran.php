<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Kecamatan;

class Transmigran extends BaseModel
{
    use SoftDeletes; // Mengaktifkan fitur Soft Deletes

    protected $fillable = [
        'nama_kepala_keluarga', 
        'jumlah_anggota', 
        'asal_daerah', 
        'kabupaten_id', 
        'kecamatan_id', // Cek apakah ini sudah ada?
        'nama_desa',    // Cek apakah ini sudah ada?
        'tahun_penempatan', 
        'status'
    ];

    // Relasi: Transmigran ini milik satu Kabupaten tertentu
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
    
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    // Relasi: Satu Transmigran bisa memiliki banyak riwayat Mutasi
    public function mutasis()
    {
        return $this->hasMany(Mutasi::class);
    }

    public function getKecamatan($kabupaten_id)
    {
        try {
            $data = Kecamatan::where('kabupaten_id', $kabupaten_id)
                        ->orderBy('nama_kecamatan', 'asc')
                        ->get();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}