<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startPush('css'); ?>
	<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
	<link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item active">Dashboard</li>
	</ol>
	
	<h1 class="page-header">Dashboard <small>Revisa tus eventos...</small></h1>
					
	<div class="row">
	
		<div class="col-xl-4 col-md-6">
			<div <?php if($totalStock < 0): ?> class="widget widget-stats bg-red" <?php else: ?> class="widget widget-stats bg-blue" <?php endif; ?> >
				<div class="stats-icon"><i class="fa fa-desktop"></i></div>
				<div class="stats-info">
					<h4>STOCK FÍSICO</h4>
					<p><?php echo e($totalStock); ?></p>	
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver detalle <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>
				
				
		<!-- <div class="col-xl-3 col-md-6">
			<div <?php if($sumaStockActual > 0): ?>  class="widget widget-stats bg-red"  <?php else: ?> class="widget widget-stats bg-info"  <?php endif; ?> >
				<div class="stats-icon"><i class="fa fa-link"></i></div>
				<div class="stats-info">
					<h4>STOCK DE PRODUCTOS</h4>
					<p>Sin Stock: <?php echo e($sumaStockActual); ?> </p>	 
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver detalle <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div> -->
				
		<div class="col-xl-4 col-md-6">
			<div class="widget widget-stats bg-orange">
				<div class="stats-icon"><i class="fa fa-dollar-sign fa-fw"></i></div>
				<div class="stats-info">
					<h4>VENTAS DEL MES</h4>
					<p><?php echo e(is_null($ventas[0]['total'])? 0: number_format($ventas[0]['total'], 0)); ?></p>	
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver detalle <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>
		
		<div class="col-xl-4 col-md-6">
			<div <?php if( count($despachos) > 0): ?>  class="widget widget-stats bg-red"  <?php else: ?> class="widget widget-stats bg-dark"  <?php endif; ?>>
				<div class="stats-icon"><i class="fa fa-clock"></i></div>
				<div class="stats-info">
					<h4>DESPACHOS PENDIENTES</h4>
					<p><?php echo e(count($despachos)); ?> Impagos</p>	
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver detalle <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>
				
	</div>
			
	<div class="row">

		<!-- <div class="col-xl-4 col-lg-6"> 
			<div class="panel panel-inverse" data-sortable-id="index-3">
				<div class="panel-heading">
					<h4 class="panel-title">Eventos del mes</h4>
				</div>
				<div id="schedule-calendar" class="bootstrap-calendar"></div>
				<div class="list-group">
					<a href="javascript:;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis">
						Reporte de Stock físico
						<span class="badge bg-teal f-s-10">9:00 am</span>
					</a> 
					<a href="javascript:;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis">
						Reunión Cliente 
						<span class="badge bg-blue f-s-10">2:45 pm</span>
					</a>
				</div>
			</div> 
		</div> -->
		<div class="col-xl-4 col-lg-6"> 
			<div class="card border-0 mb-3 bg-dark text-white"> 
				<div class="card-body"> 
					<div class="mb-3 text-grey">
						<b>ALERTA STOCK PRODUCTOS</b>
						<span class="ml-2 "><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Stock de productos" data-placement="top" data-content="Lista de productos con stock bajo el mínimo"></i></span>
					</div> 

					<?php $__currentLoopData = $listadoAlertaStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="d-flex align-items-center m-b-15">
							<div class="widget-img rounded-lg m-r-10 bg-white p-3 width-30"> 
								<div class="h-100 w-100" > 
									<?php if(isset($items['avatar'])): ?>
										<td class="with-img"><img src="/files/productos/<?php echo e($items['avatar']); ?>" class="img-rounded height-30"  /></td>
									<?php else: ?>
										<td class="with-img"><img src="/files/productos/sin_imagen.png" class="img-rounded height-30" /></td>
									<?php endif; ?>	
								</div>
							</div>
							<div class="text-truncate">
								<div><?php echo e($items['producto']); ?></div>
								<div class="text-grey">Stock Mínimo: <?php echo e($items['stockMinimo']); ?></div>
							</div>
							<div class="ml-auto text-center">
								<div class="f-s-13"><span data-animation="number" data-value="<?php echo e($items['stockActual']); ?>"><?php echo e($items['stockActual']); ?></span></div>
								<div class="text-grey f-s-10">Stock Físico</div>
							</div>
						</div> 
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div> 
			</div> 
		</div>						

		<div class="col-xl-4 col-lg-6"> 
			<div class="card border-0 mb-3 bg-dark text-white"> 
				<div class="card-body"> 
					<div class="mb-3 text-grey">
						<b>PRODUCTOS MAS VENDIDOS</b>
						<span class="ml-2 "><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Productos mas vendidos" data-placement="top" data-content="Listado de los 5 productos mas vendidos en el presente mes"></i></span>
					</div> 

					<?php $__currentLoopData = $ProductosVendidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="d-flex align-items-center m-b-15">
							<div class="widget-img rounded-lg m-r-10 bg-white p-3 width-30"> 
								<div class="h-100 w-100" > 
									<?php if(isset($items->avatar)): ?>
										<td class="with-img"><img src="/files/productos/<?php echo e($items->avatar); ?>" class="img-rounded height-30"  /></td>
									<?php else: ?>
										<td class="with-img"><img src="/files/productos/sin_imagen.png" class="img-rounded height-30" /></td>
									<?php endif; ?>	
								</div>
							</div>
							<div class="text-truncate">
								<div><?php echo e($items->nombre); ?></div>
								<div class="text-grey">$<?php echo e(number_format($items->ganancia, 0)); ?></div>
							</div>
							<div class="ml-auto text-center">
								<div class="f-s-13"><span data-animation="number" data-value="<?php echo e($items->cantidad); ?>"><?php echo e($items->cantidad); ?></span></div>
								<div class="text-grey f-s-10">Vendidos</div>
							</div>
						</div> 
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div> 
			</div> 
		</div>


				
		<div class="col-xl-4 col-lg-6"> 
			<div class="card border-0 mb-3 bg-dark text-white"> 
				<div class="card-body"> 
					<div class="mb-3 text-grey">
						<b>TOP CLIENTES</b>
						<span class="ml-2 "><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Top 5 de los mejores cliente" data-placement="top" data-content="Listado de los mejores 5 clientes del presente mes"></i></span>
					</div> 
					<?php $__currentLoopData = $topClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="d-flex align-items-center m-b-15">
							
							<div class="text-truncate">
								<div><?php echo e($items->nombre); ?></div>
								<div class="text-grey">$<?php echo e(number_format($items->ganancia, 0)); ?></div>
							</div>
							<div class="ml-auto text-center">
								<div class="f-s-13"><span data-animation="number" data-value="<?php echo e($items->cantidad); ?>"><?php echo e($items->cantidad); ?></span></div>
								<div class="text-grey f-s-10">Vendidos</div>
							</div>
						</div>  
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div> 
			</div> 
		</div>


	</div>
			
			
	

<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>
	<script src="/assets/plugins/d3/d3.min.js"></script>
	<script src="/assets/plugins/nvd3/build/nv.d3.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
	<script src="/assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
	<script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="/assets/js/demo/dashboard-v2.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jpabl\OneDrive\Escritorio\respaldo\store-sp-pro\produccion\resources\views/dashboard/indexAdminCliente.blade.php ENDPATH**/ ?>