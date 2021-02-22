<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
<title>Team Store | Cotización - PDF</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="Juan Pablo Basualdo" />

<style type="text/css">
	.text-inverse {
		color: #222!important
	}

	.text-muted {
		color: #eee!important
	}

	.text-center {
		text-align: center!important
	}

	.text-right {
		text-align: right!important
	}

	.text-left {
		text-align: left!important;
		font-size: 10px;
	}
	.titulo-producto-left {
		text-align: left!important;
		font-size: 10px;
	}
	.titulo-producto-right {
		text-align: right!important;
		font-size: 10px;
	}
	.titulo-producto-center {
		text-align: center!important;
		font-size: 10px;
	}

	small {
		font-size: 80%
	}
	.small,
	small {
		font-size: 80%;
		font-weight: 400
	}
	.m-t-5 {
		margin-top: 5px!important
	}
	.m-b-5 {
		margin-bottom: 5px!important
	}

	.f-w-600 {
		font-weight: 600!important
	}
	.m-r-10 {
		margin-right: 10px!important
	}


	.td-40{
		width: 40%;
	}

	.td-100{
		width: 100%;
	}


	.pdf-content {
		background: #fff;
		padding: 20px
	}

	.pdf-content>div:not(.pdf-content-footer) {
		margin-bottom: 20px
	}

	.pdf-content .pdf-content-company {
		font-size: 16px;
		font-weight: 600
	}

	.pdf-content .pdf-content-header {
		margin: 0 -20px;
		background: #f9f9f9;

	}


	@media (max-width:991.98px) {
		.pdf-content .pdf-content-header {
			display: block
		}
		.pdf-content .pdf-content-header>div+div {
			border-top: 1px solid #ededed
		}
	}

	.pdf-content .pdf-content-from {
		padding: 20px;
		-webkit-box-flex: 1;
		-ms-flex: 1;
		flex: 1;
		font-size: 12px;
		vertical-align: text-top;
	}

	.pdf-content .pdf-content-from strong {
		font-size: 12px;
		font-weight: 600
	}

	.pdf-content .pdf-content-to {
		padding: 20px;
		-webkit-box-flex: 1;
		-ms-flex: 1;
		flex: 1;
		font-size: 12px;
	}

	.pdf-content .pdf-content-to strong {
		font-size: 12px;
		font-weight: 600
	}

	.pdf-content .pdf-content-date {
		text-align: right;
		padding: 20px;

		font-size: 12px;
	}

	@media (max-width:991.98px) {
		.pdf-content .pdf-content-date {
			text-align: left
		}
	}

	.pdf-content .pdf-content-date .date {
		font-size: 12px;
		font-weight: 600
	}

	.pdf-content .table-pdf {
		font-size: 13px
	}

	@media (max-width:991.98px) {
		.pdf-content .table-pdf {
			white-space: nowrap
		}
	}

	table {
		border-collapse: collapse;
		
	}


	.table {
		width: 100%;
		margin-bottom: 16px;
		color: #333
	}

	.table td,
	.table th {
		padding: 8px;
		vertical-align: top;
		border-top: 1px solid #dadada
	}

	.table thead th {
		vertical-align: bottom;
		border-bottom: 2px solid #dadada
	}

	.table tbody+tbody {
		border-top: 2px solid #dadada
	}



	.pdf-content .pdf-content-price {
		background: #f9f9f9;
		width: 100%;
	}

	@media (max-width:575.98px) {
		.pdf-content .pdf-content-price {
			display: block
		}
	}

	.pdf-content .pdf-content-price small {
		font-size: 12px;
		font-weight: 400;
		display: block
	}

	.pdf-content-total {
		
		padding: 20px;
		font-size: 20px;
		font-weight: 300;
		position: relative;
		vertical-align: bottom;
		text-align: right;
		color: #fff;
		background: #222;
		align-items: center;
		width: 100%;
	}



	.pdf-content .pdf-content-price .pdf-content-price-right small {
		display: block;
		opacity: .6;
		position: absolute;
		top: 15px;
		left: 20px;
		font-size: 12px
	}

	.pdf-content .pdf-content-price .pdf-content-price-left {
		padding: 20px;
		font-size: 20px;
		font-weight: 600;

	}

	.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row {
		align-items: center
	}

	@media (max-width:575.98px) {
		.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row {
			
			text-align: center
		}
	}

	.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row .sub-price {
		padding: 0 20px
	}

	@media (max-width:991.98px) {
		.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row .sub-price {
			padding: 0
		}
		.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row .sub-price+.sub-price {
			padding-left: 20px
		}
	}

	@media (max-width:575.98px) {
		.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row .sub-price+.sub-price {
			padding-left: 0
		}
	}


	.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row {

		align-items: center
	}

	@media (max-width:575.98px) {
		.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row {
			
			text-align: center
		}
	}

	.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row .sub-price {
		padding: 0 20px
	}

	@media (max-width:991.98px) {
		.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row .sub-price {
			padding: 0
		}
		.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row .sub-price+.sub-price {
			padding-left: 20px
		}
	}

	@media (max-width:575.98px) {
		.pdf-content .pdf-content-price .pdf-content-price-left .pdf-content-price-row .sub-price+.sub-price {
			padding-left: 0
		}
	}

	.pdf-content .pdf-content-note {
		color: #484848;
		margin-top: 80px;
		font-size: 11px;
		line-height: 1.75
	}

	.pdf-content .pdf-content-footer {
		border-top: 1px solid #c8c8c8;
		padding-top: 15px;
		font-size: 11px;
		color: #484848
	}
</style>
    
</head>
<body>


            <div class="pdf-content">
            
				<div class="pdf-content-company">
					COTIZACIÓN N° <?php echo e($id); ?>

				</div>
                
				<div class="pdf-content-header">
                    <table class="table-borderless">
						<tbody>
							
							<tr>
								<td class="td-40" >
									<div class="pdf-content-from ">
                            
											<small>De</small>
											<div class="m-t-5 m-b-5">
												<strong class="text-inverse"><?php echo e($info_empresa->nombre); ?></strong><br />
												<?php echo e($info_empresa->razon_social); ?><br />
												<?php echo e($info_empresa->direccion); ?><br />
												Telefono:<?php echo e($info_empresa->telefono); ?><br /><br />
											</div>
									</div>
								</td>
								<td class="td-40">
									<div class="pdf-content-to" >
                            
											<small>Para</small>
											<div class="m-t-5 m-b-5">
												<strong class="text-inverse"><?php echo e($ca_cliente->giro); ?></strong><br />
												<?php echo e($ca_cliente->Nombre); ?><br />
												<?php echo e($ca_cliente->direccion); ?><br />
												Telefono: <?php echo e($ca_cliente->telefono); ?><br />
												Email: <?php echo e($ca_cliente->email); ?>

											</div>
									</div>
								</td>
								<td class="td-40">
									<div class="pdf-content-date" >
										<small>Fecha</small>
										<div class="date text-inverse m-t-5"><?php echo e($fecha); ?></div><br /><br /><br /><br />
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			
				
					
						<table class="table table-pdf">
							<thead>
								<tr>
									<th class="titulo-producto-left">PRODUCTOS</th>
									<th class="titulo-producto-center">FORMATO</th>
									<th class="titulo-producto-center" width="10%">PRECIO</th>
									<th class="titulo-producto-center" width="10%">CANTIDAD</th>
									<th class="titulo-producto-right" width="20%">TOTAL PRODUCTO</th>
								</tr>
							</thead>
							<tbody>
							
								<?php $__currentLoopData = $contenido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td>
											<span class="text-inverse"><?php echo e($items->nombre_producto); ?></span><br />
											<small><?php echo e($items->descripcion_producto); ?></small>
										</td>
										<td class="text-center"><?php echo e($items->nombre_formato); ?> </td>
										<td class="text-center">$<?php echo e(number_format($items->precio,0)); ?> </td>
										<td class="text-center"><?php echo e(number_format($items->cantidad,0)); ?> </td>
										<td class="text-right">$<?php echo e(number_format($items->precio * $items->cantidad,0)); ?></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
								
							</tbody>
						</table>


					<div class="pdf-content-price">
						<table >
							
								<tr>
									<td >
										<div class="pdf-content-price-left">
											<div class="pdf-content-price-row">
												<div class="sub-price">
													<small>SUBTOTAL</small>
													<span class="text-inverse">$<?php echo e(number_format($subtotal,0)); ?></span>
												</div>
												<div class="sub-price">
													<i class="fa fa-plus text-muted"></i>
												</div>
												
											</div>
										</div>
									</td>
									<td >
										<div class="pdf-content-price-left">
											<div class="pdf-content-price-row">
												
												<div class="sub-price">
													<small>DESPACHO</small>
													<span class="text-inverse">$<?php echo e(number_format($ca_venta_cot->valor_despacho,0)); ?></span>
												</div>
											</div>
										</div>
										
									</td>
									<td style="width: 350px;"> </td>
									<td style="width: 50px;">
										<div class="pdf-content-total">
											<small>TOTAL</small> <span class="f-w-600">$<?php echo e(number_format($subtotal + $ca_venta_cot->valor_despacho,0)); ?></span>
										</div>
											
									</td>
								</tr>
						</table>
					</div>
					
				
                
				<div class="pdf-content-note">
					* Cotización válida por 30 días <br />
				</div>
				
				<div class="pdf-content-footer">
					<p class="text-center m-b-5 f-w-600">
						GRACIAS POR PREFERIRNOS
					</p>
					<p class="text-center">
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> www.toplive.cl</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> M:contacto@toplive.cl </span>
					</p>
				</div>
				
			</div>
            

</div>

		
</body>
</html><?php /**PATH /home2/cst62160/sistemas/produccion/resources/views/cliente/ventas/cotizaciones/cotizacion.blade.php ENDPATH**/ ?>