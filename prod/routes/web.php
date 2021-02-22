<?php



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/

 

 Route::get('/', function(){

    return view('auth/login');

 });
 


// Authentication Routes... 

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');





//Route::get('/', 'DashboardController@indexAdmin')->middleware('auth');

//Route::get('/', 'DashboardController@index')->middleware('auth');

Route::get('/dashboardAdmin', 'DashboardController@indexAdmin')->middleware('auth');

Route::get('/dashboardCliente', 'DashboardController@indexCliente')->middleware('auth'); 

Route::get('/dashboardAdminCliente', 'DashboardController@indexAdminCliente')->middleware('auth');  

Route::get('/dashboardDemo', 'DashboardController@indexDemo')->middleware('auth'); 





Route::get('/administracion', 'DashboardController@administracion');



Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');





  //rutas de administrador de usuarios

  Route::get('/users', 'UsuarioController@index')->middleware('auth');

  Route::get('/users/{id}/edit',  'UsuarioController@edit' )->name('users.edit')->middleware('auth'); 

  Route::get('/users/create',  'UsuarioController@create' )->name('users.create')->middleware('auth'); 

  Route::post('/users/store',  'UsuarioController@store' )->name('users.store')->middleware('auth'); 

  Route::post('/users/update',  'UsuarioController@update' )->name('users.update')->middleware('auth'); 

  Route::get('/users/{id}/{estado}/estado',  'UsuarioController@estado' )->name('users.estado')->middleware('auth'); 





   //rutas sexo

   Route::get('/sexo', 'SexoController@index')->middleware('auth');

   Route::get('/sexo/{id}/edit',  'SexoController@edit' )->name('sexo.edit')->middleware('auth'); 

   Route::post('/sexo/store',  'SexoController@store' )->name('sexo.store')->middleware('auth'); 

   Route::post('/sexo/update',  'SexoController@update' )->name('sexo.update')->middleware('auth'); 

   Route::get('/sexo/{id}/{estado}/estado',  'SexoController@estado' )->name('sexo.estado')->middleware('auth');

   







//**************************************************** administrador *****************************************************/

 

    //empresas

    Route::get('/administrador/empresas', 'AD_EmpresasController@index')->middleware('auth'); 

    Route::get('/administrador/empresas/{id}/edit',  'AD_EmpresasController@edit' )->name('AD_Empresas.edit')->middleware('auth'); 

    Route::post('/administrador/empresas/store',  'AD_EmpresasController@store' )->name('AD_Empresas.store')->middleware('auth'); 

    Route::post('/administrador/empresas/update',  'AD_EmpresasController@update' )->name('AD_Empresas.update')->middleware('auth'); 

    Route::get('/administrador/empresas/{id}/{estado}/estado',  'AD_EmpresasController@estado' )->name('AD_Empresas.estado')->middleware('auth');



    //usuarios

    Route::get('/administrador/usuarios', 'AD_UsuariosController@index')->middleware('auth'); 

    Route::get('/administrador/usuarios/{id}/edit',  'AD_UsuariosController@edit' )->name('AD_Usuarios.edit')->middleware('auth'); 

    Route::post('/administrador/usuarios/store',  'AD_UsuariosController@store' )->name('AD_Usuarios.store')->middleware('auth'); 

    Route::post('/administrador/usuarios/update',  'AD_UsuariosController@update' )->name('AD_Usuarios.update')->middleware('auth'); 

    Route::get('/administrador/usuarios/{id}/{estado}/estado',  'AD_UsuariosController@estado' )->name('AD_Usuarios.estado')->middleware('auth');



    //módulos/administracion/productos

    Route::get('/administrador/modulos/administracion/productos/formato', 'ad\modulos\administracion\productos\FormatosController@index')->middleware('auth'); 

    Route::post('/administrador/modulos/administracion/productos/formatos/store',  'ad\modulos\administracion\productos\FormatosController@store' )->name('AD_modulos_administracion_productos_formatos.store')->middleware('auth'); 

    Route::get('/administrador/modulos/administracion/productos/{id}/{estado}/estado',  'ad\modulos\administracion\productos\FormatosController@estado' )->name('AD_modulos_administracion_productos_formatos.estado')->middleware('auth');































//**************************************************** cliente *****************************************************/

 











    //rutas: cambiar de sucursal

    Route::get('/cliente/sucursal/{id}/cambiar', 'DashboardController@CambiarSucursal')->name('CA_Sucursales.Cambiar')->middleware('auth');







    //rutas: cliente / materia prima / clientes

    Route::get('/cliente/materiaPrima/clientes', 'ca\materiaPrima\clientes\CA_ClientesMPController@index')->middleware('auth');

    Route::get('/cliente/materiaPrima/DTclientes', 'ca\materiaPrima\clientes\CA_ClientesMPController@DTindex')->middleware('auth');

    Route::get('/cliente/materiaPrima/clientes/{id}/edit',  'ca\materiaPrima\clientes\CA_ClientesMPController@edit' )->name('CA_ClientesMP.edit')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/clientes/store',  'ca\materiaPrima\clientes\CA_ClientesMPController@store' )->name('CA_ClientesMP.store')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/clientes/update',  'ca\materiaPrima\clientes\CA_ClientesMPController@update' )->name('CA_ClientesMP.update')->middleware('auth'); 

    Route::get('/cliente/materiaPrima/clientes/{id}/contactos',  'ca\materiaPrima\clientes\CA_ClientesMPController@contactos' )->name('CA_ClientesMP.contactos')->middleware('auth'); 

    Route::get('/cliente/materiaPrima/clientes/{id}/{estado}/estado',  'ca\materiaPrima\clientes\CA_ClientesMPController@estado' )->name('CA_ClientesMP.estado')->middleware('auth');

  

    //rutas: cliente / materia prima / productos   

    Route::get('/cliente/materiaPrima/productos', 'ca\materiaPrima\productos\CA_ProductosController@index')->middleware('auth');

    Route::get('/cliente/materiaPrima/DTproductos', 'ca\materiaPrima\productos\CA_ProductosController@DTindex')->middleware('auth');

    Route::get('/cliente/materiaPrima/productos/{id}/edit',  'ca\materiaPrima\productos\CA_ProductosController@edit' )->name('CA_productosMP.edit')->middleware('auth'); 

    Route::get('/cliente/materiaPrima/productos/{id}/edit_stock',  'ca\materiaPrima\productos\CA_ProductosController@edit_stock' )->name('CA_productosMP.edit_stock')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/productos/store',  'ca\materiaPrima\productos\CA_ProductosController@store' )->name('CA_productosMP.store')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/productos/store_stock',  'ca\materiaPrima\productos\CA_ProductosController@store_stock' )->name('CA_productosMP.store_stock')->middleware('auth'); 

    Route::get('/cliente/materiaPrima/productos/{id}/store_stock',  'ca\materiaPrima\productos\CA_ProductosController@stock_formatos' )->name('CA_productosMP.stock_formatos')->middleware('auth');

    Route::post('/cliente/materiaPrima/productos/update',  'ca\materiaPrima\productos\CA_ProductosController@update' )->name('CA_productosMP.update')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/productos/contactos',  'ca\materiaPrima\productos\CA_ProductosController@contactos' )->name('CA_productosMP.contactos')->middleware('auth'); 

    Route::get('/cliente/materiaPrima/productos/{id}/{estado}/estado',  'ca\materiaPrima\productos\CA_ProductosController@estado' )->name('CA_productosMP.estado')->middleware('auth');

    Route::get('/cliente/materiaPrima/productos/reporte_pdf',  'ca\materiaPrima\productos\CA_ProductosController@reportePDF' )->name('CA_productosMP.reporte_pdf')->middleware('auth');

    Route::get('/cliente/materiaPrima/productos/reporteStockProductos_pdf',  'ca\materiaPrima\productos\CA_ProductosController@reporteStockProductosPDF' )->name('CA_productosMP.reporteStockProductos_PDF')->middleware('auth');

    Route::get('/cliente/materiaPrima/productos/reporteProductosProyeccionVentas_pdf',  'ca\materiaPrima\productos\CA_ProductosController@reporteProductosProyeccionVentasPDF' )->name('CA_productosMP.reporteProductosProyeccionVentas_PDF')->middleware('auth');

 



     //rutas: cliente / materia prima / productos / Categorias

     Route::get('/cliente/materiaPrima/productos/categoria', 'ca\materiaPrima\productos\CA_ProductosCategoriaController@index')->middleware('auth');

     Route::get('/cliente/materiaPrima/productos/DTcategoria', 'ca\materiaPrima\productos\CA_ProductosCategoriaController@DTindex')->middleware('auth');

     Route::get('/cliente/materiaPrima/productos/categoria/{id}/edit',  'ca\materiaPrima\productos\CA_ProductosCategoriaController@edit' )->name('CA_productos_categoriaMP.edit')->middleware('auth'); 

     Route::post('/cliente/materiaPrima/productos/categoria/store',  'ca\materiaPrima\productos\CA_ProductosCategoriaController@store' )->name('CA_productos_categoriaMP.store')->middleware('auth'); 

     Route::post('/cliente/materiaPrima/productos/categoria/update',  'ca\materiaPrima\productos\CA_ProductosCategoriaController@update' )->name('CA_productos_categoriaMP.update')->middleware('auth'); 

     Route::post('/cliente/materiaPrima/productos/categoria/contactos',  'ca\materiaPrima\productos\CA_ProductosCategoriaController@contactos' )->name('CA_productos_categoriaMP.contactos')->middleware('auth'); 

     Route::get('/cliente/materiaPrima/productos/categoria/{id}/{estado}/estado',  'ca\materiaPrima\productos\CA_ProductosCategoriaController@estado' )->name('CA_productos_categoriaMP.estado')->middleware('auth');

    

       //rutas: cliente / materia prima / productos / subcategorias

    Route::get('/cliente/materiaPrima/productos/subcategoria', 'ca\materiaPrima\productos\CA_ProductosSubcategoriaController@index')->middleware('auth');

    Route::get('/cliente/materiaPrima/productos/DTsubcategoria', 'ca\materiaPrima\productos\CA_ProductosSubcategoriaController@DTindex')->middleware('auth');

    Route::get('/cliente/materiaPrima/productos/subcategoria/{id}/edit',  'ca\materiaPrima\productos\CA_ProductosSubcategoriaController@edit' )->name('CA_productos_subcategoriaMP.edit')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/productos/subcategoria/store',  'ca\materiaPrima\productos\CA_ProductosSubcategoriaController@store' )->name('CA_productos_subcategoriaMP.store')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/productos/subcategoria/update',  'ca\materiaPrima\productos\CA_ProductosSubcategoriaController@update' )->name('CA_productos_subcategoriaMP.update')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/productos/subcategoria/contactos',  'ca\materiaPrima\productos\CA_ProductosSubcategoriaController@contactos' )->name('CA_productos_subcategoriaMP.contactos')->middleware('auth'); 

    Route::get('/cliente/materiaPrima/productos/subcategoria/{id}/{estado}/estado',  'ca\materiaPrima\productos\CA_ProductosSubcategoriaController@estado' )->name('CA_productos_subcategoriaMP.estado')->middleware('auth');

    

    //rutas: cliente / materia prima / productos / formatos

    Route::get('/cliente/materiaPrima/productos/formato', 'ca\materiaPrima\productos\CA_ProductosFormatoController@index')->middleware('auth');

    Route::get('/cliente/materiaPrima/productos/DTformato', 'ca\materiaPrima\productos\CA_ProductosFormatoController@DTindex')->middleware('auth');

    Route::get('/cliente/materiaPrima/productos/formato/{id}/edit',  'ca\materiaPrima\productos\CA_ProductosFormatoController@edit' )->name('CA_productos_formatoMP.edit')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/productos/formato/store',  'ca\materiaPrima\productos\CA_ProductosFormatoController@store' )->name('CA_productos_formatoMP.store')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/productos/formato/update',  'ca\materiaPrima\productos\CA_ProductosFormatoController@update' )->name('CA_productos_formatoMP.update')->middleware('auth'); 

    Route::post('/cliente/materiaPrima/productos/formato/contactos',  'ca\materiaPrima\productos\CA_ProductosFormatoController@contactos' )->name('CA_productos_formatoMP.contactos')->middleware('auth'); 

    Route::get('/cliente/materiaPrima/productos/formato/{id}/{estado}/estado',  'ca\materiaPrima\productos\CA_ProductosFormatoController@estado' )->name('CA_productos_formatoMP.estado')->middleware('auth');

    











    //rutas: cliente / administracion / clientes

    Route::get('/cliente/administracion/clientes', 'ca\administracion\clientes\CA_ClientesController@index')->middleware('auth');

    Route::get('/cliente/administracion/DTclientes', 'ca\administracion\clientes\CA_ClientesController@DTindex')->middleware('auth');

    Route::get('/cliente/administracion/clientes/{id}/edit',  'ca\administracion\clientes\CA_ClientesController@edit' )->name('CA_clientes.edit')->middleware('auth'); 

    Route::post('/cliente/administracion/clientes/store',  'ca\administracion\clientes\CA_ClientesController@store' )->name('CA_clientes.store')->middleware('auth'); 

    Route::post('/cliente/administracion/clientes/update',  'ca\administracion\clientes\CA_ClientesController@update' )->name('CA_clientes.update')->middleware('auth'); 

    Route::get('/cliente/administracion/clientes/{id}/contactos',  'ca\administracion\clientes\CA_ClientesController@contactos' )->name('CA_clientes.contactos')->middleware('auth'); 

    Route::get('/cliente/administracion/clientes/{id}/{estado}/estado',  'ca\administracion\clientes\CA_ClientesController@estado' )->name('CA_clientes.estado')->middleware('auth');

    Route::post('/cliente/administracion/clientes/precioEspecial',  'ca\administracion\clientes\CA_ClientesController@precioEspecial' )->name('CA_clientes.precioEspecial')->middleware('auth'); 

    Route::get('/cliente/administracion/clientes/{id}/productos',  'ca\administracion\clientes\CA_ClientesController@productos' )->name('CA_clientes.productos')->middleware('auth'); 

    Route::get('/cliente/administracion/clientes/{id}/{estado}/estadoPrecioEspecial',  'ca\administracion\clientes\CA_ClientesController@estadoPrecioEspecial' )->name('CA_clientes.estadoPrecioEspecial')->middleware('auth');  



    //rutas: cliente / administracion / productos   

    Route::get('/cliente/administracion/productos', 'ca\administracion\productos\CA_ProductosController@index')->middleware('auth');

    Route::get('/cliente/administracion/DTproductos', 'ca\administracion\productos\CA_ProductosController@DTindex')->middleware('auth');

    Route::get('/cliente/administracion/productos/{id}/edit',  'ca\administracion\productos\CA_ProductosController@edit' )->name('CA_productos.edit')->middleware('auth'); 

    Route::get('/cliente/administracion/productos/{id}/edit_stock',  'ca\administracion\productos\CA_ProductosController@edit_stock' )->name('CA_productos.edit_stock')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/store',  'ca\administracion\productos\CA_ProductosController@store' )->name('CA_productos.store')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/store_stock',  'ca\administracion\productos\CA_ProductosController@store_stock' )->name('CA_productos.store_stock')->middleware('auth'); 

    Route::get('/cliente/administracion/productos/{id}/store_stock',  'ca\administracion\productos\CA_ProductosController@stock_formatos' )->name('CA_productos.stock_formatos')->middleware('auth');

    Route::post('/cliente/administracion/productos/update',  'ca\administracion\productos\CA_ProductosController@update' )->name('CA_productos.update')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/contactos',  'ca\administracion\productos\CA_ProductosController@contactos' )->name('CA_productos.contactos')->middleware('auth'); 

    Route::get('/cliente/administracion/productos/{id}/{estado}/estado',  'ca\administracion\productos\CA_ProductosController@estado' )->name('CA_productos.estado')->middleware('auth');

    Route::get('/cliente/administracion/productos/reporte_pdf',  'ca\administracion\productos\CA_ProductosController@reportePDF' )->name('CA_productos.reporte_pdf')->middleware('auth');

    Route::get('/cliente/administracion/productos/reporteStockProductos_pdf',  'ca\administracion\productos\CA_ProductosController@reporteStockProductosPDF' )->name('CA_productos.reporteStockProductos_PDF')->middleware('auth');

    Route::get('/cliente/administracion/productos/reporteProductosProyeccionVentas_pdf',  'ca\administracion\productos\CA_ProductosController@reporteProductosProyeccionVentasPDF' )->name('CA_productos.reporteProductosProyeccionVentas_PDF')->middleware('auth');

 

            



    //rutas: cliente / administracion / productos / Categorias

    Route::get('/cliente/administracion/productos/categoria', 'ca\administracion\productos\CA_ProductosCategoriaController@index')->middleware('auth');

    Route::get('/cliente/administracion/productos/categoria/{id}/edit',  'ca\administracion\productos\CA_ProductosCategoriaController@edit' )->name('CA_productos_categoria.edit')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/categoria/store',  'ca\administracion\productos\CA_ProductosCategoriaController@store' )->name('CA_productos_categoria.store')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/categoria/update',  'ca\administracion\productos\CA_ProductosCategoriaController@update' )->name('CA_productos_categoria.update')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/categoria/contactos',  'ca\administracion\productos\CA_ProductosCategoriaController@contactos' )->name('CA_productos_categoria.contactos')->middleware('auth'); 

    Route::get('/cliente/administracion/productos/categoria/{id}/{estado}/estado',  'ca\administracion\productos\CA_ProductosCategoriaController@estado' )->name('CA_productos_categoria.estado')->middleware('auth');

    



    //rutas: cliente / administracion / productos / subcategorias

    Route::get('/cliente/administracion/productos/subcategoria', 'ca\administracion\productos\CA_ProductosSubcategoriaController@index')->middleware('auth');

    Route::get('/cliente/administracion/productos/subcategoria/{id}/edit',  'ca\administracion\productos\CA_ProductosSubcategoriaController@edit' )->name('CA_productos_subcategoria.edit')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/subcategoria/store',  'ca\administracion\productos\CA_ProductosSubcategoriaController@store' )->name('CA_productos_subcategoria.store')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/subcategoria/update',  'ca\administracion\productos\CA_ProductosSubcategoriaController@update' )->name('CA_productos_subcategoria.update')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/subcategoria/contactos',  'ca\administracion\productos\CA_ProductosSubcategoriaController@contactos' )->name('CA_productos_subcategoria.contactos')->middleware('auth'); 

    Route::get('/cliente/administracion/productos/subcategoria/{id}/{estado}/estado',  'ca\administracion\productos\CA_ProductosSubcategoriaController@estado' )->name('CA_productos_subcategoria.estado')->middleware('auth');

    

    //rutas: cliente / administracion / productos / formatos

    Route::get('/cliente/administracion/productos/formato', 'ca\administracion\productos\CA_ProductosFormatoController@index')->middleware('auth');

    Route::get('/cliente/administracion/productos/DTformato', 'ca\administracion\productos\CA_ProductosFormatoController@DTindex')->middleware('auth');

    Route::get('/cliente/administracion/productos/formato/{id}/edit',  'ca\administracion\productos\CA_ProductosFormatoController@edit' )->name('CA_productos_formato.edit')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/formato/store',  'ca\administracion\productos\CA_ProductosFormatoController@store' )->name('CA_productos_formato.store')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/formato/update',  'ca\administracion\productos\CA_ProductosFormatoController@update' )->name('CA_productos_formato.update')->middleware('auth'); 

    Route::post('/cliente/administracion/productos/formato/contactos',  'ca\administracion\productos\CA_ProductosFormatoController@contactos' )->name('CA_productos_formato.contactos')->middleware('auth'); 

    Route::get('/cliente/administracion/productos/formato/{id}/{estado}/estado',  'ca\administracion\productos\CA_ProductosFormatoController@estado' )->name('CA_productos_formato.estado')->middleware('auth');

    

    





// version cliente

// Menú ventas



    //rutas: cliente / ventas / cotizaciones

    Route::get('/cliente/ventas/cotizaciones', 'ca\ventas\CA_VentasCotizacionesController@index')->middleware('auth');

    Route::get('/cliente/ventas/cotizaciones/{id}/edit',  'ca\ventas\CA_VentasCotizacionesController@edit' )->name('CA_ventas_cotizaciones.edit')->middleware('auth'); 

    Route::get('/cliente/ventas/cotizaciones/{id}/precios',  'ca\ventas\CA_VentasCotizacionesController@precios' )->name('CA_ventas_cotizaciones.precios')->middleware('auth'); 

    Route::post('/cliente/ventas/cotizaciones/store',  'ca\ventas\CA_VentasCotizacionesController@store' )->name('CA_ventas_cotizaciones.store')->middleware('auth'); 

    Route::post('/cliente/ventas/cotizaciones/store_detalle',  'ca\ventas\CA_VentasCotizacionesController@store_detalle' )->name('CA_ventas_cotizaciones.store_detalle')->middleware('auth'); 

    Route::get('/cliente/ventas/cotizaciones/{id}/store_detalle',  'ca\ventas\CA_VentasCotizacionesController@stock_formatos' )->name('CA_ventas_cotizaciones.stock_formatos')->middleware('auth');

    Route::get('/cliente/ventas/cotizaciones/{id}/vista_previa',  'ca\ventas\CA_VentasCotizacionesController@vista_previa' )->name('CA_ventas_cotizaciones.vista_previa')->middleware('auth'); 

    Route::post('/cliente/ventas/cotizaciones/update',  'ca\ventas\CA_VentasCotizacionesController@update' )->name('CA_ventas_cotizaciones.update')->middleware('auth'); 

    Route::post('/cliente/ventas/cotizaciones/contactos',  'ca\ventas\CA_VentasCotizacionesController@contactos' )->name('CA_ventas_cotizaciones.contactos')->middleware('auth'); 

    Route::get('/cliente/ventas/cotizaciones/{id}/{estado}/estado',  'ca\ventas\CA_VentasCotizacionesController@estado' )->name('CA_ventas_cotizaciones.estado')->middleware('auth');

    Route::get('/cliente/ventas/cotizaciones/{id}/{estado}/estado_detalle',  'ca\ventas\CA_VentasCotizacionesController@estado_detalle' )->name('CA_ventas_cotizaciones.estado_detalle')->middleware('auth');

    Route::get('/cliente/ventas/cotizaciones/{id}/detalle',  'ca\ventas\CA_VentasCotizacionesController@detalle' )->name('CA_ventas_cotizaciones.detalle')->middleware('auth');

    Route::get('/cliente/ventas/cotizaciones/nuevo',  'ca\ventas\CA_VentasCotizacionesController@nuevo' )->name('CA_ventas_cotizaciones.nuevo')->middleware('auth');

    Route::get('/cliente/ventas/cotizaciones/{id}/exportar',  'ca\ventas\CA_VentasCotizacionesController@exportar' )->name('CA_ventas_cotizaciones.exportar')->middleware('auth');

    

    //rutas: cliente / ventas / Contro despacho

    Route::get('/cliente/ventas/controlDespacho', 'ca\ventas\ControlDespachoController@index')->middleware('auth');

    Route::get('/cliente/ventas/DTcontrolDespacho', 'ca\ventas\ControlDespachoController@DTindex')->middleware('auth');

    Route::get('/cliente/ventas/controlDespacho/{id}/edit',  'ca\ventas\ControlDespachoController@edit' )->name('CA_control_despacho.edit')->middleware('auth'); 

    Route::get('/cliente/ventas/controlDespacho/{id}/precios',  'ca\ventas\ControlDespachoController@precios' )->name('CA_control_despacho.precios')->middleware('auth'); 

    Route::post('/cliente/ventas/controlDespacho/store',  'ca\ventas\ControlDespachoController@store' )->name('CA_control_despacho.store')->middleware('auth'); 

    Route::post('/cliente/ventas/controlDespacho/store_detalle',  'ca\ventas\ControlDespachoController@store_detalle' )->name('CA_control_despacho.store_detalle')->middleware('auth'); 

    Route::get('/cliente/ventas/controlDespacho/{id}/store_detalle',  'ca\ventas\ControlDespachoController@stock_formatos' )->name('CA_control_despacho.stock_formatos')->middleware('auth');

    Route::get('/cliente/ventas/controlDespacho/{id}/vista_previa',  'ca\ventas\ControlDespachoController@vista_previa' )->name('CA_control_despacho.vista_previa')->middleware('auth'); 

    Route::get('/cliente/ventas/controlDespacho/{id}/mail',  'ca\ventas\ControlDespachoController@mail' )->name('CA_control_despacho.mail')->middleware('auth'); 

    Route::post('/cliente/ventas/controlDespacho/update',  'ca\ventas\ControlDespachoController@update' )->name('CA_control_despacho.update')->middleware('auth'); 

    Route::post('/cliente/ventas/controlDespacho/contactos',  'ca\ventas\ControlDespachoController@contactos' )->name('CA_control_despacho.contactos')->middleware('auth'); 

    Route::get('/cliente/ventas/controlDespacho/{id}/{estado}/estado',  'ca\ventas\ControlDespachoController@estado' )->name('CA_control_despacho.estado')->middleware('auth');

    Route::get('/cliente/ventas/controlDespacho/{id}/{estado}/estado_detalle',  'ca\ventas\ControlDespachoController@estado_detalle' )->name('CA_control_despacho.estado_detalle')->middleware('auth');

    Route::get('/cliente/ventas/controlDespacho/{id}/detalle',  'ca\ventas\ControlDespachoController@detalle' )->name('CA_control_despacho.detalle')->middleware('auth');

    Route::get('/cliente/ventas/controlDespacho/nuevo',  'ca\ventas\ControlDespachoController@nuevo' )->name('CA_control_despacho.nuevo')->middleware('auth');

    Route::get('/cliente/ventas/controlDespacho/{id}/exportar',  'ca\ventas\ControlDespachoController@exportar' )->name('CA_control_despacho.exportar')->middleware('auth');

    Route::get('/cliente/ventas/controlDespacho/{id}/{estado}/cambioEstado',  'ca\ventas\ControlDespachoController@cambio_estado' )->name('CA_control_despacho.cambio_estado')->middleware('auth'); 

 

 

// version cliente

// Menú configuraciones

    //rutas: cliente / administracion / productos / subcategorias

    Route::get('/cliente/configuracion/ventas/cotizacion_estado', 'CC_ConfiguracionVentasCotizacionEstadosController@index')->middleware('auth');

    Route::get('/cliente/configuracion/ventas/cotizacion_estado/{id}/edit',  'CC_ConfiguracionVentasCotizacionEstadosController@edit' )->name('CC_Configuracion_ventas_cotizacion_estados.edit')->middleware('auth'); 

    Route::post('/cliente/configuracion/ventas/cotizacion_estado/store',  'CC_ConfiguracionVentasCotizacionEstadosController@store' )->name('CC_Configuracion_ventas_cotizacion_estados.store')->middleware('auth'); 

    Route::post('/cliente/configuracion/ventas/cotizacion_estado/update',  'CC_ConfiguracionVentasCotizacionEstadosController@update' )->name('CC_Configuracion_ventas_cotizacion_estados.update')->middleware('auth'); 

    Route::post('/cliente/configuracion/ventas/cotizacion_estado/contactos',  'CC_ConfiguracionVentasCotizacionEstadosController@contactos' )->name('CC_Configuracion_ventas_cotizacion_estados.contactos')->middleware('auth'); 

    Route::get('/cliente/configuracion/ventas/cotizacion_estado/{id}/{estado}/estado',  'CC_ConfiguracionVentasCotizacionEstadosController@estado' )->name('CC_Configuracion_ventas_cotizacion_estados.estado')->middleware('auth');

    



//version cliente

// menú Mail    

    Route::get('/email/configuraciones', 'ca\mail\EmailController@configIndex')->name('CA_mail_config.Index')->middleware('auth');

    Route::post('/email/configuraciones/store',  'ca\mail\EmailController@configStore' )->name('CA_mail_config.store')->middleware('auth'); 

    Route::get('/email/destinatarios', 'ca\mail\EmailController@destiIndex')->name('CA_mail_desti.Index')->middleware('auth');

    Route::post('/email/destinatarios/store',  'ca\mail\EmailController@destiStore' )->name('CA_mail_desti.store')->middleware('auth'); 

    Route::get('/email/destinatarios/{id}/edit',  'ca\mail\EmailController@destiEdit' )->name('CA_mail_desti.edit')->middleware('auth'); 

    Route::post('/email/destinatarios/update',  'ca\mail\EmailController@destiUpdate' )->name('CA_mail_desti.update')->middleware('auth'); 

    Route::get('/email/plantillas', 'ca\mail\EmailController@planIndex')->name('CA_mail_plan.Index')->middleware('auth');

    Route::post('/email/plantillas/store',  'ca\mail\EmailController@planStore' )->name('CA_mail_plan.store')->middleware('auth'); 

    Route::get('/email/plantillas/{id}/edit',  'ca\mail\EmailController@planEdit' )->name('CA_mail_plan.edit')->middleware('auth'); 

    Route::post('/email/plantillas/update',  'ca\mail\EmailController@planUpdate' )->name('CA_mail_plan.update')->middleware('auth'); 

    

    Route::get('/email/redactar', 'ca\ventas\mail\EmailController@index')->middleware('auth');



    Route::post('/contactar', 'ca\ventas\mail\EmailController@contact')->name('contact');

    //Ruta que esta señalando nuestro formulario 