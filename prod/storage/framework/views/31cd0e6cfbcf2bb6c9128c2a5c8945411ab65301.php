<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
<title>Team Store | Cotización - PDF</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="Juan Pablo Basualdo" />

<link rel="stylesheet" href="<?php echo e(ltrim(public_path('/assets/css/cliente/ventas_cotizaciones_pdf.css'), '/')); ?>" />

    
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
</html><?php /**PATH C:\xampp\htdocs\store-sftp-local\sistemas\desarrollo\resources\views/cliente/ventas/cotizaciones/cotizacion.blade.php ENDPATH**/ ?>