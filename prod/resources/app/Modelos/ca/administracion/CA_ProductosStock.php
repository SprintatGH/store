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
                ->where('producto_id', $id_producto)
                ->where('empresa_id',session('id_empresa'))
                ->where('tipo',ConstCliente::STOCK_AGREGAR)
                ->where('estado',1)
                ->sum('cantidad');
        
        $menos = DB::table('ca_productos_stock')
        ->where('producto_id', $id_producto)
        ->where('empresa_id',session('id_empresa'))
        ->where('tipo',ConstCliente::STOCK_DESCONTAR)
        ->where('estado',1)
        ->sum('cantidad');
    
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



    //funcion que muestra el stock total de productos en el escritorio
    public static function dashboradTotalStock()
    {
        $mas = DB::table('ca_productos_stock')
                ->where('empresa_id',session('id_empresa'))
                ->where('tipo',ConstCliente::STOCK_AGREGAR)
                ->where('estado',1)
                ->sum('cantidad');
        
        $menos = DB::table('ca_productos_stock')
        ->where('empresa_id',session('id_empresa'))
        ->where('tipo',ConstCliente::STOCK_DESCONTAR)
        ->where('estado',1)
        ->sum('cantidad');
     
        $data = $mas - $menos;

        return $data;
    }

    //funcion que obtiene el total entre la cantidad en stock de un producto multiplicado por su precio unitario 
    public static function proyeccionPrecioUnitario($id_producto)
    {

        $mas = DB::table('ca_productos_stock')
                ->where('producto_id', $id_producto)
                ->where('empresa_id',session('id_empresa'))
                ->where('tipo',ConstCliente::STOCK_AGREGAR)
                ->where('estado',1)
                ->sum('cantidad');
        
        $menos = DB::table('ca_productos_stock')
        ->where('producto_id', $id_producto)
        ->where('empresa_id',session('id_empresa'))
        ->where('tipo',ConstCliente::STOCK_DESCONTAR)
        ->where('estado',1)
        ->sum('cantidad');
    
        $data = $mas - $menos;

        $precio = productos::where('id',$id_producto)->where('estado',1)->select('precio_unitario')->first();
        
        $total = $data * $precio;

        return $total;

    }


    //funcion que obtiene el total entre la cantidad en stock de un producto multiplicado por su precio unitario 
    public static function proyeccionPrecioPorMayor($id_producto)
    {

        $mas = DB::table('ca_productos_stock')
                ->where('producto_id', $id_producto)
                ->where('empresa_id',session('id_empresa'))
                ->where('tipo',ConstCliente::STOCK_AGREGAR)
                ->where('estado',1)
                ->sum('cantidad');
        
        $menos = DB::table('ca_productos_stock')
        ->where('producto_id', $id_producto)
        ->where('empresa_id',session('id_empresa'))
        ->where('tipo',ConstCliente::STOCK_DESCONTAR)
        ->where('estado',1)
        ->sum('cantidad');
    
        $data = $mas - $menos;

        $precio = productos::where('id',$id_producto)->where('estado',1)->select('precio_por_mayor')->first();
        
        $total = $data * $precio;

        return $total;

    }
    
}