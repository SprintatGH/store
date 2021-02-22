<?php

namespace App\Modelos\ad\modulos\administracion\productos;

use Illuminate\Database\Eloquent\Model;

class Formatos extends Model
{
    protected $table = 'formatos';

    protected $fillable = [
        'id','nombre','estado','empresa_id'
    ];
}