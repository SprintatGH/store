<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CM_TipoClientes extends Model
{
    protected $table = 'cm_tipo_clientes';

    protected $fillable = [
        'id','estado'.'descripcion'
    ];
}