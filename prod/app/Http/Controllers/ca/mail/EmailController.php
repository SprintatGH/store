<?php

namespace App\Http\Controllers\ca\mail;

use Illuminate\Http\Request;
use Mail; 
use App\Http\Controllers\Controller;
use App\Modelos\ca\mail\configuraciones as config;
use App\Modelos\ca\mail\destinatarios as desti;
use App\Modelos\ca\mail\plantillas as plan;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ad\Modulos;
use DB;

class EmailController extends Controller
{

    public function index()
    {
        return view('cliente.ventas.controlDespacho.email.test');
    }

    public function configIndex()
    {

        $config = config::where('empresa_id',session('id_empresa'))->get();
        //dd($config);
        $action="listado";

        return view('cliente.mail.configuraciones', compact('config','action'));
    }

    public function configStore(Request $request)
    {

        $config = config::where('empresa_id',session('id_empresa'))->first();

        if (!$config)
        {
            $dataConfig = new config;
        }

        $config->remitente_nombre = $request->nombre;
        $config->remitente_mail = $request->email;
        $config->empresa_id = session('id_empresa');
        $config->user_id = Auth::user()->id;
        $config->save();

        return redirect()->action('ca\mail\EmailController@configIndex');

    }



    public function destiIndex()
    {
        $contenido = desti::where('empresa_id',session('id_empresa'))->where('estado',1)->get();
        //dd($config);
        $action="listado";

        return view('cliente.mail.destinatarios', compact('contenido','action'));
    }


    public function destiStore(Request $request)
    {

        $desti = new desti;

        $desti->estado = 1;
        $desti->nombre = $request->nombre;
        $desti->email = $request->email;
        $desti->empresa_id = session('id_empresa');
        $desti->user_id = Auth::user()->id;
        $desti->save();

        return redirect()->action('ca\mail\EmailController@destiIndex');

    }

    public function destiEdit($id)
    {
        $edit = desti::where('id',$id)->where('empresa_id', session('id_empresa'))->first();
        //dd($edit);
        return response()->json($edit);
    }

    public function destiUpdate(Request $request)
    {
        $desti = desti::where('id',$request->id)->where('empresa_id', session('id_empresa'))->first();

  
        $desti->nombre = $request->edit_nombre;
        $desti->email = $request->edit_email;
        $desti->save();

        return redirect()->action('ca\mail\EmailController@destiIndex');
    }


    public function planIndex()
    {
        //$contenido = plan::where('empresa_id',session('id_empresa'))->where('estado',1)->get();

        $contenido = DB::table('ca_mail_plantillas')         
        ->join('modulos','modulos.id','ca_mail_plantillas.modulo_id')        
        ->select('ca_mail_plantillas.id as id','ca_mail_plantillas.detalle','modulos.nombre','ca_mail_plantillas.estado')
        ->get();

        $action="listado";
        
        $modulosIn = plan::select('modulo_id')->where('empresa_id', session('id_empresa'))->where('estado',1)->get()->toArray();
        
        $modulos = DB::table('modulos')                
        ->select('id','nombre')
        ->whereNotIn('id', $modulosIn)
        ->get();

        return view('cliente.mail.plantillas', compact('contenido','action','modulos'));
    }

    public function planStore(Request $request)
    {

        $plan = new plan;

        $plan->estado = 1;
        $plan->detalle = $request->detalle;
        $plan->modulo_id = $request->modulo;
        $plan->empresa_id = session('id_empresa');
        $plan->user_id = Auth::user()->id;
        $plan->save();

        return redirect()->action('ca\mail\EmailController@destiIndex');

    }

    public function planEdit($id)
    {
        $edit = desti::where('id',$id)->where('empresa_id', session('id_empresa'))->first();
        //dd($edit);
        return response()->json($edit);
    }

    public function planUpdate(Request $request)
    {
        $desti = desti::where('id',$request->id)->where('empresa_id', session('id_empresa'))->first();

  
        $desti->nombre = $request->edit_nombre;
        $desti->email = $request->edit_email;
        $desti->save();

        return redirect()->action('ca\mail\EmailController@destiIndex');
    }


    public function contact(Request $request){
        $subject = "Asunto del correo";
        $for = "jpablo.basualdo@gmail.com";
        Mail::send('cliente.ventas.controlDespacho.email.mail',$request->all(), function($msj) use($subject,$for){
            $msj->from("jpablo.basualdo@gmail.com","Juan Pablo Basualdo");
            $msj->subject($subject);
            $msj->to($for);
        });
        return view('cliente.ventas.controlDespacho.email.test');
    }
}