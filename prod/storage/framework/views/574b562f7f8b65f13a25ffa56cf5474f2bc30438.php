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

	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Mantenedores</a></li>
		<li class="breadcrumb-item active">Alumnos</li>
	</ol>
	<h1 class="page-header">Listado <small>Alumnos</small></h1>
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
					<table class="table table-striped">
					
						<div class="float-left">
							<a href="#modal-add"  data-toggle="modal">
								<span class="label label-inverse">Nuevo</span>
							</a>
						</div>
						<div class="btn-group float-right" >
							<button class="btn btn-white">PDF</button>
							<button class="btn btn-white">Excel</button>
							<button class="btn btn-white">Imprimir</button>
						</div>
						<thead>
							<tr>
								<th width="1%" > </th>
								<th width="1%" > ID</th>
								<th width="1%" > </th>
								<th class="text-nowrap">Estado</th>
								<th class="text-nowrap">Año Escolar</th>
								<th class="text-nowrap">Rut</th>
								<th class="text-nowrap">Nombre</th>
								<th class="text-nowrap">Edad</th>
								<th class="text-nowrap">Sexo</th>
								<th class="text-nowrap">Fecha de Nacimiento</th>
								<th class="text-nowrap">Dirección</th>
								
								<th class="text-nowrap"></th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $contenido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td class="with-btn" >
										<?php if($items->estado==1): ?>
										<a href="#" onclick="cambioEstado(this)" id="In" data-href="<?php echo e(route('alumnos.estado',[ $items->idAlumnos,0])); ?>"> <span  class="badge bg-danger">In</span></a>
										<?php else: ?>
										<a href="#" onclick="cambioEstado(this)" id="In" data-href="<?php echo e(route('alumnos.estado',[ $items->idAlumnos ,1])); ?>"> <span class="badge bg-success">Ac</span></a>
										<?php endif; ?>
									</td>
									<td> <a href="#" onclick="editar(<?php echo e($items->idAlumnos); ?>)"  data-toggle="modal" data-id="<?php echo e($items->idAlumnos); ?>" data-target="#modal-edit"> <?php echo e($items->idAlumnos); ?></a></td>
									<td width="1%" class="with-img"><img src="/7/alumnos/<?php echo e($item-> avatar); ?>" class="img-rounded height-30" /></td>
									<td>
										<?php if($items->estado==1): ?>
										<span class="badge bg-success">Activo</span>
										<?php else: ?>
										<span class="badge bg-danger">Inactivo</span>
										<?php endif; ?>
									</td>
									<td><?php echo e($items->agno); ?></td>
									<td><?php echo e($items->rut); ?></td>
									<td><?php echo e($items->nombre); ?></td>
									<td><?php echo e($items->edad); ?></td>
									<td><?php echo e($items->sexo_nombre); ?></td>
									<td><?php echo e($items->fecha_nacimiento); ?></td>
									<td><?php echo e($items->direccion); ?></td>
									<td></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar registro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('alumnos.update')); ?>" class="form-horizontal" data-parsley-validate="true">
							<?php echo csrf_field(); ?>
							 <input type="hidden" id="id" name="id">
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="nombre">Nombre * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="nombre" name="nombre"  data-parsley-required="true" />
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
					<h5 class="modal-title">Nuevo Alumno</h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<p>
						<form method="POST" action="<?php echo e(route('alumnos.store')); ?>" class="form-horizontal" data-parsley-validate="true" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="rut">Rut * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="rut" name="rut" placeholder="Ingrese Rut" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="nombre">Nombre Completo * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre Completo" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-4 col-form-label">Fecha de Nacimiento *:</label>
									<div class="col-lg-8">
										<input type="text" class="form-control" id="datepicker-autoClose" placeholder="Seleccione Fecha" data-parsley-required="true" name="fecha_nacimiento" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="nombre">Edad * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="edad" name="edad" data-parsley-type="number" placeholder="Ingrese edad" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-4 col-form-label">Sexo *:</label>
									<div class="col-lg-8">
										<select class="combobox" id="sexo" name="sexo">
											<?php $__currentLoopData = $sexo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sexos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sexos->id); ?>"><?php echo e($sexos->nombre); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="direccion">Dirección * :</label>
									<div class="col-md-8 col-sm-8">
										<textarea class="form-control" id="direccion" name="direccion" rows="3"  placeholder="Ingrese direción"  data-parsley-required="true"></textarea>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="agno">Año Escolar * :</label>
									<div class="col-lg-8">
										<select class="combobox" id="agno" name="agno">
											<?php $__currentLoopData = $agno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agnos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($agnos->id); ?>"><?php echo e($agnos->agno); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="file">Fotografía * :</label>
									<span class="btn btn-primary fileinput-button m-r-3">
										<i class="fa fa-fw fa-plus"></i>
										<input accept="image/*" type="file"  id="avatar" name="avatar">
									</span>
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

	<script src="/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js"></script>
	<script src="/assets/plugins/moment/min/moment.min.js"></script>
	<script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script src="/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
	<script src="/assets/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<script src="/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
	<script src="/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="/assets/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js"></script>
	<script src="/assets/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js"></script>
	<script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/assets/plugins/tag-it/js/tag-it.min.js"></script>
	<script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="/assets/plugins/select2/dist/js/select2.min.js"></script>
	<script src="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script src="/assets/plugins/bootstrap-show-password/dist/bootstrap-show-password.js"></script>
	<script src="/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
	<script src="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
	<script src="/assets/plugins/clipboard/dist/clipboard.min.js"></script>
	<script src="/assets/js/demo/form-plugins.demo.js"></script>


<script>
	function cambioEstado(id){
	var idAlumno = id.getAttribute("data-href");
	var url = idAlumno;

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
    var route = "<?php echo e(url('/alumnos')); ?>/"+id+"/edit";
    $.get(route, function(data){
		$("#id").val(data.id);
		$("#nombre").val(data.nombre);
    });
}

</script>



<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TeamGarden\resources\views/alumnos/index.blade.php ENDPATH**/ ?>