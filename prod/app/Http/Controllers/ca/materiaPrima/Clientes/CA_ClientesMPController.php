<?php

namespace App\Http\Controllers\ca\materiaPrima\clientes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\materiaPrima\CA_Clientes;
use App\Modelos\ca\administracion\CM_TipoClientes;
use App\Http\Controllers\Controller;
use App\Modelos\ca\administracion\CA_Productos;
use App\Modelos\ca\administracion\CA_PreciosEspeciales;

class CA_ClientesMPController extends Controller
{
   
    
    public function index()
    {
       
        $cm_tipo_cliente = CM_TipoClientes::where('estado',1)->get();

        return view('cliente/materiaPrima/clientes/index', compact('cm_tipo_cliente'));
    }

    public function DTindex()
    {
        $contenido = CA_Clientes::where('sucursal_id',session('sucursal'))->where('estado',1)->get();
        $dataArray = json_decode($contenido, true);

        return $dataArray;
    }
    

    public function store(Request $request)
    {
        
        $ca_cli = new CA_Clientes;

        $fecha_inicio = date('Y-m-d', strtotime($request->inicio));
        $fecha_termino = date('Y-m-d', strtotime($request->termino));

        $ca_cli->sucursal_id = session('sucursal');
        $ca_cli->tipo_cliente_id = $request->tipo_cliente;
        $ca_cli->user_create_id = Auth::user()->id;
        $ca_cli->estado = 1;
        $ca_cli->nombre = $request->nombre;
        $ca_cli->giro = $request->giro;
        $ca_cli->direccion = $request->direccion;
        $ca_cli->telefono = $request->telefono;
        $ca_cli->email = $request->email;
        $ca_cli->save();
        
        return redirect()->action('ca\materiaPrima\clientes\CA_ClientesMPController@index');
    }

    
    
    public function edit($id)
    {
         $ca_cli = CA_Clientes::where('id',$id)->where('sucursal_id',session('sucursal'))->first();
         return response()->json($ca_cli);
    }


    public function update(Request $request)
    {
        
        $ca_cli = CA_Clientes::where('id',$request->id)->where('sucursal_id',session('sucursal'))->first();
        if ($ca_cli){

            $ca_cli->tipo_cliente_id = $request->tipo_cliente;
            $ca_cli->nombre = $request->nombre;
            $ca_cli->giro = $request->giro;
            $ca_cli->direccion = $request->direccion;
            $ca_cli->telefono = $request->telefono;
            $ca_cli->email = $request->email;
            $ca_cli->save();
        }

        return redirect()->action('ca\materiaPrima\clientes\CA_ClientesMPController@index');
    }


    public function estado($id,$estado)
    {
        $ca_cli = CA_Clientes::where('id',$id)->where('sucursal_id',session('sucursal'))->first();
    
        if ($ca_cli){
                $ca_cli->estado = $estado; 
                $ca_cli->save();
        }
       
        return redirect()->action('ca\materiaPrima\clientes\CA_ClientesMPController@index');
    }


}
