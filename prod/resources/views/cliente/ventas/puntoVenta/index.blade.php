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


            <!-- begin row -->
            <div class="row">
				<!-- begin col-12 -->
				<div class="col-12">
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="form-stuff-12">
						<!-- begin panel-heading -->
						<div class="panel-heading">
                            <h3 class="panel-title">N° de Transacción : {{$idPV}}</h3>
   
                            <input type="hidden" id="idPV" name="idPV" value="{{$idPV}}" >
							<div class="panel-heading-btn">
                                <a href="#" id = "btn_actualizarPV" onClick="" > <span class="btn btn-sm btn-white m-b-10"><i class="fa fa-sync t-plus-1 text-success fa-fw fa-sm"  ></i></span></a>
								<a href="#" id = "btn_guardarPV" onClick="guardarPV(this)"> <span class="btn btn-sm btn-white m-b-10"><i class="fa fa-save t-plus-1 text-success fa-fw fa-sm"  ></i></span></a>
                                <a href="{{ route('CA_ventas_puntoVenta.index') }}" id = "btn_cancelarPV" > <span class="btn btn-sm btn-white m-b-10"><i class="fa fa-plus-circle t-plus-1 text-success fa-fw fa-sm"  ></i></span></a>
                                <a href="#" id = "btn_imprimirPV" onClick=""> <span class="btn btn-sm btn-white m-b-10"><i class="fa fa-print t-plus-1 text-success fa-fw fa-sm"  ></i></span></a>
							</div>
						</div>
                        
						<div class="panel-body">
                            
                            <div class="row row-space-10 m-b-20">
                                
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-barcode"></i></div>
                                            <input type="text" class="form-control producto" name="codigoPro" id="codigoPro" autocomplete="off" onchange="validarProducto(this);">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="#modal-add"  data-toggle="modal"> <span class="btn btn-sm btn-white m-b-10"><i class="fa fa-search-plus t-plus-1 text-success fa-fw fa-lg"></i></span></a>
                                    </div>  
                                    <div class="col-sm-4">
                                        <div class="alert alert-secondary fade show" id="estadoPro"></div>  
                                    </div> 

                                    <div class="col-sm-3">
                                        <div class="alert alert-success fade show" id="totalPro"></div>  
                                    </div> 
                            </div> 

						</div>


                        <div class="panel-body">
							<!-- begin table-responsive -->
							<div class="table-responsive">
								<table id="tableProductos" class="table table-striped table-th-valign-middle table-td-valign-middle m-b-0">
									<thead>
										<tr>
                                            <th></th>
											<th>Código</th>
											<th>Producto</th>
											<th>Cantidad</th>
                                            <th>Tipo Precio</th>
                                            <th>Precio</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
							<!-- end table-responsive -->
						</div>
						<!-- end panel-body --> 
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-6 -->
			</div>
			<!-- end row -->

			
					

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


<script>

        function validarProducto(id)
        {
            var idPV = $("#idPV").val();
            var route =("{{url('/cliente/ventas/puntoVenta')}}/"+idPV+"/"+id.value+"/validaProducto");
          
            $.get(route, function(data){

                if (data.respuesta === 'ok') {
                    
                    insertarProducto(id);
                    actualizarTotal();

                } else  {
                    document.getElementById('estadoPro').innerHTML = data.respuesta;

                    $('#codigoPro').val('');
                    $('#codigoPro').focus();
                }
            });  
        }




        function actualizarTotal()
        {
            var idPV = $("#idPV").val();
            var route =("{{url('/cliente/ventas/puntoVenta')}}/"+idPV+"/obtenerTotal");
    
            $.get(route, function(data){
              
                document.getElementById('totalPro').innerHTML = 'TOTAL: ' + data.total;
                    
            });  
        }





        function insertarProducto(id)	
        {
            var idPV = $("#idPV").val();
            var route =("{{url('/cliente/ventas/puntoVenta')}}/"+idPV+"/"+id.value+"/insertaProducto");
    
            $.get(route, function(data){
                
                if (data.lenght === 0) {
                   
                    document.getElementById('estadoPro').innerHTML = 'Producto NO encontrado';
 
                    $('#codigoPro').val('');
                    $('#codigoPro').focus();

                } else  {

                $("#tableProductos tr").remove(); 
				$("#tableProductos").append('<tr><th></th>'+
				'<td>Código</td>' + 
				'<td>Producto</td>' + 
                '<td>Cantidad</td>' + 
                '<td>Tipo Precio</td>' + 
				'<td>Precio</td></tr>');

				for (i = 0; i < data.length; i++){
					
					$("#tableProductos").append('<tr>' + 
                        '<td> <a href="#" onclick="eliminarPro('+data[i].id+')"><span  class="btn btn-sm btn-white m-b-10"><i class="fa fa-trash t-plus-1 text-success fa-fw fa-sm"></i></span></a></td>'+
                        '<td style="dislay: none;">'+data[i].codigo+'</td>'+
                        '<td style="dislay: none;">'+data[i].nomproducto+'</td>'+
                        '<td class="with-form-control" ><input type="number" class="form-control" value="'+data[i].cantidad+'"/></td>'+
                        '<td > <select class="form-control" name="estado" >   <option value="1"> selecione </option>  </select>  </td>'+
                        '<td style="dislay: none;">'+data[i].precio+'</td></tr>');
				}
                   document.getElementById('estadoPro').innerHTML = 'Producto agregado con EXITO';
                   $('#codigoPro').val('');
                   $('#codigoPro').focus();
                }
            });
        }



        function guardarPV()
        {
            var idPV = $("#idPV").val();
            var route =("{{url('/cliente/ventas/puntoVenta')}}/"+idPV+"/guardarPV");
           
            $.get(route, function(data){ 
                if (data.respuesta === 'ok')
                {
                    document.getElementById('estadoPro').innerHTML = 'Venta guardada con EXITO'; 
                    actualizarTotal();
                } else {
                    document.getElementById('estadoPro').innerHTML = 'No se guardó Venta, verifique';
                } 
            });    
        }


        function limpiarPV()
        {
            var route =("{{url('/cliente/ventas/puntoVenta/crearPV')}}");
            $.get(route, function(data){ 
                if (data.respuesta === 'ok')
                {
                   // $("#idPV").val() = data.id;
                    $("#tableProductos tr").remove(); 
                }
            });
        }




        function eliminarPro(id)
        {
            var idPV = $("#idPV").val();
            var route =("{{url('/cliente/ventas/puntoVenta')}}/"+idPV+"/"+id+"/eliminarPro");
            
            $.get(route, function(data){
                
                if (data.lenght === 0) {
                   
                    document.getElementById('estadoPro').innerHTML = 'Producto NO Eliminado';
 
                    $('#codigoPro').val('');
                    $('#codigoPro').focus();

                } else  {

                    $("#tableProductos tr").remove(); 
                    $("#tableProductos").append('<tr><th></th>'+
                    '<td>Código</td>' + 
                    '<td>Producto</td>' + 
                    '<td>Cantidad</td>' + 
                    '<td>Tipo Precio</td>' + 
                    '<td>Precio</td></tr>');

                    for (i = 0; i < data.length; i++){
                        
                        $("#tableProductos").append('<tr>' + 
                            '<td> <a href="#" onclick="eliminarPro('+data[i].id+')"> <span  class="btn btn-sm btn-white m-b-10"><i class="fa fa-trash t-plus-1 text-success fa-fw fa-sm"></i></span></a></td>'+
                            '<td style="dislay: none;">'+data[i].codigo+'</td>'+
                            '<td style="dislay: none;">'+data[i].nomproducto+'</td>'+
                            '<td class="with-form-control" ><input type="number" class="form-control" value="'+data[i].cantidad+'"/></td>'+
                            '<td > <select class="form-control" name="estado" >   <option value="1"> selecione </option>  </select>  </td>'+
                            '<td style="dislay: none;">'+data[i].precio+'</td></tr>');
                    }
                    
                    document.getElementById('estadoPro').innerHTML = 'Producto Eliminado con EXITO';
                    actualizarTotal();

                    $('#codigoPro').val('');
                    $('#codigoPro').focus();
                }
            });


        }



</script>


@endpush