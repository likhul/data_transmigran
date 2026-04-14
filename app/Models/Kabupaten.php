<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CatatLogAktivitas;

class Kabupaten extends BaseModel
{
    protected $fillable = ['nama_kabupaten'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transmigrans()
    {
        return $this->hasMany(Transmigran::class);
    }

    public function uptds()
    {
        return $this->hasMany(Uptd::class);
    }

    public function kecamatans() { return $this->hasMany(Kecamatan::class); }
}