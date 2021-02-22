<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startPush('css'); ?>
	<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
	<link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">Dashboard</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Dashboard <small>Revisa tus eventos...</small></h1>
	<!-- end page-header -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-3 -->
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-teal">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
				<div class="stats-content">
					<div class="stats-title">Alumnos matriculados</div>
					<div class="stats-number">125</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 70.1%;"></div>
					</div>
					<div class="stats-desc">La última semana (70.1%)</div>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
				<div class="stats-content">
					<div class="stats-title">Ingresos</div>
					<div class="stats-number">7.580.000</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 40.5%;"></div>
					</div>
					<div class="stats-desc">La última semana (40.5%)</div>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-indigo">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
				<div class="stats-content">
					<div class="stats-title">Materiales</div>
					<div class="stats-number">725</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 76.3%;"></div>
					</div>
					<div class="stats-desc">Faltan (76.3%)</div>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-dark">
				<div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
				<div class="stats-content">
					<div class="stats-title">nuevos Comentarios</div>
					<div class="stats-number">13</div>
					<div class="stats-progress progress">
						<div class="progress-bar" style="width: 54.9%;"></div>
					</div>
					<div class="stats-desc">Importantes (54.9%)</div>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
	</div>
	<!-- end row -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-8 -->
		<div class="col-xl-8">
			<div class="widget-chart with-sidebar inverse-mode">
				<div class="widget-chart-content bg-dark">
					<h4 class="chart-title">
						Analisis de cumplimiento
						<small>Según planificación</small>
					</h4>
					<div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode" style="height: 260px;"></div>
				</div>
				<div class="widget-chart-sidebar bg-dark-darker">
					<div class="chart-number">
						1,225,729
						<small>Total cumplimiento</small>
					</div>
					<div class="flex-grow-1 d-flex align-items-center">
						<div id="visitors-donut-chart" class="nvd3-inverse-mode" style="height: 180px"></div>
					</div>
					<ul class="chart-legend f-s-11">
						<li><i class="fa fa-circle fa-fw text-blue f-s-9 m-r-5 t-minus-1"></i> 34.0% <span>Concretado</span></li>
						<li><i class="fa fa-circle fa-fw text-teal f-s-9 m-r-5 t-minus-1"></i> 56.0% <span>Restante</span></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end col-8 -->
		<!-- begin col-4 -->
		<div class="col-xl-4">
			<div class="panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading">
					<h4 class="panel-title">
						Distribucion
					</h4>
				</div>
				<div id="visitors-map" class="bg-dark-darker" style="height: 179px;"></div>
				<div class="list-group">
					<a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
						1. Nivel básico
						<span class="badge bg-teal f-s-10">20.95%</span>
					</a> 
					<a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
						2. Nivel medio
						<span class="badge bg-blue f-s-10">16.12%</span>
					</a>
					<a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis">
						3. Nivel Avanzado
						<span class="badge bg-silver-darker f-s-10">14.99%</span>
					</a>
				</div>
			</div>
		</div>
		<!-- end col-4 -->
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
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TeamGarden\resources\views/dashboard/indexAdmin.blade.php ENDPATH**/ ?>