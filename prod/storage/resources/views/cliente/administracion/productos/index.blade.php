  @extends('layouts.default')

@section('title', 'Sprintat')

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

   @if ($action == "listado") 

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
									<div class="panel-heading-btn">
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
									</div>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped">
										
											<div class="float-left">
												<a href="#modal-add"  data-toggle="modal">
													<span class="btn btn-sm btn-white m-b-10"><i class="fa fa-plus-circle t-plus-1 text-success fa-fw fa-lg"  ></i></span>
												</a>
												<a href="#modal-stock"  data-toggle="modal" >
													<span class="btn btn-sm btn-white m-b-10"><i class="fas fa-lg fa-fw t-plus-1 text-success fa-upload"></i></span>
												</a> 
												
											</div>
											<div class="btn-group float-right" >
												<button class="btn btn-white">PDF</button>
												<button class="btn btn-white">Excel</button>
												<button class="btn btn-white">Imprimir</button>
											</div>
											<thead> 
												<tr>
													<th > </th>
													<th > </th>
													<th class="text-nowrap">Nombre</th>
													<th class="text-nowrap">Código</th>
													<th class="text-nowrap">Formato</th>
                                                    <th class="text-nowrap">Stock Minimo</th>
                                                    <th class="text-nowrap">Stock Físico</th>
                                                    <th class="text-nowrap">Precio por mayor</th>
                                                    <th class="text-nowrap">Precio unitario</th>
                                                    <th class="text-nowrap">Subcategoria</th>
                                                    <th class="text-nowrap">Categoria</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($contenido as $items)
													<tr>
													 	
													<td style="width:180px" >
															@if ($items->estado==1)
															<a href="#" onclick="cambioEstado(this)" id="In" data-href="{{route('CA_productos.estado',[ $items->id ,0])  }}"> <span  class="btn btn-xs btn-white m-b-3"><i class="fa fa-trash t-plus-1 text-danger fa-fw fa-sm"></i></span></a>
															@else
															<a href="#" onclick="cambioEstado(this)" id="In" data-href="{{route('CA_productos.estado',[ $items->id ,1])  }}"> <span class="badge bg-success">Ac</span></a>
															@endif
														
														    <a href="#" onclick="editar({{$items->id}})"  data-toggle="modal" data-id="{{$items->id}}" data-target="#modal-edit"> <span  class="btn btn-xs btn-white m-b-3"><i class="fas fa-sm fa-fw text-success fa-edit"></i></a></span> 
															<a href="#" onclick="editar_stock({{$items->id}})"  data-toggle="modal" data-id="{{$items->id}}" data-target="#modal-lista_stock"> <span  class="btn btn-xs btn-white m-b-3"><i class="fas fa-sm fa-fw text-success fa-list-alt"></i></a></span> 
														</td>
														@if (isset($items->avatar))
															<td class="with-img"><img src="/files/productos/{{ $items->avatar }}" class="img-rounded height-30"  /></td>
														@else
															<td class="with-img"><img src="/files/productos/sin_imagen.png" class="img-rounded height-30" /></td>
														@endif
														<td>{{ $items->nombre }}</td>
														<td>{{ $items->codigo }}</td>
														<td>{{ $items->formatoNombre }}</td>
														<td>{{ $items->stock_minimo }}</td>
                                                        <td>{{ $items->stock_actual }}</td>
                                                        <td>{{ $items->precio_por_mayor }}</td>
                                                        <td>{{ $items->precio_unitario }}</td>
                                                        <td>{{ $items->nombre_subcategoria }}</td>
                                                        <td>{{ $items->nombre_categoria }}</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

	@endif
   
	


	<div class="modal fade" id="modal-stock">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Agregar stock</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="{{ route('CA_productos.store_stock') }}" class="form-horizontal" data-parsley-validate="true">
							@csrf
							
							    <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Producto :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="prodStock" id="prodStock" >
											<option value="0" selected> Seleccione... </option>
											@foreach ($productoStock as $items)
												<option value="{{ $items->id }}"> {{$items->nombre}} </option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Formato :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="formatosStock" id="formatosStock">
											
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
						<form method="POST" action="{{ route('CA_productos.update') }}" class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data">
							@csrf
							 <input type="hidden" id="id" name="id">
							 	
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Subcategoria :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="subcategoria" >
											@foreach ($subcategorias as $items)
												<option value="{{ $items->id }}"> {{$items->nombre}} </option>
											@endforeach
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
						<form method="POST" action="{{ route('CA_productos.store') }}" class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data">
							@csrf
							@method('POST')
							    <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="tipo_cliente">Subcategoria :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="subcategoria" >
											@foreach ($subcategorias as $items)
												<option value="{{ $items->id }}"> {{$items->nombre}} </option>
											@endforeach
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
  										@if (count($formatos) > 0) 
										  
											@foreach ($formatos as $items)
												<div class="custom-control custom-radio">
													<input type="radio" id="nuevoFormato{{ $items->id }}" name="nuevoFormato" class="custom-control-input" >
													<label class="custom-control-label" for="nuevoFormato{{ $items->id }}">{{ $items->valor}}</label>
												</div>
											p
											@endforeach
										@endif
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



<script>
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
	
    var route = "{{url('/cliente/administracion/productos')}}/"+id+"/edit";
	
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
    var route_stock = "{{url('/cliente/administracion/productos')}}/"+id+"/edit_stock";
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
            url: "{{url('/cliente/administracion/productos')}}/"+id+"/store_stock",
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





@endpush