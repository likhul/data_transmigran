<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uptd extends Model
{
    protected $fillable = ['kabupaten_id', 'nama_uptd', 'tahun', 'total_kk', 'total_jiwa'];

    public function kabupaten() {
        return $this->belongsTo(Kabupaten::class);
    }
}
