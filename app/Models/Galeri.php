<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends BaseModel
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan semua kolom diisi
    protected $guarded = [];
}