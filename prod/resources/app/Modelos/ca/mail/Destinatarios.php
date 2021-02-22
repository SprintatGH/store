<?php

namespace App\Modelos\ca\mail;

use Illuminate\Database\Eloquent\Model;
use App\Constants\Cliente as ConstCliente;
use DB;

class Destinatarios extends Model
{
    protected $table = 'ca_mail_destinatarios';

    protected $fillable = [
        'id','estado','nombre','email','user_id','empresa_id','created_at','updated_at'
    ];


    
}