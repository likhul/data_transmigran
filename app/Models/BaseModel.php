<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    // Kosongkan saja isinya. 
    // Kita biarkan file ini tetap ada agar model lain yang terlanjur 
    // pakai 'extends BaseModel' tidak ikut error.
}