@extends('layouts.default')

@section('title', 'Dashboard')

@push('css')
	<link href="/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
	<link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
@endpush

@section('content')

	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item active">Dashboard</li>
	</ol>
	
	<h1 class="page-header">Dashboard <small>Revisa tus eventos...</small></h1>
					
	<div class="row">
	
		<div class="col-xl-4 col-md-6">
			<div @if ($totalStock < 0) class="widget widget-stats bg-red" @else class="widget widget-stats bg-blue" @endif >
				<div class="stats-icon"><i class="fa fa-desktop"></i></div>
				<div class="stats-info">
					<h4>STOCK FÍSICO</h4>
					<p>{{ $totalStock }}</p>	
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver detalle <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>
				
				
		<!-- <div class="col-xl-3 col-md-6">
			<div @if ($sumaStockActual > 0)  class="widget widget-stats bg-red"  @else class="widget widget-stats bg-info"  @endif >
				<div class="stats-icon"><i class="fa fa-link"></i></div>
				<div class="stats-info">
					<h4>STOCK DE PRODUCTOS</h4>
					<p>Sin Stock: {{ $sumaStockActual }} </p>	 
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
					<p>{{ is_null($ventas[0]['total'])? 0: number_format($ventas[0]['total'], 0)  }}</p>	
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver detalle <i class="fa fa-arrow-alt-circle-right"></i></a>
				</div>
			</div>
		</div>
		
		<div class="col-xl-4 col-md-6">
			<div @if ( count($despachos) > 0)  class="widget widget-stats bg-red"  @else class="widget widget-stats bg-dark"  @endif>
				<div class="stats-icon"><i class="fa fa-clock"></i></div>
				<div class="stats-info">
					<h4>DESPACHOS PENDIENTES</h4>
					<p>{{ count($despachos) }} Impagos</p>	
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

					@foreach($listadoAlertaStock as $items)
						<div class="d-flex align-items-center m-b-15">
							<div class="widget-img rounded-lg m-r-10 bg-white p-3 width-30"> 
								<div class="h-100 w-100" > 
									@if (isset($items['avatar']))
										<td class="with-img"><img src="/files/productos/{{ $items['avatar'] }}" class="img-rounded height-30"  /></td>
									@else
										<td class="with-img"><img src="/files/productos/sin_imagen.png" class="img-rounded height-30" /></td>
									@endif	
								</div>
							</div>
							<div class="text-truncate">
								<div>{{$items['producto']}}</div>
								<div class="text-grey">Stock Mínimo: {{ $items['stockMinimo']  }}</div>
							</div>
							<div class="ml-auto text-center">
								<div class="f-s-13"><span data-animation="number" data-value="{{ $items['stockActual'] }}">{{ $items['stockActual'] }}</span></div>
								<div class="text-grey f-s-10">Stock Físico</div>
							</div>
						</div> 
					@endforeach
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

					@foreach($ProductosVendidos as $items)
						<div class="d-flex align-items-center m-b-15">
							<div class="widget-img rounded-lg m-r-10 bg-white p-3 width-30"> 
								<div class="h-100 w-100" > 
									@if (isset($items->avatar))
										<td class="with-img"><img src="/files/productos/{{ $items->avatar }}" class="img-rounded height-30"  /></td>
									@else
										<td class="with-img"><img src="/files/productos/sin_imagen.png" class="img-rounded height-30" /></td>
									@endif	
								</div>
							</div>
							<div class="text-truncate">
								<div>{{$items->nombre}}</div>
								<div class="text-grey">${{ number_format($items->ganancia, 0)  }}</div>
							</div>
							<div class="ml-auto text-center">
								<div class="f-s-13"><span data-animation="number" data-value="{{ $items->cantidad }}">{{ $items->cantidad }}</span></div>
								<div class="text-grey f-s-10">Vendidos</div>
							</div>
						</div> 
					@endforeach
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
					@foreach($topClientes as $items)
						<div class="d-flex align-items-center m-b-15">
							
							<div class="text-truncate">
								<div>{{ $items->nombre }}</div>
								<div class="text-grey">${{ number_format($items->ganancia, 0) }}</div>
							</div>
							<div class="ml-auto text-center">
								<div class="f-s-13"><span data-animation="number" data-value="{{ $items->cantidad }}">{{ $items->cantidad }}</span></div>
								<div class="text-grey f-s-10">Vendidos</div>
							</div>
						</div>  
					@endforeach
				</div> 
			</div> 
		</div>


	</div>
			
			
	

@endsection



@push('scripts')
	<script src="/assets/plugins/d3/d3.min.js"></script>
	<script src="/assets/plugins/nvd3/build/nv.d3.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
	<script src="/assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
	<script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="/assets/js/demo/dashboard-v2.js"></script>
@endpush