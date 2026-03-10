<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $fillable = ['nama', 'gelar', 'jabatan', 'foto', 'urutan'];
}
