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
			<div class="col-xl-8 col-lg-6">
				<div class="m-b-10 m-t-10 f-s-10"> <b class="text-inverse">ULTIMAS VENTAS</b> </div>
				<div class="table-responsive">
					<table class="table table-bordered widget-table widget-table-rounded inverse-mode">
						<thead>
							<tr>
							<th width="1%">Imagen</th>
							<th>Product Producto</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="widget-table-img" style="background-image: url(../assets/img/product/product-6.png);"></div>
								</td>
								<td>
									<h4 class="widget-table-title">Mavic Pro Combo</h4>
									<p class="widget-table-desc m-b-15">Portable yet powerful, the Mavic Pro is your personal drone, ready to go with you everywhere.</p>
									<div class="progress progress-sm rounded-corner m-b-5">
										<div class="progress-bar progress-bar-striped progress-bar-animated bg-orange f-s-10 f-w-600" style="width: 30%;">30%</div>
									</div>
									<div class="clearfix f-s-10">
										status: <b class="text-white">Shipped</b>
									</div>
								</td>
								<td class="text-nowrap"> <b class="text-white">$999</b><br /> <small class="text-white text-line-through">$1,202</small> </td>
								<td>1</td>
								<td>999.00</td>
							</tr>
							<tr>
								<td>
									<div class="widget-table-img" style="background-image: url(../assets/img/product/product-6.png);"></div>
								</td>
								<td>
									<h4 class="widget-table-title">Mavic Pro Combo</h4>
									<p class="widget-table-desc m-b-15">Portable yet powerful, the Mavic Pro is your personal drone, ready to go with you everywhere.</p>
									<div class="progress progress-sm rounded-corner m-b-5">
										<div class="progress-bar progress-bar-striped progress-bar-animated bg-orange f-s-10 f-w-600" style="width: 30%;">30%</div>
									</div>
									<div class="clearfix f-s-10">
										status: <b class="text-white">Shipped</b>
									</div>
								</td>
								<td class="text-nowrap"> <b class="text-white">$999</b><br /> <small class="text-white text-line-through">$1,202</small> </td>
								<td>1</td>
								<td>999.00</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
				

			<div class="col-xl-4 col-lg-6">
				<div class="m-b-10 m-t-10 f-s-10"> <b class="text-inverse">ULTIMAS COTIZACIONES</b> </div>
				<div class="widget-todolist widget-todolist-rounded inverse-mode">
					<div class="widget-todolist-header">
						<div class="widget-todolist-header-left">
							<h4 class="widget-todolist-header-title">Clientes</h4>
						</div>
						<div class="widget-todolist-header-right">
							<div class="widget-todolist-header-total">
								<span class="text-inverse">0</span>
								<small>ESTADO</small>
							</div>
						</div>
					</div> 
					<div class="widget-todolist-body">
						<div class="widget-todolist-item"> 
							<div class="widget-todolist-content">
								<h4 class="widget-todolist-title">Borrow Tonys travel guide</h4>
								<p class="widget-todolist-desc">Productos: 40</p>
							</div>
							<div class="widget-todolist-icon">
								<a href="#"><i class="fa fa-question-circle"></i></a>
							</div>
						</div>
					</div>
					<div class="widget-todolist-body">
						<div class="widget-todolist-item"> 
							<div class="widget-todolist-content">
								<h4 class="widget-todolist-title">Borrow Tonys travel guide</h4>
								<p class="widget-todolist-desc">Productos: 40</p>
							</div>
							<div class="widget-todolist-icon">
								<a href="#"><i class="fa fa-question-circle"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>




	
		<div class="row"> 
			<div class="col-xl-4 col-lg-6"> 
				<div class="card border-0 mb-3 bg-dark-darker text-white"> 
					<div class="card-body" >
						<div class="mb-3 text-grey">
							<b>STOCK DE PRODUCTOS</b>
							<span class="text-grey ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Sales by social source" data-placement="top" data-content="Total online store sales that came from a social referrer source."></i></span>
						</div>
						<h3 class="m-b-10">Actual: <span data-animation="number" data-value="<?php echo e($sumaStockActual); ?>">0.00</span></h3> 
					</div>  
					<div class="widget-list widget-list-rounded inverse-mode"> 

						<?php $__currentLoopData = $contenido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="#" class="widget-list-item rounded-0 p-t-3">
								
								<div class="widget-list-content" >
									
									<div class="widget-list-title">
									<?php if($items->avatar == ''): ?>
										<td class="with-img"><img src="/files/productos/sin_imagen.png" width="30" height="30" /></td>
									<?php else: ?>
										<td class="with-img"><img src="/files/productos/<?php echo e($items->avatar); ?>" width="30" height="30" /></td>
									<?php endif; ?>
										<?php echo e($items->nombre); ?>

									</div>
									<div class="text-grey">Stock Mínimo <?php echo e($items->stock_minimo); ?></div>
								</div>
								<div class="widget-list-action text-nowrap text-grey">
									<div class="f-s-13"><span data-animation="number" data-value="<?php echo e($items->stock_actual); ?>">0</span></div>
								</div>
							</a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div> 
				</div> 
			</div> 
			<div class="col-xl-4 col-lg-6"> 
				<div class="card border-0 mb-3 bg-dark-darker text-white"> 
					<div class="card-body" >
						<div class="mb-3 text-grey">
							<b>PRODUCTOS MAS VENDIDOS</b>
							<span class="text-grey ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Sales by social source" data-placement="top" data-content="Total online store sales that came from a social referrer source."></i></span>
						</div>
						<h3 class="m-b-10">$<span data-animation="number" data-value="<?php echo e($sumaStockActual); ?>">0.00</span></h3> 
					</div>  
					<div class="widget-list widget-list-rounded inverse-mode"> 

						<?php $__currentLoopData = $contenido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="#" class="widget-list-item rounded-0 p-t-3">
								
								<div class="widget-list-content">
									<div class="widget-list-title">
										<?php if($items->avatar == ''): ?>
											<td class="with-img"><img src="/files/productos/sin_imagen.png" width="30" height="30" /></td>
										<?php else: ?>
											<td class="with-img"><img src="/files/productos/<?php echo e($items->avatar); ?>" width="30" height="30" /></td>
										<?php endif; ?>
										<?php echo e($items->nombre); ?>

									</div>
									<div class="text-grey">$0</div>
								</div>
								<div class="widget-list-action text-nowrap text-grey">
									<div class="f-s-13"><span data-animation="number" data-value="<?php echo e($items->stock_actual); ?>">0</span></div>
									<div class="text-grey f-s-10">Vendidos</div>
								</div>
							</a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div> 
				</div> 
			</div> 
				
				
			<div class="col-xl-4 col-lg-6"> 
				<div class="card border-0 mb-3 bg-dark-darker text-white"> 
					<div class="card-body" >
						<div class="mb-3 text-grey">
							<b>PRODUCCION POR PRODUCTO</b>
							<span class="text-grey ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Sales by social source" data-placement="top" data-content="Total online store sales that came from a social referrer source."></i></span>
						</div>
						<h3 class="m-b-10"><span data-animation="number" data-value="0">0.00</span></h3> 
					</div>  
					<div class="widget-list widget-list-rounded inverse-mode"> 

						<?php $__currentLoopData = $contenido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="#" class="widget-list-item rounded-0 p-t-3">
								
								<div class="widget-list-content">
									<div class="widget-list-title">
										<?php if($items->avatar == ''): ?>
											<td class="with-img"><img src="/files/productos/sin_imagen.png" width="30" height="30" /></td>
										<?php else: ?>
											<td class="with-img"><img src="/files/productos/<?php echo e($items->avatar); ?>" width="30" height="30" /></td>
										<?php endif; ?>
										<?php echo e($items->nombre); ?>

									</div>
									<div class="text-grey">stock actual: 0</div>
								</div>
								<div class="widget-list-action text-nowrap text-grey">
									<div class="f-s-13"><span data-animation="number" data-value="<?php echo e($items->stock_actual); ?>">0</span></div>
									<div class="text-grey f-s-10">Pedidos</div>
								</div>
							</a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div> 
				</div> 
			</div> 
		</div>

	<!-- end row -->
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jpabl\OneDrive\Escritorio\respaldo\store-sp-pro\produccion\resources\views/dashboard/indexAdmin.blade.php ENDPATH**/ ?>