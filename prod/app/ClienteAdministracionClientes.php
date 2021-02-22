<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = 'cliente_administracion_cliente';

    protected $fillable = [
        'id','rut'.'nombre','estado','edad','direccion','fecha_nacimiento','avatar','sexo_id','empresa_id'
    ];
}