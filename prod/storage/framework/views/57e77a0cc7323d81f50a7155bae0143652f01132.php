  

<?php $__env->startSection('title', 'Sprintat'); ?>

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

<?php $stockFisico = app('App\Modelos\ca\administracion\CA_ProductosStock'); ?>

<?php $__env->startSection('content'); ?>

   <?php if($action == "listado"): ?> 

				<ol class="breadcrumb float-xl-right">
						<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:;">Administracion</a></li>
						<li class="breadcrumb-item active">Productos</li>
					</ol>
					<h1 class="page-header">Listado <small>Productos</small></h1>
					<div class="row">
						<div class="col-xl-12">
							<div class="panel panel-inverse">
								<div class="panel-heading">
									<h4 class="panel-title">Registros</h4>
									
								</div>
								<div class="panel-body">
									<div class="table-responsive">

										<table id="grid" class="table table-striped" style="font-size: 9px;">
  											<thead>
  												<tr> 
												    <th></th>
													<th></th>
                                                    <th></th>
													<th></th>
													<th class="text-nowrap">Nombre</th>
													<th class="text-nowrap">Código</th>
													<th class="text-nowrap">Formato</th>
                                                    <th class="text-nowrap">Stock Minimo</th>
                                                    <th class="text-nowrap">Stock Físico</th>
                                                    <th class="text-nowrap">Precio por mayor</th>
                                                    <th class="text-nowrap">Precio unitario</th>
                                                    
												</tr>
											</thead>
											<tbody id="cuerpo">
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

	<?php endif; ?>
   
	
	<div class="modal fade" id="modal-reporte-pdf">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Exportar a PDF</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('CA_productos.reporte_pdf')); ?>" class="form-horizontal" data-parsley-validate="true">
							<?php echo csrf_field(); ?>
							
							    <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Producto :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="prod_reporte_pdf" id="prod_reporte_pdf" >
											<option value="0" selected> Todos </option>
											<?php $__currentLoopData = $productoStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($items->id); ?>"> <?php echo e($items->nombre); ?> - <?php echo e($items->formato); ?></option> 
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Subcategoria :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="subcategoria" id="subcategoria">
											<option value="0" selected> Todos </option>
											<?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($items->id); ?>"> <?php echo e($items->nombre); ?> </option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cancelar</a>
									<button type="submit" class="btn btn-success">Exportar</button>
								</div>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modal-stock">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Stock</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('CA_productos.store_stock')); ?>" class="form-horizontal" data-parsley-validate="true">
							<?php echo csrf_field(); ?> 
							
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Tipo :</label>
									<div class="col-md-8 col-sm-8">
										<div class="custom-control custom-radio">
											<input type="radio" id="tipo1" name="tipoStock" value=1 class="custom-control-input" checked>
											<label class="custom-control-label" for="tipo1">Ingreso</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" id="tipo0" name="tipoStock" value=0 class="custom-control-input" >
											<label class="custom-control-label" for="tipo0">Descuento</label>
										</div>
									</div>
								</div>

							    <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Producto :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="prodStock" id="prodStock" >
											<option value="0" selected> Seleccione... </option>
											<?php $__currentLoopData = $productoStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($items->id); ?>"> <?php echo e($items->nombre); ?> - <?php echo e($items->formato); ?></option> 
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>

							    <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="cantidad">Cantidad * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="cantidad" name="cantidad" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
								
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cancelar</a>
									<button type="submit" class="btn btn-success">Guardar</button>
								</div>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modal-lista_stock">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Lista Stock</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
					
						<table class="table table-striped">
							
							<thead> 
								<tr>
									<th > </th>
									
									<th class="text-nowrap">Cantidad</th>
									<th class="text-nowrap">Fecha</th>
									<th class="text-nowrap">Usuario</th>
								</tr>
							</thead>
							<tbody id="resultado">
							</tbody>
						</table>
					</p>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('CA_productos.update')); ?>" class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							 <input type="hidden" id="id" name="id">
							 	
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Subcategoria :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="subcategoria" >
											<?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($items->id); ?>"> <?php echo e($items->nombre); ?> </option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="avatar">Imagen :</label>
									<div class="col-md-8 col-sm-8"> 
										<input class="form-control" accept="image/jpeg,image/png" type="file"  id="avatar_file" name="avatar_file">
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="nombre">Nombre * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="nombre" name="nombre"  data-parsley-required="true" />
									</div>
								</div>
								
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="descripcion">Descripcion * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="descripcion" name="descripcion"  data-parsley-required="true" />
									</div>
								</div>
								 <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="stock_minimo">Stock Minimo * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="stock_minimo" name="stock_minimo" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="codigo">Codigo * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="codigo" name="codigo" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="precio_mayor">Precio por mayor * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="precio_mayor" name="precio_mayor" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="precio_unitario">Precio Unitario * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="precio_unitario" name="precio_unitario" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cancelar</a>
									<button type="submit" class="btn btn-success">Guardar</button>
								</div>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="modal-add">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Nuevo producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('CA_productos.store')); ?>" class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<?php echo method_field('POST'); ?>
							    <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Subcategoria :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="subcategoria" >
											<?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($items->id); ?>"> <?php echo e($items->nombre); ?> </option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>  
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="avatar">Imagen :</label>
									<div class="col-md-8 col-sm-8"> 
										<input class="form-control" accept="image/jpeg,image/png" type="file"  id="avatar_file" name="avatar_file">
									</div>
								</div>
							    <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="nombre">Nombre * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
								 
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="descripcion">descripcion * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>

								<!-- begin custom-checkbox -->
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="descripcion">Formatos * :</label>
									<div class="col-md-8 col-sm-8">
  										<?php if(count($formatos) > 0): ?> 
										  
											<?php $__currentLoopData = $formatos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="custom-control custom-radio">
													<input type="radio" id="nuevoFormato<?php echo e($items->id); ?>" name="nuevoFormato" value="<?php echo e($items->nombre); ?>" class="custom-control-input" >
													<label class="custom-control-label" for="nuevoFormato<?php echo e($items->id); ?>"><?php echo e($items->nombre); ?></label>
												</div>
											
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									</div>
								</div> 
								<!-- end custom-checkbox -->

                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="stock_minimo">Stock Minimo * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="stock_minimo" name="stock_minimo" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="codigo">Codigo * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="codigo" name="codigo" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="precio_mayor">Precio por mayor * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="precio_mayor" name="precio_mayor" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="precio_unitario">Precio Unitario * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="precio_unitario" name="precio_unitario" placeholder="Requerido" data-parsley-required="true" />
									</div>
								</div>
								
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cancelar</a>
									<button type="submit" class="btn btn-success">Guardar</button>
								</div>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>


	

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



<script>

  $(document).ready(function () {

	
		var table = $('#grid').DataTable();
		var data = table.row($(this).parents('tr')).data();
		getDataProductos();
	

  });

  	function getDataProductos(){

		var route = "<?php echo e(url('/cliente/administracion/DTproductos')); ?>";
		var idioma_espaniol = {
			"sProcessing" : "Procesando...",
			"sLengthMenu" : "Mostrar _MENU_ registros",
			"sZeroRecords" : "No se encuentran resultados",
			"sEmptyTable" : "Ningún dato disponible en esta tabla",
			"sInfo" : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty" : "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoPostFix" : "",
			"sSearch" : "Buscar: ",
			"sUrl" : "",
			"sInfoThousands" : ",",
			"sLoadingRecords" : "cargando...", 
			"oPaginate" : {
					"sFirts" : "Primero",
					"sLast" : "Último",
					"sNext" : "Siguiente",
					"sPrevious" : "Anterior"
			},
			"oAria" : {
					"sSortAscending" : ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending" : ": Activar para ordenar la columna de maneda descendente"
			}
		}


		$.ajaxSetup({
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		});

		$.ajax({
			type: 'get',
			url: route,
			dataType: 'json',
			success: function(data){
				
				if (data.length > 0)
				{
					 var result = [];
					 for (var i=0; i<data.length; i++){
						 var id = data[i].id;
						 var stockActual = "<?php echo e($stockFisico::stockActual(" + id + ")); ?>";
						 info = [
							"<a href='#' onclick='cambioEstado(this)' id='In' data-href='/cliente/administracion/productos/" + id + "/0/estado'> <span  class='btn btn-xs btn-white m-b-3'><i class='fa fa-trash t-plus-1 text-danger fa-fw fa-sm'></i></span></a>",
							"<a href='#' onclick='editar(" + id + ")'  data-toggle='modal' data-id='" + id + "' data-target='#modal-edit'> <span  class='btn btn-xs btn-white m-b-3'><i class='fas fa-sm fa-fw text-success fa-edit'></i></a></span>",
							"<a href='#' onclick='editar_stock(" + id + ")'  data-toggle='modal' data-id='" + id +"' data-target='#modal-lista_stock'> <span  class='btn btn-xs btn-white m-b-3'><i class='fas fa-sm fa-fw text-success fa-list-alt'></i></a></span>",
							 "<img src='/files/productos/'" + data[i].avatar +  " class='img-rounded height-30' />",
							data[i].nombre,
							data[i].codigo,
							data[i].formatoNombre,
							data[i].stock_minimo,
							stockActual,
							data[i].precio_por_mayor,
							data[i].precio_unitario,
							
						 ];
						result.push(info);
					 }

					 var table = $('#grid').DataTable({
						destroy:true,
						"language" : idioma_espaniol,
						dom: 'lBfrtip',
						"paging": true,
						"ordering" : true,
						"info": true,
						buttons: [
							{
								//Botón para Excel
								extend: 'excel',
								footer: true,
								title: 'Archivo',
								filename: 'Export_File',
								text: '<i class="fas fa-file-excel text-success"></i>'
							},
							//Botón para registro nuevo
							{
								footer: true,
								title: 'Nuevo Registro',
								text: '<a href="#modal-add"  data-toggle="modal"><i class="fa fa-plus-circle text-default"></i></a>'
							},
							//Botón para stock
							{
								footer: true,
								title: 'Stock',
								text: '<a href="#modal-stock"  data-toggle="modal"><i class="fas text-default fa-upload"></i></span></a>'
							}

						],
						
						"data" : result,
						columns: [
							{title: ""},
							{title: ""},
							{title: ""},
							{title: ""},
							{title: "Nombre"},
							{title: "Código"},
							{title: "Formato"},
							{title: "Stock Minimo"},
							{title: "Stock Físico"},
							{title: "Precio por mayor"},
							{title: "Precio unitario"}
							
						]
					 });
				} else {

					var result = [];
					

					 var table = $('#grid').DataTable({
						destroy:true,
						"language" : idioma_espaniol,
						dom: 'lBfrtip',
						"paging": true,
						"ordering" : true,
						"info": true,
						buttons: [
							
							//Botón para registro nuevo
							{
								footer: true,
								title: 'Nuevo Registro',
								text: '<a href="#modal-add"  data-toggle="modal"><i class="fa fa-plus-circle text-default"></i></a>'
							},
							//Botón para stock
							{
								footer: true,
								title: 'Stock',
								text: '<a href="#modal-stock"  data-toggle="modal"><i class="fas text-default fa-upload"></i></span></a>'
							}

						],
						
						"data" : result,
						columns: [
							{title: ""},
							{title: ""},
							{title: ""},
							{title: ""},
							{title: "Nombre"},
							{title: "Código"},
							{title: "Formato"},
							{title: "Stock Minimo"},
							{title: "Stock Físico"},
							{title: "Precio por mayor"},
							{title: "Precio unitario"}
							
						]
					 });
				}
			}
		});

	}

	function cambioEstado(id){
	var idSexo = id.getAttribute("data-href");
	var url = idSexo;

	swal({
		title: 'Está Seguro?',
		text: "con esta acción cambiara el estado del registro!",
		type: 'warning',
		buttons: {
			cancel: {
				text: 'Cancelar',
				value: null,
				visible: true,
				className: 'btn btn-default',
				closeModal: true,
			},
			confirm: {
				text: 'Aceptar',
				value: true,
				visible: true,
				className: 'btn btn-warning'
			}
		},
	}).then(function(isConfirm) {
		if (isConfirm) {
			window.location.href=url;
				} 
	})

	} 


$('#modal-add').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})	


var editar= function(id)
{
	
    var route = "<?php echo e(url('/cliente/administracion/productos')); ?>/"+id+"/edit";
	
    $.get(route, function(data){
		$("#id").val(data.id);
		$("#nombre").val(data.nombre);
		$("#descripcion").val(data.descripcion);
        $("#stock_minimo").val(data.stock_minimo);
        $("#codigo").val(data.codigo);
        $("#precio_mayor").val(data.precio_por_mayor);
        $("#precio_unitario").val(data.precio_unitario);

    });
}


var editar_stock= function(id)
{
    var route_stock = "<?php echo e(url('/cliente/administracion/productos')); ?>/"+id+"/edit_stock";
    $.get(route_stock, function(dataResult){

	   $("#fila").remove();
        for(var i = 0; i < dataResult.length; i++){
			
			$("#resultado").append('<tr id="fila">' + 
			'<td class="with-btn"> </td>'+
			'<td>' + dataResult[i].cantidad + '</td>'+
			'<td>' + dataResult[i].fecha + '</td>'+
			'<td>' + dataResult[i].usuario + '</td>'+'</tr>');
			console.log(dataResult[i].id);
			}


    });
}


$("#prodStock").change(function () {
	var id = $("#prodStock").val();
        $.ajax({
            url: "<?php echo e(url('/cliente/administracion/productos')); ?>/"+id+"/store_stock",
            type: 'get',
            dataType: 'json',
            success: function (rta) {
				$('#formatosStock').empty();
				
                $('#formatosStock').append("<option value='' disabled selected style='display:none;'>Seleccione un Producto</option>");
               
					for(var i = 0; i < rta.length; i++){
						
						$('#formatosStock').append("<option value='" + rta[i].id + "'>" + rta[i].nombre + "</option>");
					}
                
            }
        });
    });

</script>





<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jpabl\OneDrive\Escritorio\respaldo\store-sp-pro\produccion\resources\views/cliente/administracion/productos/index.blade.php ENDPATH**/ ?>