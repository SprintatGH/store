<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'id','nombre','estado','direccion','telefono','email','razon_social,rut','contacto_nombre', 'contacto_email', 'contacto_telefono', 'logo'
    ];
}
