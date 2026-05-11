<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilWeb extends BaseModel
{
    use HasFactory; // Biasakan menaruh trait (use) di baris paling atas dalam class

    protected $table = 'profil_webs';

    // Mengizinkan semua kolom di tabel profil_webs untuk diisi (Mass Assignment)
    protected $fillable = [
        'judul_website',
        'deskripsi_singkat',
        'logo_website',
        'favicon_website',
        'alamat_kantor',
        'nomor_telepon',
        'link_facebook', // Pastikan ini ada
        'link_instagram', // Pastikan ini ada
        'link_youtube',   // Pastikan ini ada
        'google_maps',
    ];
}