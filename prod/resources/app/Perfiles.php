<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    protected $fillable = [
        'nombre', 'estado','avatar'
    ];
}
