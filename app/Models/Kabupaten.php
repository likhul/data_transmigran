<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $fillable = ['nama_kabupaten'];

    // Relasi: Satu Kabupaten memiliki banyak Transmigran
    public function transmigrans()
    {
        return $this->hasMany(Transmigran::class);
    }

    public function uptds()
    {
        return $this->hasMany(Uptd::class);
    }
}