  

<?php $__env->startSection('title', 'Managed Tables - Extension Combination'); ?>

<?php $__env->startPush('css'); ?>
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-colreorder-bs4/css/colreorder.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-keytable-bs4/css/keytable.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-rowreorder-bs4/css/rowreorder.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

   <?php if($action == "listado"): ?> 

				<ol class="breadcrumb float-xl-right">
						<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:;">Ventas</a></li>
						<li class="breadcrumb-item active">Cotizaciones</li>
					</ol>
					<h1 class="page-header">Vista Previa </h1>
					
                    


            <div class="invoice">
				<!-- begin invoice-company -->
				<div class="invoice-company">
					<span class="pull-right hidden-print">
						<a href="javascript:;" class="btn btn-sm btn-white m-b-10"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Exportar a PDF</a>
						<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Imprimir</a>
					</span>
					COTIZACIÓN N° <?php echo e($id); ?>

				</div>
				<!-- end invoice-company -->
				<!-- begin invoice-header -->
				<div class="invoice-header">
					<div class="invoice-from">
						<small>De</small>
						<address class="m-t-5 m-b-5">
							<strong class="text-inverse"><?php echo e($info_empresa->nombre); ?></strong><br />
							<?php echo e($info_empresa->razon_social); ?><br />
							<?php echo e($info_empresa->direccion); ?><br />
							Telefono:<?php echo e($info_empresa->telefono); ?><br />
							
						</address>
					</div>
					<div class="invoice-to">
						<small>Para</small>
						<address class="m-t-5 m-b-5">
							<strong class="text-inverse"><?php echo e($ca_cliente->giro); ?></strong><br />
							<?php echo e($ca_cliente->Nombre); ?><br />
							<?php echo e($ca_cliente->direccion); ?><br />
							Telefono: <?php echo e($ca_cliente->telefono); ?><br />
							Email: <?php echo e($ca_cliente->email); ?>

						</address>
					</div>
					<div class="invoice-date">
						<small>Fecha</small>
						<div class="date text-inverse m-t-5"><?php echo e($fecha); ?></div>
						<div class="invoice-detail">
							
						</div>
					</div>
				</div>
				<!-- end invoice-header -->
				<!-- begin invoice-content -->
				<div class="invoice-content">
					<!-- begin table-responsive -->
					<div class="table-responsive">
						<table class="table table-invoice">
							<thead>
								<tr>
									<th>PRODUCTOS</th>
									<th class="text-center" width="10%">PRECIO</th>
									<th class="text-center" width="10%">CANTIDAD</th>
									<th class="text-right" width="20%">TOTAL PRODUCTO</th>
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
					</div>
					<!-- end table-responsive -->
					<!-- begin invoice-price -->
					<div class="invoice-price">
						<div class="invoice-price-left">
							<div class="invoice-price-row">
								<div class="sub-price">
									<small>SUBTOTAL</small>
									<span class="text-inverse">$<?php echo e(number_format($subtotal,0)); ?></span>
								</div>
								<div class="sub-price">
									<i class="fa fa-plus text-muted"></i>
								</div>
								<div class="sub-price">
									<small>DESPACHO</small>
									<span class="text-inverse">$<?php echo e(number_format($ca_venta_cot->valor_despacho,0)); ?></span>
								</div>
							</div>
						</div>
						<div class="invoice-price-right">
							<small>TOTAL</small> <span class="f-w-600">$<?php echo e(number_format($subtotal + $ca_venta_cot->valor_despacho,0)); ?></span>
						</div>
					</div>
					<!-- end invoice-price -->
				</div>
				<!-- end invoice-content -->
				<!-- begin invoice-note -->
				<div class="invoice-note">
					* Cotización válida por 30 días <br />
					 
		
				</div>
				<!-- end invoice-note -->
				<!-- begin invoice-footer -->
				<div class="invoice-footer">
					<p class="text-center m-b-5 f-w-600">
						GRACIAS POR PREFERIRNOS
					</p>
					<p class="text-center">
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> www.toplive.cl</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> contacto@toplive.cl </span>
					</p>
				</div>
				<!-- end invoice-footer -->
			</div>
            

	<?php endif; ?>
   
	

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-autofill/js/dataTables.autofill.min.js"></script>
	<script src="/assets/plugins/datatables.net-autofill-bs4/js/autofill.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-colreorder/js/dataTables.colreorder.min.js"></script>
	<script src="/assets/plugins/datatables.net-colreorder-bs4/js/colreorder.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-keytable/js/dataTables.keytable.min.js"></script>
	<script src="/assets/plugins/datatables.net-keytable-bs4/js/keytable.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-rowreorder/js/dataTables.rowreorder.min.js"></script>
	<script src="/assets/plugins/datatables.net-rowreorder-bs4/js/rowreorder.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
	<script src="/assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
	<script src="/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
	<script src="/assets/plugins/jszip/dist/jszip.min.js"></script>
	<script src="/assets/js/demo/table-manage-combine.demo.js"></script>
	<script src="/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
	<script src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/cst62160/sistemas/desarrollo/resources/views/cliente/ventas/cotizaciones/vista_previa.blade.php ENDPATH**/ ?>