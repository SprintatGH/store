<?php

namespace App\Modelos\ca\mail;

use Illuminate\Database\Eloquent\Model;
use App\Constants\Cliente as ConstCliente;
use App\Modelos\ca\mail\Configuraciones as config;
use App\Modelos\ca\mail\Plantillas as plan;
use DB;
use Mail as email; 

class Mail extends Model
{
    protected $table = 'ca_mail';

    protected $fillable = [
        'id','remitente_nombre','remitente_mail',
        'asunto','contenido','adjunto','user_id',
        'empresa_id','created_at','update_at'
    ];


    public static function enviarMail($asunto, $path, $nombreArchivo,$destinatarioMail,$mailEmpresa)
    {
        
        $archivo = $path . '/' . $nombreArchivo;
        $para = array($destinatarioMail->email,$mailEmpresa);
        $remitente = config::where('empresa_id', session('id_empresa'))->first();
        $dataEmail= (is_null($remitente['remitente_mail'])? 'contacto@sprintat.cl' : $remitente['remitente_mail']);
        $dataNombre = (is_null($remitente['remitente_nombre'])? 'Sprintat' : $remitente['remitente_nombre']);
        $data = ['foo' => 'baz'];
        $subject = $asunto;
            $for = $para;
            email::send('cliente.ventas.controlDespacho.email.mail',$data, function($msj) use($subject,$for,$archivo,$nombreArchivo,$dataEmail,$dataNombre){
                $msj->from($dataEmail,$dataNombre);
                $msj->subject($subject);
                $msj->to($for);
                $msj->attach($archivo, [
                    'as' => $nombreArchivo,
                    'mime' => 'application/pdf',
                ]);
            });

           // $this->guardarMail($data);

            return 'ok';
    }

    public function guardarMail()
    {

    }

    public static function contenidoMail($modulo)
    {
        $plantilla = plan::where('empresa_id',session('id_empresa'))->where('modulo_id',$modulo)->first();
        return $plantilla;
    }
    
}