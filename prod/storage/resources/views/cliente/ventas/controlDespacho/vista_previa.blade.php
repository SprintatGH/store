  @extends('layouts.default')

@section('title', 'Cotización - PDF')

@push('css')
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-colreorder-bs4/css/colreorder.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-keytable-bs4/css/keytable.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-rowreorder-bs4/css/rowreorder.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')

   

				<ol class="breadcrumb float-xl-right">
						<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:;">Ventas</a></li>
						<li class="breadcrumb-item active">Control Despacho</li>
					</ol>
					<h1 class="page-header">Vista Previa </h1>
					
                    


            <div class="invoice">
				<!-- begin invoice-company -->
				<div class="invoice-company">
					<span class="pull-right hidden-print">
						<a href="{{ route('CA_control_despacho.exportar', $id ) }}" class="btn btn-sm btn-white m-b-10"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Exportar a PDF</a>
						
					</span>
					Control de Despacho N° {{ $id }} 
					
				</div>
				( {{ $ca_venta_cot->descripcion }} )
				<!-- end invoice-company -->
				<!-- begin invoice-header -->
				<div class="invoice-header">
					<div class="invoice-from">
  						
						<td class="with-img"><img src="/imagenes/logos/{{ session('id_empresa') }}.jpg" class="img-rounded height-150" /></td>
						
					</div>
					<div class="invoice-from">
						<small>De</small>
						<address class="m-t-5 m-b-5">
							<strong class="text-inverse">{{ $info_empresa->nombre }}</strong><br />
							{{ $info_empresa->razon_social }}<br />
							Telefono:{{ $info_empresa->telefono }}<br />
							Email:{{ $info_empresa->email }}<br />
							
						</address>
					</div>
					<div class="invoice-to">
						<small>Para</small>
						<address class="m-t-5 m-b-5">
							<strong class="text-inverse">{{ $ca_cliente->giro }}</strong><br />
							{{ $ca_cliente->Nombre }}<br />
							{{ $ca_cliente->direccion }}<br />
							Telefono: {{ $ca_cliente->telefono }}<br />
							Email: {{ $ca_cliente->email }}
						</address>
					</div>
					<div class="invoice-date">
						<small>Fecha</small>
						<div class="date text-inverse m-t-5"><h2>{{ $fecha }}</h2></div>
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
									<th class="text-center">FORMATO</th>
									<th class="text-center" width="10%">PRECIO</th>
									<th class="text-center" width="10%">CANTIDAD</th>
									<th class="text-right" width="20%">TOTAL PRODUCTO</th>
								</tr>
							</thead>
							<tbody>
							
								@foreach ($contenido as $items)
									<tr>
										<td>
											<span class="text-inverse">{{ $items->nombre_producto }}</span><br />
											<small>{{ $items->descripcion_producto }}</small>
										</td>
										<td class="text-center">{{ $items->nombre_formato }} </td>
										<td class="text-center">${{ number_format($items->precio,0) }} </td>
										<td class="text-center">{{ number_format($items->cantidad,0) }} </td>
										<td class="text-right">${{ number_format($items->precio * $items->cantidad,0) }}</td>
									</tr>
								@endforeach	
								
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
									<span class="text-inverse">${{ number_format($subtotal,0) }}</span>
								</div>
								<div class="sub-price">
									<i class="fa fa-plus text-muted"></i>
								</div>
								<div class="sub-price">
									<small>DESPACHO</small>
									<span class="text-inverse">${{ number_format($ca_venta_cot->valor_despacho,0) }}</span>
								</div>
							</div>
						</div>
						<div class="invoice-price-right">
							<small>TOTAL</small> <span class="f-w-600">${{ number_format($subtotal + $ca_venta_cot->valor_despacho,0) }}</span>
						</div>
					</div>
					<!-- end invoice-price -->
				</div>
				<!-- end invoice-content -->
				<!-- begin invoice-note -->
				<div class="invoice-note"> </div>
  						
					<div class="invoice-header">
						<div class="invoice-from">
							
							<span class="m-r-10">NOMBRE:</span>
								
						</div>
						<div class="invoice-from">
							
							<span class="m-r-10">RUT:</span>
								
						</div> 
						<div class="invoice-from">
							
							<span class="m-r-10">FIRMA:</span>
								
						</div>
					</div>
										
										

				<!-- end invoice-note -->
				<!-- begin invoice-footer -->
				<div class="invoice-footer">
					<p class="text-center m-b-5 f-w-600">
						GRACIAS POR PREFERIRNOS
					</p>
					<p class="text-center">
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> www.toplive.cl</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> {{ $info_empresa->telefono }}</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> {{ $info_empresa->email }} </span>
					</p>
				</div>
				<!-- end invoice-footer -->
			</div>
            


@endsection

@push('scripts')
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


@endpush