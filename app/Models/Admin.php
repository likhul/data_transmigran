<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Penting untuk fitur Login

class Admin extends Authenticatable
{
    protected $fillable = [
        'username',
        'password',
    ];
}