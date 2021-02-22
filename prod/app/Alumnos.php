<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = 'alumnos';

    protected $fillable = [
        'id','rut'.'nombre','estado','edad','direccion','fecha_nacimiento','agno_escolar_id','avatar','sexo_id','empresa_id'
    ];
}
