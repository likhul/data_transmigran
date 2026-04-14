<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends BaseModel
{
    use HasFactory;

    // 👇 TAMBAHKAN BARIS INI: Mendaftarkan kolom yang boleh diisi
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'user_id'
    ];

    // (Opsional) Relasi ke User pembuat berita
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}