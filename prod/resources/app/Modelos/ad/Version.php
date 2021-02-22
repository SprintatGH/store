<?php

namespace App\Modelos\ad;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $table = 'version';

    protected $fillable = [
        'id','etiqueta','descripcion','estado','estado_fecha','user_id', 'created_at', 'updated_at'
    ];
}