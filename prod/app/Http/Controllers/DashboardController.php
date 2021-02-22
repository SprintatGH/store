<?php



namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;

use App\Perfiles;

use App\Empresas;

use App\Modelos\ca\administracion\CA_Productos;

use App\Modelos\ad\Version;

use App\Modelos\ca\administracion\CA_ProductosStock;

use App\Modelos\ca\ventas\ControlDespacho;

use App\Modelos\ca\ventas\ControlDespachoDetalle;

use App\Modelos\ca\CA_Sucursales;

use App\Constants\Administrador;



class DashboardController extends Controller

{

    public function index()
    {

        if (auth()->user()->perfil_id == Administrador::DASHBOARD_ADMINISTRADOR_CLIENTE){

            return 'dashboardAdminCliente';

        }   elseif (auth()->user()->perfil_id == Administrador::DASHBOARD_CLIENTE){

            return 'dashboardCliente'; 

        }   elseif (auth()->user()->perfil_id == Administrador::DASHBOARD_ADMINISTRADOR){

            $this->indexAdmin();

        }   else { 

            return 'dashboardDemo';

        }

    }

    public function  indexAdmin(){ 

 

        // Verificamos si hay sesión activa

        if (Auth::check())

        {
            
         //   dd(auth());
            $empresa = Empresas::findOrFail(auth()->user()->empresa_id);

            $avatar = auth()->user()->avatar;



            if ($avatar==null){  $avatar='sin_avatar.png';  } 



            if ($empresa->logo==null){ $logo='sin_logo.png'; } else {  $logo=$empresa->logo;  }



            //selecciono la version actual

            $version = Version::where('estado',1)->get();



            session(['id_empresa' => $empresa->id]);

            session(['empresa' => $empresa->nombre]);

            session(['logo' => $logo]);

            session(['avatar' => $avatar]);

            session(['version' => $version[0]['etiqueta']]);

 

        

            $contenido = CA_Productos::

            join('ca_productos_subcategoria','ca_productos_subcategoria.id','ca_productos.subcategoria_id')

            ->join('ca_productos_categoria', 'ca_productos_categoria.id', '=', 'ca_productos_subcategoria.categoria_id')

            ->select('ca_productos.id as id','ca_productos.estado as estado','ca_productos.avatar as avatar','ca_productos.nombre as nombre','ca_productos.stock_minimo','ca_productos.stock_actual','ca_productos.precio_por_mayor','ca_productos.precio_unitario','ca_productos_subcategoria.nombre as nombre_subcategoria','ca_productos_categoria.nombre as nombre_categoria')

            ->where('ca_productos.empresa_id',session('id_empresa'))

            ->where('ca_productos_categoria.estado', 1)

            ->where('ca_productos_subcategoria.estado',1)

            ->where('ca_productos.estado',1)

            ->get();

 

            $productoStock = [];

            $sumaStockActual = 0;



            foreach ($contenido as $items){  $sumaStockActual += $items->stock_actual;  }            

            

            // Si tenemos sesión activa mostrará la página de inicio

            return view('dashboard/indexAdmin', compact('avatar','contenido','sumaStockActual','version','productoStock'));

        }

        // Si no hay sesión activa mostramos el formulario

        return view('auth/login');

   

    }







    //escritorio version usuario cliente de la empresa contratada

    public function indexCliente(){

        return view('dashboard/indexCliente');

    }













    public function indexAdminCliente(){



          // Verificamos si hay sesión activa

          if (Auth::check())

          {

              $empresa = Empresas::findOrFail(auth()->user()->empresa_id);

              $avatar = auth()->user()->avatar;

  

              if ($avatar==null){  $avatar='sin_avatar.png'; } 

  

              if ($empresa->logo==null){  $logo='sin_logo.png';  } else {  $logo=$empresa->logo; }

   

              //selecciono la version actual

              $version = Version::where('estado',1)->orderby('id', 'desc')->get();



              //analiso sucursales

              $sucursal_base = CA_Sucursales::getSucursalBase();

            

              $sucursales = CA_Sucursales::getSucursal($empresa->id);


              if ($sucursales)

              {

                  $sucursal = $sucursales[0]->id;

              } else {

                $sucursal = $sucursal_base->id;

              }

             

              session(['id_empresa' => $empresa->id]);

              session(['empresa' => $empresa->nombre]);

              session(['logo' => $logo]);

              session(['avatar' => $avatar]);

              session(['version' => $version[0]['etiqueta']]);

              session(['sucursal' => $sucursal]);

              session(['sucursales' => $sucursales]);

   

             

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

   

              $listadoAlertaStock = CA_ProductosStock::listadoAlertaProductos();

              

              $productoStock = CA_ProductosStock::alertaProductos($contenido);



              $totalStock = CA_ProductosStock::dashboradTotalStock();//total stock - todos los productos



              $despachos = ControlDespacho::despachosAbiertos();

         

              $ventas = ControlDespachoDetalle::ventasDelMes();



              $ProductosVendidos = ControlDespachoDetalle::productosMasVendidos();



              $topClientes = ControlDespachoDetalle::topClientes();

             

              $sumaStockActual = 0; //cantidad de productos con problemas de stock

              

              foreach ($contenido as $items){  if ($items->stock_actual < $items->stockMinimo){ $sumaStockActual ++; }  }   //cuento los productos con problemas de stock         

  

              // Si tenemos sesión activa mostrará la página de inicio

              return    view('dashboard/indexAdminCliente', 

                        compact('avatar','contenido','sumaStockActual','version',

                                'productoStock','despachos', 'totalStock', 'ventas',

                                'ProductosVendidos','topClientes','listadoAlertaStock'));

          }

          // Si no hay sesión activa mostramos el formulario

          return view('auth/login');



    }





    public function indexDemo(){

        return view('dashboard/indexAdminCliente');

    }





    public function CambiarSucursal($id)

    {

     

            // Verificamos si hay sesión activa

            if (Auth::check())

            {

                $empresa = Empresas::findOrFail(auth()->user()->empresa_id);

              $avatar = auth()->user()->avatar;

  

              if ($avatar==null){  $avatar='sin_avatar.png'; } 

  

              if ($empresa->logo==null){  $logo='sin_logo.png';  } else {  $logo=$empresa->logo; }

   

              //selecciono la version actual

              $version = Version::where('estado',1)->orderby('id', 'desc')->get();



                session(['sucursal' => $id]);



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



                $listadoAlertaStock = CA_ProductosStock::listadoAlertaProductos();



                $productoStock = CA_ProductosStock::alertaProductos($contenido);



                $totalStock = CA_ProductosStock::dashboradTotalStock();//total stock - todos los productos



                $despachos = ControlDespacho::despachosAbiertos();



                $ventas = ControlDespachoDetalle::ventasDelMes();



                $ProductosVendidos = ControlDespachoDetalle::productosMasVendidos();



                $topClientes = ControlDespachoDetalle::topClientes();

            

                $sumaStockActual = 0; //cantidad de productos con problemas de stock

                

                foreach ($contenido as $items){  if ($items->stock_actual < $items->stockMinimo){ $sumaStockActual ++; }  }   //cuento los productos con problemas de stock         



                // Si tenemos sesión activa mostrará la página de inicio

                return    view('dashboard/indexAdminCliente', 

                        compact('avatar','contenido','sumaStockActual','version',

                                'productoStock','despachos', 'totalStock', 'ventas',

                                'ProductosVendidos','topClientes','listadoAlertaStock'));

            }

            // Si no hay sesión activa mostramos el formulario

            return view('auth/login');

    }



}

