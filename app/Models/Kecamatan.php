<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends BaseModel {
    protected $fillable = ['nama_kecamatan', 'kabupaten_id'];
    
    public function kabupaten() {
        return $this->belongsTo(Kabupaten::class);
    }

    public function uptds()
    {
        return $this->hasMany(Uptd::class, 'kecamatan_id', 'id');
    }
}