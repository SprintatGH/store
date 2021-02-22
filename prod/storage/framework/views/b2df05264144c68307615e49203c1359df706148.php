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
            
			
				<div class="pdf-content-header">
                    <table class="table-borderless">
						<tbody>
							
							<tr>
								<td class="td-30" >
									<div class="pdf-content-from ">
										<img src="<?php echo e(asset('imagenes/logos/8.jpg')); ?>" alt="Logo" height="50px">
									</div>
								</td>
								<td class="td-60" >
									<div class="pdf-content-from ">
                            
										<strong class="text-inverse">Reporte de Stock Productos</strong><br />
										<strong class="text-inverse"><?php echo e($fecha); ?></strong><br />
										<strong class="text-inverse"> Total de productos en stock: <?php echo e($totalStock); ?></strong><br />	
									</div>
								</td>
								
							</tr> 
						</tbody>
					</table>
				</div>

			
				
					
						<table class="table table-pdf">
							<thead>
								<tr>
									<th style='font-size: 9px;'class="titulo-producto-cente ">Código</th> 
                                    <th style='font-size: 9px;' class="titulo-producto-left">Nombre</th> 
                                    <th style='font-size: 9px;'class="titulo-producto-cente">Formato</th>
									<th style='font-size: 9px;'class="titulo-producto-cente">Stock Mínimo</th> 
                                    <th style='font-size: 9px;'class="titulo-producto-cente">Stock Físico</th> 
                                    <th style='font-size: 9px;'class="titulo-producto-right">Subcategoria</th>
                                    <th style='font-size: 9px;'class="titulo-producto-right">Categoria</th>
								</tr>
							</thead>
							<tbody>
							
								<?php $__currentLoopData = $contenido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td style='font-size: 9px;' class="text-center"><?php echo e($items->codigo); ?></td> 
                                        <td style='font-size: 9px;' class="text-inverse"><?php echo e($items->nombre); ?></td> 
                                        <td style='font-size: 9px;' class="text-center"><?php echo e($items->formatoNombre); ?></td>
										<td style='font-size: 9px;' class="text-center"><?php echo e($items->stock_minimo); ?></td>
										<td style='font-size: 9px;' class="text-center"><?php echo e(App\Modelos\ca\administracion\CA_ProductosStock::stockActual($items->id)); ?></td>
                                        <td style='font-size: 9px;' class="text-right"><?php echo e($items->nombre_subcategoria); ?></td>
                                        <td style='font-size: 9px;' class="text-right"><?php echo e($items->nombre_categoria); ?></td>
										
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
								
							</tbody>
						</table>


					
					
  						
						  
				
				<div class="pdf-content-footer">
					<p class="text-center">
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> www.toplive.cl</span>
					</p>
				</div>
				
			</div>
            

</div>

		
</body>
</html><?php /**PATH C:\Users\jpabl\OneDrive\Escritorio\respaldo\store-sp-pro\produccion\resources\views/cliente/administracion/productos/reportes/productosStockPDF.blade.php ENDPATH**/ ?>