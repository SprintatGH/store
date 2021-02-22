<?php

namespace App\Constants;

class Cliente
{
    
    //************   ventas   *************/
    const CONTROL_DESPACHO_ELIMINADO = 0;
    const CONTROL_DESPACHO_ABIERTO = 1;
    const CONTROL_DESPACHO_CERRADO = 2;
    
    const CONTROL_DESPACHO_ESTADO_CREADO = 1;
    const CONTROL_DESPACHO_ESTADO_CONCESION = 2;
    const CONTROL_DESPACHO_ESTADO_DESPACHADO = 3;
    const CONTROL_DESPACHO_ESTADO_PAGADO = 4;

    //************   stock   ***************/

    const STOCK_AGREGAR = 1;
    const STOCK_DESCONTAR = 0;
     
    
    //************   mail  ***************/

    const MODULO_DESPACHO= 1;


    //************   punto venta  ***************/

    const PV_ESTADO_ELIMINADO= 0;
    const PV_ESTADO_ACTIVO= 1;
    const PV_ESTADO_EN_PREPARACION= 2;


    //************   Sucursales  ***************/

    const SUCURSAL_BASE= 0;

}