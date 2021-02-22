<?php

namespace App\Http\Controllers\ca\materiaPrima\productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\materiaPrima\CA_ProductosCategoria;
use App\Http\Controllers\Controller;

class CA_ProductosCategoriaController extends Controller
{
    
    
    public function index()
    {
        $contenido = CA_ProductosCategoria::where('sucursal_id',session('sucursal'))->where('estado',1)->get();

        $action="listado";

        return view('cliente/materiaPrima/productos/categoria/index', compact('contenido','action'));
    }

    public function DTindex()
    {
        $contenido = CA_ProductosCategoria::where('sucursal_id',session('sucursal'))->where('estado',1)->get();

        $array_result = json_decode($contenido,true);

       
        return $array_result;
    }
   
    public function store(Request $request)
    {
                
        $ca_prodcat = new CA_ProductosCategoria;
        
        $ca_prodcat->sucursal_id = session('sucursal');
        $ca_prodcat->user_create_id = Auth::user()->id;
        $ca_prodcat->estado = 1;
        $ca_prodcat->nombre = $request->nombre;
        $ca_prodcat->descripcion = $request->descripcion;
        $ca_prodcat->save();
        
        return redirect()->action('ca\materiaPrima\productos\CA_ProductosCategoriaController@index');
    }


    public function estado($id,$estado)
    {
        $ca_prodcat = CA_ProductosCategoria::where('id',$id)->where('sucursal_id',session('sucursal'))->first();
    
        if ($ca_prodcat){
                $ca_prodcat->estado = $estado;
                $ca_prodcat->save();
        }
       
        return redirect()->action('ca\materiaPrima\productos\CA_ProductosCategoriaController@index');
    }
}