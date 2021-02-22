  @extends('layouts.default')

@section('title', 'Managed Tables - Extension Combination')

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
                <li class="breadcrumb-item active">Cotizaciones</li>
            </ol>

			<h1 class="page-header">Nueva <small>Cotizaciones</small></h1>
			
			<form action="/" method="POST" name="form-wizard" class="form-control-with-bg">
				<!-- begin wizard -->
				<div id="wizard">
					
					<ul>
						<li>
							<a href="#step-1">
								<span class="number">1</span> 
								<span class="info">
									Encabezado
									<small>Cliente, Estado</small>
								</span>
							</a>
						</li>
						<li>
							<a href="#step-2">
								<span class="number">2</span> 
								<span class="info">
									Productos
									<small>Ingrese los productos</small>
								</span>
							</a>
						</li>
						<li>
							<a href="#step-3">
								<span class="number">3</span>
								<span class="info">
									Vista previa
									<small>Vista antes de enviar a cliente</small>
								</span>
							</a>
						</li>
						
					</ul>
					
					<div>
						<div id="step-1">
							<fieldset>
								<div class="row">
									<div class="col-xl-8 offset-xl-2">
										<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Información de Cliente</legend>
										<div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Estado <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control" name="estado" data-parsley-required="true" >
                                                    @foreach ($estados as $items)
                                                        <option value="{{ $items->id }}"> {{$items->nombre}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
										</div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Cliente <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control" name="cliente" >
                                                    @foreach ($clientes as $items)
                                                        <option value="{{ $items->id }}"> {{$items->Nombre}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
										</div>
                                        <div class="form-group row m-b-10">
										    <label class="col-lg-3 text-lg-right col-form-label">Descripción <span class="text-danger">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" name="descripcion" placeholder="Descripcion de la cotizacion" class="form-control m-b-10" />
                                            </div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>


						<!-- end step-1 -->
						<!-- begin step-2 -->
						<div id="step-2">
							<!-- begin fieldset -->
							<fieldset>
								<!-- begin row -->
								<div class="row">
									<!-- begin col-8 -->
									<div class="col-xl-8 offset-xl-2">
										<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">You contact info, so that we can easily reach you</legend>
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-lg-3 text-lg-right col-form-label">Phone Number <span class="text-danger">*</span></label>
											<div class="col-lg-9 col-xl-6">
												<input type="number" name="phone" placeholder="123-456-7890" data-parsley-group="step-2" data-parsley-required="true" data-parsley-type="number" class="form-control" />
											</div>
										</div>
										<!-- end form-group -->
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-lg-3 text-lg-right col-form-label">Email Address <span class="text-danger">*</span></label>
											<div class="col-lg-9 col-xl-6">
												<input type="email" name="email" placeholder="someone@example.com" class="form-control" data-parsley-group="step-2" data-parsley-required="true" data-parsley-type="email" />
											</div>
										</div>
										<!-- end form-group -->
									</div>
									<!-- end col-8 -->
								</div>
								<!-- end row -->
							</fieldset>
							<!-- end fieldset -->
						</div>
						<!-- end step-2 -->
						<!-- begin step-3 -->
						<div id="step-3">
							<!-- begin fieldset -->
							<fieldset>
								<!-- begin row -->
								<div class="row">
									<!-- begin col-8 -->
									<div class="col-xl-8 offset-xl-2">
										<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Select your login username and password</legend>
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-lg-3 text-lg-right col-form-label">Username <span class="text-danger">*</span></label>
											<div class="col-lg-9 col-xl-6">
												<input type="text" name="username" placeholder="johnsmithy" class="form-control" data-parsley-group="step-3" data-parsley-required="true" data-parsley-type="alphanum" />
											</div>
										</div>
										<!-- end form-group -->
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-lg-3 text-lg-right col-form-label">Pasword <span class="text-danger">*</span></label>
											<div class="col-lg-9 col-xl-6">
												<input type="password" name="password" placeholder="Your password" class="form-control" data-parsley-group="step-3" data-parsley-required="true" />
											</div>
										</div>
										<!-- end form-group -->
										<!-- begin form-group -->
										<div class="form-group row m-b-10">
											<label class="col-lg-3 text-lg-right col-form-label">Confirm Pasword <span class="text-danger">*</span></label>
											<div class="col-lg-9 col-xl-6">
												<input type="password" name="password2" placeholder="Confirmed password" class="form-control" data-parsley-group="step-3" data-parsley-required="true" />
											</div>
										</div>
										<!-- end form-group -->
									</div>
									<!-- end col-8 -->
								</div>
								<!-- end row -->
							</fieldset>
							<!-- end fieldset -->
						</div>
						<!-- end step-3 -->
						<!-- begin step-4 -->
						<div id="step-4">
							<div class="jumbotron m-b-0 text-center">
								<h2 class="display-4">Register Successfully</h2>
								<p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. <br />Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
								<p><a href="javascript:;" class="btn btn-primary btn-lg">Proceed to User Profile</a></p>
							</div>
						</div>
						<!-- end step-4 -->
					</div>
					<!-- end wizard-content -->
				</div>
				<!-- end wizard -->
			</form>
			<!-- end wizard-form -->

	@endif

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
    <script src="/assets/plugins/parsleyjs/dist/parsley.js"></script>
	<script src="/assets/plugins/smartwizard/dist/js/jquery.smartWizard.js"></script>
	<script src="/assets/js/demo/form-wizards-validation.demo.js"></script>


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

</script>



@endpush