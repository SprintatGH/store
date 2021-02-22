<?php

namespace App\Modelos\ad;

use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    protected $table = 'modulos';

    protected $fillable = [
        'id', 'nombre', 'descripcion', 'estado', 'created_at', 'updated_at'
    ];
}