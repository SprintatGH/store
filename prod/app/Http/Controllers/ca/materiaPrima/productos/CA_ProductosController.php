<?php

namespace App\Http\Controllers\ca\materiaPrima\productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modelos\ca\materiaPrima\CA_Productos;
use App\Modelos\ca\materiaPrima\CA_ProductosCategoria;
use App\Modelos\ca\materiaPrima\CA_ProductosSubcategoria;
use App\Modelos\ca\materiaPrima\CA_ProductosStock;
use App\User;
use File;
use PDF;
use App\Modelos\ca\materiaPrima\CA_ProductosFormato;
use App\Modelos\ad\materiaPrima\ProductoFormato;
use App\Http\Controllers\Controller;

class CA_ProductosController extends Controller
{
   
    
    public function index()
    { 
     
        $contenido = CA_Productos:: 
        join('ca_productos_subcategoria','ca_productos_subcategoria.id','ca_mp_productos.subcategoria_id')
        ->join('ca_productos_categoria', 'ca_productos_categoria.id', '=', 'ca_productos_subcategoria.categoria_id')
        ->select(   'ca_mp_productos.id as id',
                    'ca_mp_productos.estado as estado',
                    'ca_mp_productos.avatar as avatar',
                    'ca_mp_productos.nombre as nombre',
                    'ca_mp_productos.stock_minimo',
                    'ca_mp_productos.precio_por_mayor',
                    'ca_mp_productos.precio_unitario',
                    'ca_productos_subcategoria.nombre as nombre_subcategoria',
                    'ca_productos_categoria.nombre as nombre_categoria',
                    'ca_mp_productos.formato as formatoNombre')
        ->where('ca_mp_productos.sucursal_id',session('sucursal'))
        ->where('ca_productos_categoria.estado', 1)
        ->where('ca_productos_subcategoria.estado',1)
        ->where('ca_mp_productos.estado',1)
        ->orderby('ca_mp_productos.id')
        ->get();
       

        $subcategorias = CA_ProductosSubcategoria:: where('sucursal_id',session('sucursal'))->where('estado',1)->get(); 

        $formatos = CA_ProductosFormato::where('estado',1)->where('sucursal_id', session('sucursal'))->get();

        //$productoStock = CA_Productos::where('estado',1)->where('empresa_id', session('id_empresa'))->orderby('nombre')->get();
        
        $action="listado";

        return view('cliente/materiaPrima/productos/index', compact('contenido','action','subcategorias','formatos'));
    }


    public function DTindex()
    { 
     
        $contenido = CA_Productos:: 
        join('ca_productos_subcategoria','ca_productos_subcategoria.id','ca_mp_productos.subcategoria_id')
        ->join('ca_productos_categoria', 'ca_productos_categoria.id', '=', 'ca_productos_subcategoria.categoria_id')
        ->select(   'ca_mp_productos.id as id',
                    'ca_mp_productos.estado as estado',
                    'ca_mp_productos.avatar as avatar',
                    'ca_mp_productos.nombre as nombre',
                    'ca_mp_productos.stock_minimo',
                    'ca_mp_productos.precio_por_mayor',
                    'ca_mp_productos.precio_unitario',
                    'ca_productos_subcategoria.nombre as nombre_subcategoria',
                    'ca_productos_categoria.nombre as nombre_categoria',
                    'ca_mp_productos.formato as formatoNombre')
        ->where('ca_mp_productos.sucursal_id',session('sucursal'))
        ->where('ca_productos_categoria.estado', 1)
        ->where('ca_productos_subcategoria.estado',1)
        ->where('ca_mp_productos.estado',1)
        ->orderby('ca_mp_productos.id')
        ->get();
    
        $array_result = json_decode($contenido,true);

       
        return $array_result;
    }

   
    public function store(Request $request)
    {
        
        if (isset($request->nuevoFormato)){

            $getFormato = $request->nuevoFormato;  
           
        } else { $getFormato = 'sin formato';  
        }
         
        if ($request->hasFile('avatar_file')){
            $file = $request->file('avatar_file');
            $fileAvatar = time().$file->getClientOriginalName(); 
            $destinationPath =public_path().'/files/productos/';
            $file->move($destinationPath, $fileAvatar);
            File::copy($destinationPath.$fileAvatar,'/home2/cst62160/public_html/pro/files/productos/'.$fileAvatar);
        } else {
            $fileAvatar = null; 
        }

        $ca_prod = new CA_Productos;
         
        $ca_prod->user_create_id = Auth::user()->id;
        $ca_prod->estado = 1;
        $ca_prod->nombre = $request->nombre;
        $ca_prod->descripcion = $request->descripcion;
        $ca_prod->avatar = $fileAvatar;
        $ca_prod->subcategoria_id = $request->subcategoria;
        $ca_prod->formato = $getFormato;
        $ca_prod->stock_minimo = $request->stock_minimo;
        $ca_prod->precio_por_mayor = $request->precio_mayor;
        $ca_prod->precio_unitario   = $request->precio_unitario;
        $ca_prod->sucursal_id = session('sucursal');
        $ca_prod->save();

        $data = CA_Productos::latest('id')->first();

        
        return redirect()->action('ca\materiaPrima\productos\CA_ProductosController@index');
    }


    public function estado($id,$estado)
    {
        $ca_prod = CA_Productos::where('id',$id)->where('empresa_id',session('id_empresa'))->where('sucursal_id', session('sucursal'))->first();
    
        if ($ca_prod){
                $ca_prod->estado = $estado;
                $ca_prod->save();
        }
       
        return redirect()->action('ca\materiaPrima\productos\CA_ProductosController@index');
    }





    public function edit($id)
    {
         $ca_prod = CA_Productos::where('id',$id)
         ->where('sucursal_id',session('sucursal'))
         ->first();
    
         return response()->json($ca_prod); 
    }




    public function edit_stock($id)
    {
         
         $ca_prod_stock = CA_ProductosStock::
        join('users','users.id','ca_productos_stock.user_create_id')
         ->select('ca_productos_stock.id as id','ca_productos_stock.estado as estado','ca_productos_stock.cantidad as cantidad','users.name as usuario','ca_productos_stock.created_at as fecha')
        ->where('ca_productos_stock.producto_id',$id)
        ->where('ca_productos_stock.empresa_id',session('id_empresa'))
        ->get();
        

         return response()->json($ca_prod_stock); 
    }


    public function update(Request $request)
    {
       
        if ($request->hasFile('avatar_file')){
            $file = $request->file('avatar_file');
            $fileAvatar = time().$file->getClientOriginalName(); 
            $destinationPath =public_path().'/files/productos/';
            $file->move($destinationPath, $fileAvatar);
            File::copy($destinationPath.$fileAvatar,'/home2/cst62160/public_html/pro/files/productos/'.$fileAvatar);
        } else {
            $fileAvatar = null; 
        }

        
        $ca_prod = CA_Productos::where('id',$request->id)->where('sucursal_id',session('sucursal'))->first();
        if ($ca_prod){
            $ca_prod->nombre = $request->nombre;
            $ca_prod->descripcion = $request->descripcion;
            $ca_prod->avatar = $fileAvatar;
            $ca_prod->subcategoria_id = $request->subcategoria;
            $ca_prod->stock_minimo = $request->stock_minimo;
            $ca_prod->precio_por_mayor = $request->precio_mayor;
            $ca_prod->precio_unitario   = $request->precio_unitario;
            $ca_prod->save();
        }

        return redirect()->action('ca\materiaPrima\productos\CA_ProductosController@index');
    }


    public function store_stock(Request $request)
    {
        
        $ca_prod_stk = new CA_ProductosStock;
        
        $ca_prod_stk->empresa_id = session('id_empresa');
        $ca_prod_stk->user_create_id = Auth::user()->id;
        $ca_prod_stk->estado = 1;
        $ca_prod_stk->tipo = $request->tipoStock;
        $ca_prod_stk->cantidad = $request->cantidad;
        $ca_prod_stk->producto_id = $request->prodStock;
     
        $ca_prod_stk->save();


        $ca_prod = CA_Productos::where('id',$request->prodStock)->where('empresa_id',session('id_empresa'))->where('sucursal_id',session('sucursal'))->first();
        
        if ($ca_prod){
            $ca_prod->stock_actual = $ca_prod->stock_actual + $request->cantidad;
            $ca_prod->save();
        }
        
        return redirect()->action('ca\materiaPrima\productos\CA_ProductosController@index');

        //'id','estado','cantidad','producto_id','empresa_id','user_create_id'
    }

    public function stock_formatos($id)
    {
        $formatos = ProductoFormato::
        join('formatos', 'formatos.id','producto_formato.formato_id')
        ->select('formatos.id as id', 'formatos.nombre')
        ->where('producto_formato.producto_id', $id)
        ->where('formatos.estado',1)
        ->where('producto_formato.estado',1)
        ->get();

        return response()->json($formatos); 
    }


    //public function reportePDF(Request $request)
    public function reportePDF()
    {

        $contenido = CA_Productos:: 
        join('ca_productos_subcategoria','ca_productos_subcategoria.id','ca_mp_productos.subcategoria_id')
        ->join('ca_productos_categoria', 'ca_productos_categoria.id', '=', 'ca_productos_subcategoria.categoria_id')
        ->select('ca_mp_productos.id as id',
                    'ca_mp_productos.estado as estado',
                    'ca_mp_productos.avatar as avatar',
                    'ca_mp_productos.nombre as nombre',
                    'ca_mp_productos.stock_minimo',
                    'ca_mp_productos.precio_por_mayor',
                    'ca_mp_productos.precio_unitario',
                    'ca_productos_subcategoria.nombre as nombre_subcategoria',
                    'ca_productos_categoria.nombre as nombre_categoria',
                    'ca_mp_productos.formato as formatoNombre'
                )
        ->where('ca_mp_productos.sucursal_id',session('sucursal'))
        ->where('ca_productos_categoria.estado', 1)
        ->where('ca_productos_subcategoria.estado',1)
        ->where('ca_mp_productos.estado',1) 
        ->orderby('ca_mp_productos.nombre')
        ->get();

        
        $fecha= date('d-m-Y');

        $data = [                
            'fecha' => $fecha,
            'contenido' => $contenido,
        ];
        
        $pdf = PDF::loadView('cliente/materiaPrima/productos/reportes/productosPDF', $data);  
        return $pdf->download($fecha.'-Reporte-listado-productos.pdf');

    }



    public function reporteStockProductosPDF()
    {

        $contenido = CA_Productos:: 
        join('ca_productos_subcategoria','ca_productos_subcategoria.id','ca_mp_productos.subcategoria_id')
        ->join('ca_productos_categoria', 'ca_productos_categoria.id', '=', 'ca_productos_subcategoria.categoria_id')
        ->select('ca_mp_productos.id as id',
                    'ca_mp_productos.estado as estado',
                    'ca_mp_productos.avatar as avatar',
                    'ca_mp_productos.nombre as nombre',
                    'ca_mp_productos.stock_minimo',
                    'ca_mp_productos.precio_por_mayor',
                    'ca_mp_productos.precio_unitario',
                    'ca_productos_subcategoria.nombre as nombre_subcategoria',
                    'ca_productos_categoria.nombre as nombre_categoria',
                    'ca_mp_productos.formato as formatoNombre'
                ) 
        ->where('ca_mp_productos.sucursal_id',session('sucursal'))
        ->where('ca_productos_categoria.estado', 1)
        ->where('ca_productos_subcategoria.estado',1)
        ->where('ca_mp_productos.estado',1)
        ->orderby('ca_mp_productos.nombre')
        ->get();

        
        $fecha= date('d-m-Y');
        $time = time();

        $totalStock = CA_ProductosStock::dashboradTotalStock();//total stock - todos los productos
        $data = [                
            'fecha' => $fecha,
            'contenido' => $contenido,
            'totalStock' => $totalStock,
        ];
        
        $pdf = PDF::loadView('cliente/materiaPrima/productos/reportes/productosStockPDF', $data);  
        return $pdf->download($time.'-Reporte-Stock-productos.pdf');

    }

    public static function reporteProductosProyeccionVentasPDF()
    {
        $contenido = CA_Productos:: 
        join('ca_productos_subcategoria','ca_productos_subcategoria.id','ca_mp_productos.subcategoria_id')
        ->join('ca_productos_categoria', 'ca_productos_categoria.id', '=', 'ca_productos_subcategoria.categoria_id')
        ->select('ca_mp_productos.id as id',
                    'ca_mp_productos.estado as estado',
                    'ca_mp_productos.avatar as avatar',
                    'ca_mp_productos.nombre as nombre',
                    'ca_mp_productos.stock_minimo',
                    'ca_mp_productos.precio_por_mayor',
                    'ca_mp_productos.precio_unitario',
                    'ca_productos_subcategoria.nombre as nombre_subcategoria',
                    'ca_productos_categoria.nombre as nombre_categoria',
                    'ca_mp_productos.formato as formatoNombre'
                ) 
        ->where('ca_mp_productos.sucursal_id',session('sucursal'))
        ->where('ca_productos_categoria.estado', 1)
        ->where('ca_productos_subcategoria.estado',1)
        ->where('ca_mp_productos.estado',1)
        ->orderby('ca_mp_productos.nombre')
        ->get();

        
        $fecha= date('d-m-Y');
        $time = time();

        $totalStock = CA_ProductosStock::dashboradTotalStock();//total stock - todos los productos
        $data = [                
            'fecha' => $fecha,
            'contenido' => $contenido,
            'totalStock' => $totalStock,
        ];
        
        $pdf = PDF::loadView('cliente/materiaPrima/productos/reportes/productosProyeccionVentas', $data);  
        return $pdf->download($time.'-Reporte-Stock-productos.pdf');
    }

}