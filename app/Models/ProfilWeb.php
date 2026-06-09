<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilWeb extends BaseModel
{
    use HasFactory; 

    protected $table = 'profil_webs';

    // Mengizinkan semua kolom di tabel profil_webs untuk diisi (Mass Assignment)
    protected $fillable = [
        'judul_website',
        'deskripsi_singkat',
        'logo_website',
        'favicon_website',
        'alamat_kantor',
        'nomor_telepon',
        'link_facebook', 
        'link_instagram', 
        'link_youtube',   
        'google_maps',
    ];
}