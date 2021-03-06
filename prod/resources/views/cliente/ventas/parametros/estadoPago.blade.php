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



    <ol class="breadcrumb float-xl-right">

        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>

        <li class="breadcrumb-item"><a href="javascript:;">Ventas</a></li>

        <li class="breadcrumb-item active">Control Despacho</li>

    </ol>

    <h1 class="page-header">Listado <small>Estados de Pago - Control Despacho</small></h1>

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

                                    <th> ID</th> 

                                    <th class="text-nowrap">Nombre</th>

                                    <th class="text-nowrap">Fecha Creado</th>

                                    <th class="text-nowrap">Creado Por</th>
                                    

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




   


	<div class="modal fade" id="modal-edit">

	<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">

					<h4 class="modal-title">Editar Estado</h4>

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

				</div>

				<div class="modal-body">

					<p>

						<form method="POST" action="{{ route('CA_EstadoPago.update') }}" class="form-horizontal" data-parsley-validate="true">

							@csrf

							 <input type="hidden" id="edit_id" name="edit_id">

							 	

                                <div class="form-group row m-b-15">

									<label class="col-md-4 col-sm-4 col-form-label" for="edit_nombre">Nombre :</label>

									<div class="col-md-8 col-sm-8">

											<input class="form-control" type="text" id="edit_nombre" name="edit_nombre"  data-parsley-validate="true" /> 

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

					<h4 class="modal-title">Nuevo Estado Pago</h4>

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

				</div>

				<div class="modal-body">

					<p>

						<form method="POST" action="{{ route('CA_EstadoPago.store') }}" class="form-horizontal" data-parsley-validate="true">

							@csrf


								<div class="form-group row m-b-15">

									<label class="col-md-4 col-sm-4 col-form-label" for="nombre">Nombre* :</label>

									<div class="col-md-8 col-sm-8">

										<input class="form-control" type="text" id="nombre" name="nombre" data-parsley-required="true"/> 

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

    var route = "{{ url('/cliente/ventas/parametros/DTestadoPago') }}";

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


    $.ajaxSetup({ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  });


    $.ajax({

        type: 'get',

        url: route,

        dataType: 'json',

        success: function(data){

            console.log(data);

            if (data.length > 0)

            {

                var result = [];

                for (var i=0; i<data.length; i++){


                    info = [
						"<a href='#' onclick='cambioEstado(this)' id='In' data-href='/cliente/ventas/parametros/estadoPago/" + data[i].id + "/0/estado'> <span  class='btn btn-xs btn-white m-b-3'><i class='fa fa-trash t-plus-1 text-success fa-fw fa-lg'></i></span></a>",

						"<a title='Editar Venta' href='#' onclick='editar(" + data[i].id + ")'  data-toggle='modal' data-id='" + data[i].id + "' data-target='#modal-edit'>" + data[i].id + "</a>",

                        data[i].nombre,

                        data[i].created_at,

                        data[i].name_user

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

                        {title: "Id"},

                        {title: "nombre"},

                        {title: "fecha"},

                        {title: "usuario"}


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

                        {title: "Id"},

                        {title: "nombre"},

                        {title: "fecha"},

                        {title: "usuario"}

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

    var route = "{{url('/cliente/ventas/parametros/estadoPago')}}/"+id+"/edit";

	console.log(route);

    $.get(route, function(content){

		console.log(content);

		$("#edit_id").val(content.id); 

		$("#edit_nombre").val(content.nombre);
		
    });

}


</script>


@endpush