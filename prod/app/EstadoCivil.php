<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estado_civil';

    protected $fillable = [
        'id','nombre','estado', 'empresa_id'
    ];
}
