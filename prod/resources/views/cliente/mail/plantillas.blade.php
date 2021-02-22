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
						<li class="breadcrumb-item"><a href="javascript:;">Mail</a></li>
						<li class="breadcrumb-item active">Plantillas</li>
					</ol>
					<h1 class="page-header">Parámetros <small>Plantillas</small></h1>
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
											</div>
											
											<div class="btn-group float-right" >
												<button class="btn btn-white">PDF</button>
												<button class="btn btn-white">Excel</button>
												<button class="btn btn-white">Imprimir</button>
											</div>
											<thead> 
												<tr>
													<th> </th>
													<th>ID </th>
                                                    <th class="text-nowrap">Módulo</th>
                                                    <th class="text-nowrap">detalle</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($contenido as $items)
													<tr>
													 	
														<td class="with-btn" >
															@if ($items->estado==1)
																<a href="#" onclick="cambioEstado(this)" id="In" data-href="{{route('CA_control_despacho.estado',[ $items->id ,0])  }} "> <span  class="btn btn-xs btn-white m-b-3"><i class="fa fa-trash t-plus-1 text-success fa-fw fa-lg"></i></span></a>
                                                            @else 
																<a href="#" onclick="cambioEstado(this)" id="In" data-href="{{route('CA_control_despacho.estado',[ $items->id ,1])  }}"> <span class="badge bg-success">Ac</span></a>
															@endif
																</td>
														<td> <a href="#" onclick="editar({{$items->id}})"  data-toggle="modal" data-id="{{$items->id}}" data-target="#modal-edit"> {{$items->id}}</a></td>
                                                        <td>{{ $items->nombre }}</td>
                                                        <td>{{ $items->detalle }}</td>
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
   



	<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar Plantilla</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="{{ route('CA_mail_desti.update') }}" class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data">
							@csrf
							 <input type="hidden" id="id" name="id">
							 	
							 <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="edit_modulo">Módulo:</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="edit_modulo" name="edit_modulo"  data-parsley-required="true" />
									</div>
								</div>

                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="edit_detalle">Detalle:</label>
									<div class="col-md-8 col-sm-8">
                                        <textarea class="form-control" rows="3" data-parsley-required="true" id="edit_detalle" name="edit_detalle"></textarea>
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
					<h4 class="modal-title">Nueva Plantilla</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="{{ route('CA_mail_plan.store') }}" class="form-horizontal" data-parsley-validate="true">
							@csrf
							
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="modulo">Módulo:</label>
									<div class="col-md-8 col-sm-8">
                                        <select class="form-control" name="modulo" >
											@foreach ($modulos as $items)
												<option value="{{ $items->id }}"> {{$items->nombre}} </option>
											@endforeach
										</select>
									</div>
								</div>

                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Detalle:</label>
									<div class="col-md-8 col-sm-8">
                                        <textarea class="form-control" rows="3" data-parsley-required="true" id="detalle" name="detalle"></textarea>	
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

	<script>
	var editar= function(id)
		{
			
			var route = "{{url('/email/destinatarios')}}/"+id+"/edit";
			
			$.get(route, function(data){
				$("#id").val(data.id);
				$("#edit_nombre").val(data.nombre);
				$("#edit_email").val(data.email);
			});
		}
	</script>

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