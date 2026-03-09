<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    use HasFactory;

    protected $table = 'log_aktivitas'; // Memastikan nama tabelnya benar

    protected $fillable = [
        'user_id',
        'aksi',
        'modul',
        'keterangan'
    ];

    // Relasi untuk mengambil nama pelaku
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}