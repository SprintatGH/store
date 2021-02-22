<?php $__env->startSection('title', 'Calendar'); ?>

<?php $__env->startPush('css'); ?>
	<link href="/assets/plugins/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media='print' />
	<link href="/assets/plugins/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">Calendario</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Calendari <small>header small text goes here...</small></h1>
	<!-- end page-header -->
	<hr />
	<!-- begin vertical-box -->
	<div class="vertical-box">
		<!-- begin event-list -->
		<div class="vertical-box-column p-r-30 d-none d-lg-table-cell" style="width: 215px">
			<div id="external-events" class="fc-event-list">
				<h5 class="m-t-0 m-b-15">Eventos asignables</h5>
				<div class="fc-event" data-color="#00acac">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-success"></i></div>
					Evento 1
				</div>
				<div class="fc-event" data-color="#348fe2">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-blue"></i></div>
					Evento 2
				</div>
				<div class="fc-event" data-color="#f59c1a">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-warning"></i></div>
					Evento 3
				</div>
				<div class="fc-event" data-color="#ff5b57">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-danger"></i></div>
					Evento 4
				</div>
				<div class="fc-event">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-inverse"></i></div>
					Evento 5
				</div>
				<hr class="bg-grey-lighter m-b-15" />
				<h5 class="m-t-0 m-b-15">Otros Eventos</h5>
				<div class="fc-event" data-color="#b6c2c9">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i></div>
					Otros Eventos 1
				</div>
				<div class="fc-event" data-color="#b6c2c9">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i></div>
					Otros Eventos 2
				</div>
				<div class="fc-event" data-color="#b6c2c9">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i></div>
					Otros Eventos 3
				</div>
				<div class="fc-event" data-color="#b6c2c9">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i></div>
					Otros Eventos 4
				</div>
				<div class="fc-event" data-color="#b6c2c9">
					<div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i></div>
					Otros Eventos 5
				</div>
			</div>
		</div>
		<!-- end event-list -->
		<!-- begin calendar -->
		<div id="calendar" class="vertical-box-column calendar"></div>
		<!-- end calendar -->
	</div>
	<!-- end vertical-box -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="/assets/plugins/moment/moment.js"></script>
	<script src="/assets/plugins/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="/assets/js/demo/calendar.demo.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\temp\resources\views/pages/calendar.blade.php ENDPATH**/ ?>