  

<?php $__env->startSection('title', 'Managed Tables - Extension Combination'); ?>

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

<?php $__env->startSection('content'); ?>

   <?php if($action == "listado"): ?> 

				    <ol class="breadcrumb float-xl-right">
						<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="javascript:;">Ventas</a></li>
						<li class="breadcrumb-item active">Cotizaciones</li>
					</ol>
					<h1 class="page-header">Detalle <small>Cotización</small></h1>


					<div class="row">
						<div class="col-xl-12">
							<div class="panel panel-inverse">
								<div class="panel-heading">
									<h4 class="panel-title">Cotizaciòn / Productos</h4>
                                     <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                    </div>
								</div>
                               
								<div class="panel-body">
									
                                    <div class="row row-space-30">
                                        <div class="col-xl-4">
                                            <div class="m-b-2 text-inverse f-w-600 f-s-16">Cliente</div>
                                            <p class="m-b-10"> <code><?php echo e($encabezado->nombre_cliente); ?></code> </p>   
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="m-b-2 text-inverse f-w-600 f-s-16">Estado</div>
                                            <p class="m-b-10"> <code><?php echo e($encabezado->nombre_estado); ?></code> </p>   
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="m-b-2 text-inverse f-w-600 f-s-16">Nota</div>
                                            <p class="m-b-10"> <code><?php echo e($encabezado->descripcion); ?></code>  </p>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
										<table class="table table-striped">
										
											<div class="float-left">
												<a href="#modal-add"  data-toggle="modal">
													<span class="label label-inverse"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
												</a>
											</div>
											
											<thead> 
												<tr>
													<th > </th>
													<th > ID</th>
													<th class="text-nowrap">Producto</th>
                                                    <th class="text-nowrap">Cantidad</th>
                                                    <th class="text-nowrap">Precio</th>
                                                    <th class="text-nowrap">Total</th>
												</tr>
											</thead>
											<tbody>
												<?php $__currentLoopData = $contenido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
													 	
														<td class="with-btn" >
															<?php if($items->estado==1): ?>
															<a href="#" onclick="cambioEstado(this)" id="In" data-href="<?php echo e(route('CA_ventas_cotizaciones.estado_detalle',[ $items->id ,0])); ?>"> <span  class="badge bg-danger">In</span></a>
															<?php else: ?>
															<a href="#" onclick="cambioEstado(this)" id="In" data-href="<?php echo e(route('CA_ventas_cotizaciones.estado_detalle',[ $items->id ,1])); ?>"> <span class="badge bg-success">Ac</span></a>
															<?php endif; ?>
														</td>
														<td> <a href="#" onclick="editar(<?php echo e($items->id); ?>)"  data-toggle="modal" data-id="<?php echo e($items->id); ?>" data-target="#modal-edit"> <?php echo e($items->id); ?></a></td>
														<td><?php echo e($items->nombre_producto); ?></td>
                                                        <td><?php echo e($items->cantidad); ?></td>
														<td><?php echo e($items->precio); ?></td>
                                                        <td><?php echo e($items->cantidad * $items->precio); ?> </td>
                                                        
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

	<?php endif; ?>
   
	

	<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Editar cotización</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('CA_ventas_cotizaciones.update')); ?>" class="form-horizontal" data-parsley-validate="true">
							<?php echo csrf_field(); ?>
							 <input type="hidden" id="id" name="id">
							 	
                               <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="productos">Productos :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="productos" >
											<?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($items->id); ?>"> <?php echo e($items->Nombre); ?> </option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="Cantidad">Cantidad * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="cantidad" name="cantidad"  data-parsley-required="true" />
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
					<h4 class="modal-title">Agregar Producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('CA_ventas_cotizaciones.store_detalle')); ?>" class="form-horizontal" data-parsley-validate="true">
							<?php echo csrf_field(); ?>
							
							    <input type="hidden" id="id_cotizacion" name="id_cotizacion" value="<?php echo e($encabezado->id); ?>">

								 <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="productos">Productos :</label>
									<div class="col-md-8 col-sm-8">
										<select class="form-control" name="productos" id="productos" on>
                                            <option value="0" selected> Selecciona... </option>
											<?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($items->id); ?>"> <?php echo e($items->nombre); ?> </option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
                                    </div>
								</div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-4 col-sm-4 col-form-label" for="Cantidad">Precio Unitario:</label>
                                    <div class="col-md-8 col-sm-8">
                                        <input type="text" name="in_precio_unitario" id="in_precio_unitario" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-4 col-sm-4 col-form-label" for="Cantidad">Precio por mayor:</label>
                                    <div class="col-md-8 col-sm-8">
                                        <input type="text" name="in_precio_por_mayor" id="in_precio_por_mayor" class="form-control" readonly>
                                    </div>
                                </div>

								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="Cantidad">Cantidad * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="cantidad" name="cantidad"  data-parsley-required="true" />
									</div>
								</div>

                                <div class="form-group row m-b-15">
                                    <label class="col-md-4 col-sm-4 col-form-label">Precio</label>
                                        <div class="col-md-8 col-sm-8">
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" id="customRadio1" name="in_precio" class="custom-control-input" checked value="1">
                                                <label class="custom-control-label" for="customRadio1">Unitario</label>
                                            </div>
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" id="customRadio2" name="in_precio" class="custom-control-input" value="2">
                                                <label class="custom-control-label" for="customRadio2">Mayorista</label>
                                                
                                            </div>
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" id="customRadio3" name="in_precio" class="custom-control-input" value="3">
                                                <label class="custom-control-label" for="customRadio3">Especial</label>
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" id="in_precio_especial" name="in_precio_especial"  />
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

</script>

<script type="text/javascript">
    $('#productos').change(function() {
       
        var cod=this.value;
        var route = "<?php echo e(url('/cliente/ventas/cotizaciones')); ?>/"+cod+"/precios";
        $.get(route, function(data){
            
            $("#in_precio_unitario").val(data.precio_unitario);
            $("#in_precio_por_mayor").val(data.precio_por_mayor);
           
        });
    });
</script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/cst62160/sistemas/desarrollo/resources/views/cliente/ventas/cotizaciones/detalle.blade.php ENDPATH**/ ?>