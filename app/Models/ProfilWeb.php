<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilWeb extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_website',
        'deskripsi_singkat',
        'foto_struktur',
        'alamat_kantor',
        'nomor_telepon',
        'logo_website',
        'favicon_website',
        'link_facebook',
        'link_instagram',
        'link_youtube',
        'google_maps'
    ];
}