<?php

namespace App\Modelos\ca\mail;

use Illuminate\Database\Eloquent\Model;
use App\Constants\Cliente as ConstCliente;
use DB;

class Plantillas extends Model
{
    protected $table = 'ca_mail_plantillas';

    protected $fillable = [
        'id','estado','detalle','modulo_id','user_id','empresa_id','created_at','updated_at'
    ];


    
}