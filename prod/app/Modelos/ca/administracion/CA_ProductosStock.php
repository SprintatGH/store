<?php

namespace App\Modelos\ca\administracion;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\ca\administracion\CA_Productos as productos;
use DB;
use App\Constants\Cliente as ConstCliente;

class CA_ProductosStock extends Model
{
    protected $table = 'ca_productos_stock';

    protected $fillable = [
        'id','estado','cantidad','tipo','producto_id','empresa_id','user_create_id','created_at'
    ];



    //funcion que permite obtener el stock actual de un producto determinado
    public static function stockActual($id_producto)
    {
        
        
        $mas = DB::table('ca_productos_stock')
                ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
                ->where('ca_productos_stock.producto_id', $id_producto)
                ->where('ca_productos_stock.empresa_id',session('id_empresa'))
                ->where('ca_productos.empresa_id',session('id_empresa'))
                ->where('ca_productos.sucursal_id',session('sucursal'))
                ->where('ca_productos_stock.tipo',ConstCliente::STOCK_AGREGAR)
                ->where('ca_productos_stock.estado',1)
                ->sum('ca_productos_stock.cantidad');
        
        $menos = DB::table('ca_productos_stock')
        ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
        ->where('ca_productos_stock.producto_id', $id_producto)
        ->where('ca_productos_stock.empresa_id',session('id_empresa'))
        ->where('ca_productos.empresa_id',session('id_empresa'))
        ->where('ca_productos.sucursal_id',session('sucursal'))
        ->where('ca_productos_stock.tipo',ConstCliente::STOCK_DESCONTAR)
        ->where('ca_productos_stock.estado',1)
        ->sum('ca_productos_stock.cantidad');
    
        $data = $mas - $menos;

        return $data;
    }


    //funcion que permite mostrar alertas de stock
    public static function alertaProductos($contenido)
    {
        
        $productoStock = [];
        foreach ($contenido as $proStock)
        {
            if (CA_ProductosStock::stockActual($proStock->id) < $proStock->stock_minimo)
            {
                $Stock = ['ID' => $proStock->id,
                      'producto' => $proStock->nombre,
                      'stockActual' => CA_ProductosStock::stockActual($proStock->id),
                      'stockMinimo' => $proStock->stock_minimo
                    
                ];
               array_push($productoStock, $Stock); 
            }
        }

        return $productoStock;
    }

    //funcion que permite mostrar alertas de stock
    public static function listadoAlertaProductos()
    {
        $contenido = CA_Productos::
              join('ca_productos_subcategoria','ca_productos_subcategoria.id','ca_productos.subcategoria_id')
              ->join('ca_productos_categoria', 'ca_productos_categoria.id', '=', 'ca_productos_subcategoria.categoria_id')
              ->select('ca_productos.id as id','ca_productos.estado as estado','ca_productos.avatar as avatar','ca_productos.nombre as nombre','ca_productos.stock_minimo','ca_productos.stock_actual','ca_productos.precio_por_mayor','ca_productos.precio_unitario','ca_productos_subcategoria.nombre as nombre_subcategoria','ca_productos_categoria.nombre as nombre_categoria')
              ->where('ca_productos.empresa_id',session('id_empresa'))
              ->where('ca_productos.sucursal_id',session('sucursal'))
              ->where('ca_productos_categoria.estado', 1)
              ->where('ca_productos_subcategoria.estado',1)
              ->where('ca_productos.estado',1)
              ->get();

        $productoStock = [];
        foreach ($contenido as $proStock)
        {
            if (CA_ProductosStock::stockActual($proStock->id) < $proStock->stock_minimo)
            {
                $Stock = ['ID' => $proStock->id,
                    'producto' => $proStock->nombre,
                    'stockActual' => CA_ProductosStock::stockActual($proStock->id),
                    'stockMinimo' => $proStock->stock_minimo,
                    'avatar' => $proStock->avatar
                    
                ];
            array_push($productoStock, $Stock); 
            }
        }

        return $productoStock;
    }

    //funcion que muestra el stock total de productos en el escritorio
    public static function dashboradTotalStock()
    {
        $mas = DB::table('ca_productos_stock')
                ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
                ->where('ca_productos_stock.empresa_id',session('id_empresa'))
                ->where('ca_productos.empresa_id',session('id_empresa'))
                ->where('ca_productos.sucursal_id',session('sucursal'))
                ->where('ca_productos_stock.tipo',ConstCliente::STOCK_AGREGAR)
                ->where('ca_productos_stock.estado',1)
                ->sum('ca_productos_stock.cantidad');
        
        $menos = DB::table('ca_productos_stock')
        ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
        ->where('ca_productos_stock.empresa_id',session('id_empresa'))
        ->where('ca_productos.empresa_id',session('id_empresa'))
        ->where('ca_productos.sucursal_id',session('sucursal'))
        ->where('ca_productos_stock.tipo',ConstCliente::STOCK_DESCONTAR)
        ->where('ca_productos_stock.estado',1)
        ->sum('ca_productos_stock.cantidad');
     
        $data = $mas - $menos;

        return $data;
    }

     //funcion que obtiene el total entre la cantidad en stock de un producto multiplicado por su precio unitario 
     public static function proyeccionPrecioUnitario($id_producto)
     {
 
         $mas = DB::table('ca_productos_stock')
         ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
         ->where('ca_productos_stock.empresa_id',session('id_empresa'))
         ->where('ca_productos.empresa_id',session('id_empresa'))
         ->where('ca_productos.sucursal_id',session('sucursal'))
         ->where('ca_productos_stock.tipo',ConstCliente::STOCK_AGREGAR)
         ->where('ca_productos_stock.estado',1)
         ->sum('ca_productos_stock.cantidad');
          
         $menos = DB::table('ca_productos_stock')
         ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
         ->where('ca_productos_stock.empresa_id',session('id_empresa'))
         ->where('ca_productos.empresa_id',session('id_empresa'))
         ->where('ca_productos.sucursal_id',session('sucursal'))
         ->where('ca_productos_stock.tipo',ConstCliente::STOCK_DESCONTAR)
         ->where('ca_productos_stock.estado',1)
         ->sum('ca_productos_stock.cantidad');
     
         $data = $mas - $menos;
 
         $precio = productos::where('id',$id_producto)->where('estado',1)->select('precio_unitario')->first();
         
         $total = $data * intval($precio->precio_unitario);
 
         return $total;
 
     }


    //funcion que obtiene el total entre la cantidad en stock de un producto multiplicado por su precio por mayor 
    public static function proyeccionPrecioPorMayor($id_producto)
    {

        $mas = DB::table('ca_productos_stock')
        ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
        ->where('ca_productos_stock.empresa_id',session('id_empresa'))
        ->where('ca_productos.empresa_id',session('id_empresa'))
        ->where('ca_productos.sucursal_id',session('sucursal'))
        ->where('ca_productos_stock.tipo',ConstCliente::STOCK_AGREGAR)
        ->where('ca_productos_stock.estado',1)
        ->sum('ca_productos_stock.cantidad');
        
        $menos = DB::table('ca_productos_stock')
        ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
        ->where('ca_productos_stock.empresa_id',session('id_empresa'))
        ->where('ca_productos.empresa_id',session('id_empresa'))
        ->where('ca_productos.sucursal_id',session('sucursal'))
        ->where('ca_productos_stock.tipo',ConstCliente::STOCK_DESCONTAR)
        ->where('ca_productos_stock.estado',1)
        ->sum('ca_productos_stock.cantidad');
    
        $data = $mas - $menos;

        $precio = productos::where('id',$id_producto)->where('estado',1)->select('precio_por_mayor')->first();
        
        $total = $data * intval($precio->precio_por_mayor);

        return $total;

    }


    //funcion que obtiene el total entre la cantidad en stock de un producto multiplicado por su precio por mayor 
    public static function TotalProyeccionPrecioPorMayor()
    {

        $productos = productos::where('estado',1)->select('id', 'precio_por_mayor','precio_unitario')->get();

        $totalPrecio = 0;
        foreach ( $productos as $items )
        {
            $mas = DB::table('ca_productos_stock')
            ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
            ->where('ca_productos_stock.empresa_id',session('id_empresa'))
            ->where('ca_productos.empresa_id',session('id_empresa'))
            ->where('ca_productos.sucursal_id',session('sucursal'))
            ->where('ca_productos_stock.tipo',ConstCliente::STOCK_AGREGAR)
            ->where('ca_productos_stock.estado',1)
            ->sum('ca_productos_stock.cantidad');
            
            $menos = DB::table('ca_productos_stock')
            ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
            ->where('ca_productos_stock.empresa_id',session('id_empresa'))
            ->where('ca_productos.empresa_id',session('id_empresa'))
            ->where('ca_productos.sucursal_id',session('sucursal'))
            ->where('ca_productos_stock.tipo',ConstCliente::STOCK_DESCONTAR)
            ->where('ca_productos_stock.estado',1)
            ->sum('ca_productos_stock.cantidad');
        
            $data = $mas - $menos;

            $totalPrecio = $totalPrecio + ($data * intval($items->precio_por_mayor));

        }
        
        return $totalPrecio;
    }
     

    //funcion que obtiene el total entre la cantidad en stock de un producto multiplicado por su precio por mayor 
    public static function TotalProyeccionPrecioUnitario()
    {

        $productos = productos::where('estado',1)->select('id', 'precio_por_mayor','precio_unitario')->get();

        $totalPrecio = 0;
        foreach ( $productos as $items )
        {
            $mas = DB::table('ca_productos_stock')
            ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
            ->where('ca_productos_stock.empresa_id',session('id_empresa'))
            ->where('ca_productos.empresa_id',session('id_empresa'))
            ->where('ca_productos.sucursal_id',session('sucursal'))
            ->where('ca_productos_stock.tipo',ConstCliente::STOCK_AGREGAR)
            ->where('ca_productos_stock.estado',1)
            ->sum('ca_productos_stock.cantidad');
            
            $menos = DB::table('ca_productos_stock')
            ->join('ca_productos','ca_productos.id','ca_productos_stock.producto_id')
            ->where('ca_productos_stock.empresa_id',session('id_empresa'))
            ->where('ca_productos.empresa_id',session('id_empresa'))
            ->where('ca_productos.sucursal_id',session('sucursal'))
            ->where('ca_productos_stock.tipo',ConstCliente::STOCK_DESCONTAR)
            ->where('ca_productos_stock.estado',1)
            ->sum('ca_productos_stock.cantidad');
        
            $data = $mas - $menos;

            $totalPrecio = $totalPrecio + ($data * intval($items->precio_unitario));

        }
        
        return $totalPrecio;
    }
}