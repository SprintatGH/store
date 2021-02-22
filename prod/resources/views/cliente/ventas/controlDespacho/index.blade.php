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
						<li class="breadcrumb-item"><a href="javascript:;">Ventas</a></li>
						<li class="breadcrumb-item active">Control Despacho</li>
					</ol>
					<h1 class="page-header">Listado <small>Control Despacho</small></h1>
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
												  	<th> </th>
													<th> </th>
													<th> </th>
													<th> </th>
													<th> ID</th> 
                                                    <th class="text-nowrap">Fecha</th>
                                                    <th class="text-nowrap">Cliente</th>
													<th class="text-nowrap">Cantidad</th>
                                                    <th class="text-nowrap" align="center">Total</th>
													<th class="text-nowrap">Estado de pago</th>
                                                    
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

	@endif
   
	
	<div class="modal fade" id="modal-log">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Log Despacho</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<table class="table table-striped">

							<thead> 
								<tr>
									<th>Fecha</th>
									<th>Usuario</th>
									<th>Detalle</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($contenido as $items)
									<tr>
										
										<td class="with-btn" >
											@if ($items->estado==1)
											<a href="#" onclick="cambioEstado(this)" id="In" data-href="{{route('CA_control_despacho.estado',[ $items->id ,0])  }}"> <span  class="btn btn-sm btn-white m-b-10"><i class="fa fa-trash t-plus-1 text-success fa-fw fa-lg"></i></span></a>
											<a href="#modal-log"  data-toggle="modal" ><span class="btn btn-sm btn-white m-b-10" ><i class="fa fa-indent t-plus-1 text-success fa-fw fa-lg" ></i></span></a>
											<a href="{{ route('CA_control_despacho.detalle',$items->id) }}" ><span class="btn btn-sm btn-white m-b-10" ><i class="fa fa-address-card t-plus-1 text-success fa-fw fa-lg" ></i></span></a>
											<a href="{{ route('CA_control_despacho.vista_previa',$items->id) }}" ><span class="btn btn-sm btn-white m-b-10" ><i class="fa fa-eye t-plus-1 text-success fa-fw fa-lg" ></i></span></a>
											@else
											<a href="#" onclick="cambioEstado(this)" id="In" data-href="{{route('CA_control_despacho.estado',[ $items->id ,1])  }}"> <span class="badge bg-success">Ac</span></a>
											@endif
										</td>
										<td> <a href="#" onclick="editar({{$items->id}})"  data-toggle="modal" data-id="{{$items->id}}" data-target="#modal-edit"> {{$items->id}}</a></td>
										<td>{{ $items->nombre_estado }}</td>
										<td>{{ $items->fecha }}</td>
										<td>{{ $items->nombre_cliente }}</td>
										<td>{{ $items->valor_despacho }} </td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</p>
				</div>
			</div>
		</div>
	</div>







	<div class="modal fade" id="modal-mail">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Mail</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
					<form method="POST" action="{{ route('CA_control_despacho.mail',1) }}" class="form-horizontal" data-parsley-validate="true">
							@csrf
							 <input type="hidden" id="id_mail" name="id_mail">
							 	
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="cliente">Destinatarios :</label>
									<div class="col-md-8 col-sm-8">
										
										@foreach ($destinatarios as $items)
											<input type="checkbox" name="mail_desti[]" value="{{ $items->email}}"> {{ $items->nombre }} <br>
										@endforeach
										
									</div>
								</div>
                                
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="cliente">Opciones :</label>
									<div class="col-md-8 col-sm-8">
										
										<input type="checkbox" name="mail_cliente" value="1"> Enviar copia a cliente <br>
										<input type="checkbox" name="recibir-copia" value="1"> Recibir una copia
										
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






	<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar Despacho</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="{{ route('CA_control_despacho.update') }}" class="form-horizontal" data-parsley-validate="true">
							@csrf
							 <input type="hidden" id="edit_id" name="edit_id">
							 	
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="cliente">Clientes :</label>
									<div class="col-md-8 col-sm-8">
											<input class="form-control" type="text" id="edit_cliente" name="edit_cliente"  readonly /> 
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="estado">Estado :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="estado" >
											@foreach ($estados as $items)
												<option id="est_{{ $items->id }}" value="{{ $items->id }}"> {{$items->nombre}} </option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="descripcion">Descripción :</label>
									<div class="col-md-8 col-sm-8">
                                        <textarea class="form-control" rows="3" id="edit_descripcion" name="edit_descripcion"></textarea>
									</div>
								</div>
								
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="valor_despacho">Valor despacho * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="edit_valor_despacho" name="edit_valor_despacho"  data-parsley-required="true" />
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
					<h4 class="modal-title">Nuevo Despacho</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="{{ route('CA_control_despacho.store') }}" class="form-horizontal" data-parsley-validate="true">
							@csrf
							
							    <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="estado">Estado :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="estado" >
											@foreach ($estados as $items)
												<option value="{{ $items->id }}"> {{$items->nombre}} </option>
											@endforeach
										</select>
									</div>
								</div>

								 <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="cliente">Cliente :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="cliente" >
											@foreach ($clientes as $items)
												<option value="{{ $items->id }}"> {{$items->Nombre}} </option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="descripcion">Descripción :</label>
									<div class="col-md-8 col-sm-8">
                                        <textarea class="form-control" rows="3"  id="descripcion" name="descripcion"></textarea>
										
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="valor_despacho">Valor despacho * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="valor_despacho" name="valor_despacho"  data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="valor_despacho">Es Venta * :</label>
									<div class="col-md-8 col-sm-8">
										<div class="custom-control custom-radio mb-1">
											<input type="radio" id="es_venta1" name="es_venta" class="custom-control-input" checked value="1">
											<label class="custom-control-label" for="es_venta1">Si</label>
										</div>
										<div class="custom-control custom-radio mb-1">
											<input type="radio" id="es_venta2" name="es_venta" class="custom-control-input" value="0">
											<label class="custom-control-label" for="es_venta2">No</label>
											
										</div>
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


$(document).ready(function () {

	
var table = $('#grid').DataTable();
var data = table.row($(this).parents('tr')).data();
getDataProductos();


});

function getDataProductos(){

var route = "{{ url('/cliente/ventas/DTcontrolDespacho') }}";
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
		console.log(data);
		if (data.data.length > 0)
		{
			 var result = [];
			 for (var i=0; i<data.data.length; i++){

					if (data.data[i].estado == data.CONTROL_DESPACHO_ABIERTO) {
						var estado = "<a title='Eliminar Venta' href='#' onclick='cambioEstado(this)' id='In' data-href='/cliente/ventas/controlDespacho/" + data.data[i].id + "/0/estado' > <span  class='btn btn-xs btn-white m-b-3'><i class='fa fa-trash t-plus-1 text-success fa-fw fa-lg'></i></span></a>";
					} else  {
						var estado = "<a title='Venta Cerrada - Deshabilitado opción Eliminar' href='#'> <span  class='btn btn-xs btn-white m-b-3'><i class='fa fa-trash t-plus-1 text-alert fa-fw fa-lg'></i></span></a>";
					} 

					if (data.data[i].estadoDesp == data.CONTROL_DESPACHO_ESTADO_PAGADO){
						var estadoDespacho = data.data[i].nombre_estado 
					} else {
						var estadoDespacho = "<span  class='text alert-danger fade show'>" + data.data[i].nombre_estado + "</span>"
					}

				 info = [
					estado,
					"<a title='Detalle de la Venta' href='/cliente/ventas/controlDespacho/" + data.data[i].id + "/detalle' ><span class='btn btn-xs btn-white m-b-2'><i class='fa fa-address-card t-plus-1 text-success fa-fw fa-lg'></i></span></a>",
                    "<a title='Vista Previa - formato PDF' href='/cliente/ventas/controlDespacho/" + data.data[i].id + "/vista_previa'><span class='btn btn-xs btn-white m-b-2'><i class='fa fa-eye t-plus-1 text-success fa-fw fa-lg'></i></span></a>",
					"<a title='Enviar por Email' href='/cliente/ventas/controlDespacho/" + data.data[i].id +  "/mail'><span class='btn btn-xs btn-white m-b-2'><i class='fa fa-envelope-square t-plus-1 text-success fa-fw fa-lg'></i></span></a>",
					"<a title='Editar Venta' href='#' onclick='editar(" + data.data[i].id + ")'  data-toggle='modal' data-id='" + data.data[i].id + "' data-target='#modal-edit'>" + data.data[i].id + "</a>",
					
					data.data[i].fecha,
					data.data[i].nombre_cliente,
					data.data[i].cantidad,
					data.data[i].total,
					estadoDespacho,
					
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
				"pageLength": 100,
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
					}
				],
				
				"data" : result,
				columns: [
					{title: ""},
					{title: ""},
					{title: ""},
					{title: ""},
					{title: "Id"},
					{title: "Fecha"},
					{title: "Cliente"},
					{title: "Cantidad"},
					{title: "Total"},
					{title: "Estado de pago"}
					
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
					}
				],
				
				"data" : result,
				columns: [
					{title: ""},
					{title: ""},
					{title: ""},
					{title: ""},
					{title: "Id"},
					{title: "Fecha"},
					{title: "Cliente"},
					{title: "Cantidad"},
					{title: "Total"},
					{title: "Estado de pago"}
					
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
    var route = "{{url('/cliente/ventas/controlDespacho')}}/"+id+"/edit";
	console.log(route);
    $.get(route, function(content){
		console.log(content);
		$("#edit_id").val(content.id); 
		$("#edit_cliente").val(content.nombre_cliente);
		$("#edit_descripcion").val(content.descripcion);
        $("#edit_valor_despacho").val(content.valor_despacho);
		document.getElementById("est_"+ content.estadoDesp).selected = "true";
		
    });
}

var enviar_mail= function(id)
{

		$("#id_mail").val(id);
	
}

</script>



@endpush