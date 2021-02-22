<?php

namespace App\Http\Controllers\ca\administracion\productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\administracion\CA_ProductosSubcategoria;
use App\Modelos\ca\administracion\CA_ProductosCategoria;
use App\Http\Controllers\Controller;

class CA_ProductosSubcategoriaController extends Controller
{
   
    
    public function index()
    {

        $contenido = CA_ProductosSubcategoria::
        join('ca_productos_categoria', 'ca_productos_categoria.id', '=', 'ca_productos_subcategoria.categoria_id')
        ->select('ca_productos_subcategoria.id as id','ca_productos_subcategoria.estado as estado','ca_productos_subcategoria.nombre as nombre','ca_productos_categoria.nombre as nombre_categoria')
        ->where('ca_productos_subcategoria.empresa_id',session('id_empresa'))
        ->where('ca_productos_categoria.estado', 1)
        ->where('ca_productos_subcategoria.estado',1)
        ->get();


        $categorias = CA_ProductosCategoria::where('empresa_id', session('id_empresa'))->where('estado',1)->get();
        $action="listado";

        return view('cliente/administracion/productos/subcategoria/index', compact('contenido','action','categorias'));
    }

   
    public function store(Request $request)
    {
        
        $ca_prodsubcat = new CA_ProductosSubcategoria;
        
        $ca_prodsubcat->empresa_id = session('id_empresa');
        $ca_prodsubcat->user_create_id = Auth::user()->id;
        $ca_prodsubcat->estado = 1;
        $ca_prodsubcat->nombre = $request->nombre;
        $ca_prodsubcat->descripcion = $request->descripcion;
        $ca_prodsubcat->categoria_id = $request->categoria;
        $ca_prodsubcat->save();
        
        return redirect()->action('ca\administracion\productos\CA_ProductosSubcategoriaController@index');
    }

    public function estado($id,$estado)
    {
        $ca_prodsubcat = CA_ProductosCategoria::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
    
        if ($ca_prodsubcat){
                $ca_prodsubcat->estado = $estado;
                $ca_prodsubcat->save();
        }
       
        return redirect()->action('ca\administracion\productos\CA_ProductosSubcategoriaController@index');
    }

}