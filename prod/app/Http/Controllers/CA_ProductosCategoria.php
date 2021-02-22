<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CA_ProductosCategoria;

class CA_ProductosCategoriaController extends Controller
{
   
    
    public function index()
    {
        $contenido = CA_ProductosCategoria::where('empresa_id',session('id_empresa'))->where('estado',1)->paginate(10);

        $action="listado";

        return view('cliente/administracion/productos/categoria/index', compact('contenido','action'));
    }

    
    public function store(Request $request)
    {
                
        $ca_prodcat = new CA_ProductosCategoria;
        
        $ca_prodcat->empresa_id = session('id_empresa');
        $ca_prodcat->user_create_id = Auth::user()->id;
        $ca_prodcat->estado = 1;
        $ca_prodcat->nombre = $request->nombre;
        $ca_prodcat->descripcion = $request->descripcion;
        $ca_prodcat->save();
        
        return redirect()->action('CA_ProductosCategoriaController@index');
    }

   
}