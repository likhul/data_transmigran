<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $fillable = [
        'transmigran_id', 
        'jenis_mutasi', 
        'tanggal_mutasi', 
        'keterangan'
    ];

    // Relasi: Mutasi ini milik satu Transmigran tertentu
    public function transmigran()
    {
        return $this->belongsTo(Transmigran::class);
    }
}