<?php



namespace App\Http\Controllers\ca\ventas\parametros;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Modelos\ca\ventas\parametros\CA_EstadoPago;



class CA_EstadoPagoController extends Controller

{

    public function index()
    {
        return view('cliente/ventas/parametros/estadoPago');
    }



    public function DTindex()
    {
        $contenido = CA_EstadoPago::index();

        $array_result = json_decode($contenido,true);

        return $array_result;

    }


    public function store(Request $request)
    {
        $nuevoestado = new CA_EstadoPago();

        $nuevoestado->estado= 1;
        $nuevoestado->nombre= $request->nombre;
        $nuevoestado->user_create_id = Auth::user()->id;
        $nuevoestado->sucursal_id= session('sucursal');
        $nuevoestado->save();

        return view('cliente/ventas/parametros/estadoPago');
    }


    public function edit($id)
    {
        $estado = CA_EstadoPago::where('id', $id)->where('estado',1)->where('sucursal_id',session('sucursal'))->first();

        return response()->json($estado); 
    }



    public function update(Request $request)
    {
        $estado = CA_EstadoPago::where('id', $request->edit_id)->where('estado',1)->where('sucursal_id',session('sucursal'))->first();

        if ($estado)
        {
            $estado->nombre = $request->edit_nombre;
            $estado->save();
        }

        return view('cliente/ventas/parametros/estadoPago');
    }


    public function estado($id)
    {
        $estado = CA_EstadoPago::where('id', $id)->where('estado',1)->where('sucursal_id',session('sucursal'))->first();

        if ($estado)
        {
            $estado->estado = 0;
            $estado->save();
        }

        return view('cliente/ventas/parametros/estadoPago');
    }

}