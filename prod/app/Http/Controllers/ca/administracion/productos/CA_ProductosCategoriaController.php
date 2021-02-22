<?php

namespace App\Http\Controllers\ca\administracion\productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\administracion\CA_ProductosCategoria;
use App\Http\Controllers\Controller;

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
        
        return redirect()->action('ca\administracion\productos\CA_ProductosCategoriaController@index');
    }


    public function estado($id,$estado)
    {
        $ca_prodcat = CA_ProductosCategoria::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
    
        if ($ca_prodcat){
                $ca_prodcat->estado = $estado;
                $ca_prodcat->save();
        }
       
        return redirect()->action('ca\administracion\productos\CA_ProductosCategoriaController@index');
    }
}