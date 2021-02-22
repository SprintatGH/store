<?php

namespace App\Http\Controllers\ca\materiaPrima\productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\materiaPrima\CA_ProductosSubcategoria;
use App\Modelos\ca\materiaPrima\CA_ProductosCategoria;
use App\Http\Controllers\Controller;

class CA_ProductosSubcategoriaController extends Controller
{
   
    
    public function index()
    {

        $contenido = CA_ProductosSubcategoria::
        join('ca_mp_categoria', 'ca_mp_categoria.id', '=', 'ca_mp_subcategoria.categoria_id')
        ->select('ca_mp_subcategoria.id as id','ca_mp_subcategoria.estado as estado','ca_mp_subcategoria.nombre as nombre','ca_mp_categoria.nombre as nombre_categoria')
        ->where('ca_mp_subcategoria.sucursal_id',session('sucursal'))
        ->where('ca_mp_categoria.estado', 1)
        ->where('ca_mp_subcategoria.estado',1)
        ->get();


        $categorias = CA_ProductosCategoria::where('sucursal_id', session('sucursal'))->where('estado',1)->get();
        $action="listado";

        return view('cliente/materiaPrima/productos/subcategoria/index', compact('contenido','action','categorias'));
    }


    public function DTindex()
    {

        $contenido = CA_ProductosSubcategoria::
        join('ca_mp_categoria', 'ca_mp_categoria.id', '=', 'ca_mp_subcategoria.categoria_id')
        ->select('ca_mp_subcategoria.id as id','ca_mp_subcategoria.estado as estado','ca_mp_subcategoria.nombre as nombre','ca_mp_categoria.nombre as nombre_categoria')
        ->where('ca_mp_subcategoria.sucursal_id',session('sucursal'))
        ->where('ca_mp_categoria.estado', 1)
        ->where('ca_mp_subcategoria.estado',1)
        ->get();


        $array_result = json_decode($contenido,true);

       
        return $array_result;
    }
   
    public function store(Request $request)
    {
        
        $ca_prodsubcat = new CA_ProductosSubcategoria;
        
        $ca_prodsubcat->sucursal_id = session('sucursal');
        $ca_prodsubcat->user_create_id = Auth::user()->id;
        $ca_prodsubcat->estado = 1;
        $ca_prodsubcat->nombre = $request->nombre;
        $ca_prodsubcat->descripcion = $request->descripcion;
        $ca_prodsubcat->categoria_id = $request->categoria;
        $ca_prodsubcat->save();
        
        return redirect()->action('ca\materiaPrima\productos\CA_ProductosSubcategoriaController@index');
    }

    public function estado($id,$estado)
    {
        $ca_prodsubcat = CA_ProductosCategoria::where('id',$id)->where('empresa_id',session('id_empresa'))->first();
    
        if ($ca_prodsubcat){
                $ca_prodsubcat->estado = $estado;
                $ca_prodsubcat->save();
        }
       
        return redirect()->action('ca\materiaPrima\productos\CA_ProductosSubcategoriaController@index');
    }

}