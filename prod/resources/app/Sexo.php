<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = 'sexo';

    protected $fillable = [
        'id','nombre','estado', 'empresa_id'
    ];
}
