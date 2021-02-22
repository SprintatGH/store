<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
<title>Team Store | Control Despacho - PDF</title>
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
					Control de Despacho N° {{ $id }}
				</div>
				
                
				<div class="pdf-content-header">
                    <table class="table-borderless">
						<tbody>
							
							<tr>
								<td class="td-30" >
									<div class="pdf-content-from ">
										<img src="{{asset('imagenes/logos/8.jpg')}}" alt="Logo" height="120px">
									</div>
								</td>
								<td class="td-30" >
									<div class="pdf-content-from ">
                            
											<small>De</small>
											<div class="m-t-4 m-b-4">
												<strong class="text-inverse">{{ $info_empresa->nombre }}</strong><br />
												{{ $info_empresa->razon_social }}<br />
												Telefono:{{ $info_empresa->telefono }}<br />
												Mail:{{ $info_empresa->email }}<br /><br />
											</div>
									</div>
								</td>
								<td class="td-30">
									<div class="pdf-content-to" >
                            
											<small>Para</small>
											<div class="m-t-4 m-b-4">
												<strong class="text-inverse">{{ $ca_cliente->giro }}</strong><br />
												{{ $ca_cliente->Nombre }}<br />
												{{ $ca_cliente->direccion }}<br />
												Telefono: {{ $ca_cliente->telefono }}<br />
												Email: {{ $ca_cliente->email }}
											</div>
									</div>
								</td>
								<td class="m-t-4 m-b-4">
									<div class="pdf-content-date" >
										<small>Fecha</small>
										<div class="date text-inverse m-t-5">{{ $fecha }}</div><br /><br /><br /><br />
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


					<div class="pdf-content-price">
						<table >
							
								<tr>
									<td >
										<div class="pdf-content-price-left">
											<div class="pdf-content-price-row">
												<div class="sub-price">
													<small>SUBTOTAL</small>
													<span class="text-inverse">${{ number_format($subtotal,0) }}</span>
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
													<span class="text-inverse">${{ number_format($ca_venta_cot->valor_despacho,0) }}</span>
												</div>
											</div>
										</div>
										
									</td>
									<td style="width: 350px;"> </td>
									<td style="width: 50px;">
										<div class="pdf-content-total">
											<small>TOTAL</small> <span class="f-w-600">${{ number_format($subtotal + $ca_venta_cot->valor_despacho,0) }}</span>
										</div>
											
									</td>
								</tr>
						</table>
					</div>
					<br><br><br>
					
					<div style="height:50px"> </div>
					
                
					<div class="pdf-content-header">
						<table class="table table-pdf">
							<thead>
								<tr>
									<th class="titulo-producto-left" width="30%">NOMBRE</th>
									<th class="titulo-producto-center" width="20%">RUT<br></th>
									<th class="titulo-producto-center" width="40%">FIRMA</th>
								</tr>
							</thead>
							
						</table>
					</div>
					<small>( {{ $ca_venta_cot->descripcion }} )</small>
					
  						
						  
				
				<div class="pdf-content-footer">
					<p class="text-center m-b-5 f-w-600">
						GRACIAS POR PREFERIRNOS
					</p>
					<p class="text-center">
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> www.toplive.cl</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> Teléfono:{{ $info_empresa->telefono }}</span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> Email:{{ $info_empresa->email }} </span>
					</p>
				</div>
				
			</div>
            

</div>

		
</body>
</html>