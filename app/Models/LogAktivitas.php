<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    use HasFactory;

    protected $table = 'log_aktivitas';
    protected $guarded = []; // Izinkan semua kolom diisi

    // Relasi agar bisa memanggil nama user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}