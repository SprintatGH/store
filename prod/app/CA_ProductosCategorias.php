<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ca_productos_categoria extends Model
{
    protected $table = 'ca_productos_categoria';

    protected $fillable = [
        'id','estado','nombre','descripcion','empresa_id','user_create_id'
    ];
}

