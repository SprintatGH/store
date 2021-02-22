<?php
	$headerClass = (!empty($headerInverse)) ? 'navbar-inverse ' : 'navbar-default ';
	$headerMenu = (!empty($headerMenu)) ? $headerMenu : '';
	$headerMegaMenu = (!empty($headerMegaMenu)) ? $headerMegaMenu : ''; 
	$headerTopMenu = (!empty($headerTopMenu)) ? $headerTopMenu : '';
?>
<!-- begin #header -->
<div id="header" class="header <?php echo e($headerClass); ?>">
	<!-- begin navbar-header -->
	<div class="navbar-header">
		<?php if($sidebarTwo): ?>
		<button type="button" class="navbar-toggle pull-left" data-click="right-sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php endif; ?>
		<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Team</b> Store</a> <?php echo e(session('version')); ?>

		
		<?php if($headerMegaMenu): ?>
			<button type="button" class="navbar-toggle pt-0 pb-0 mr-0" data-toggle="collapse" data-target="#top-navbar">
				<span class="fa-stack fa-lg text-inverse">
					<i class="far fa-square fa-stack-2x"></i>
					<i class="fa fa-cog fa-stack-1x"></i>
				</span>
			</button>
		<?php endif; ?>
		<?php if(!$sidebarHide && $topMenu): ?>
			<button type="button" class="navbar-toggle pt-0 pb-0 mr-0 collapsed" data-click="top-menu-toggled">
				<span class="fa-stack fa-lg text-inverse">
					<i class="far fa-square fa-stack-2x"></i>
					<i class="fa fa-cog fa-stack-1x"></i>
				</span>
			</button>
		<?php endif; ?>
		<?php if(!$sidebarHide && !$headerTopMenu): ?>
		<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php endif; ?>
		<?php if($headerTopMenu): ?>
			<button type="button" class="navbar-toggle" data-click="top-menu-toggled">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		<?php endif; ?>
	</div>
	<!-- end navbar-header -->
	
	<?php echo $__env->renderWhen($headerMegaMenu, 'includes.header-mega-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
	
	<!-- begin header-nav -->
	<ul class="navbar-nav navbar-right">
		<?php if(session('sucursal')!= App\Constants\Cliente::SUCURSAL_BASE): ?>
			<li class="navbar-form">
				<div class="navbar-nav navbar-right">
					<div class="col-md-12 col-sm-12">
						<select class="form-control" name="sucursal" onchange="getDataComuna(this);" >
							<?php $__currentLoopData = session('sucursales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($items->id); ?>" 
								<?php echo e(( $items->id == session('sucursal')) ? 'selected' : ''); ?>> <?php echo e($items->nombre); ?> </option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select> 
					</div>
				</div>
			</li>
		<?php endif; ?>
		<!-- <li class="navbar-form">
			<form action="" method="POST" name="search_form">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Buscador..." />
					<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</li> -->
		
		<?php if(isset($headerLanguageBar)): ?>
		<li class="dropdown navbar-language">
			<a href="#" class="dropdown-toggle pr-1 pl-1 pr-sm-3 pl-sm-3" data-toggle="dropdown">
				<span class="flag-icon flag-icon-us" title="us"></span>
				<span class="name d-none d-sm-inline">EN</span> <b class="caret"></b>
			</a>
			<div class="dropdown-menu">
				<a href="javascript:;" class="dropdown-item"><span class="flag-icon flag-icon-us" title="us"></span> Inglés</a>
				<a href="javascript:;" class="dropdown-item"><span class="flag-icon flag-icon-cn" title="cn"></span> Chino</a>
				<a href="javascript:;" class="dropdown-item"><span class="flag-icon flag-icon-jp" title="jp"></span> Japonés</a>
				<a href="javascript:;" class="dropdown-item"><span class="flag-icon flag-icon-be" title="be"></span> Aleman</a>
				<div class="dropdown-divider"></div>
				<a href="javascript:;" class="dropdown-item text-center">mas opciones</a>
			</div>
		</li>
		<?php endif; ?>
		<li class="dropdown navbar-user">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img src="<?php echo e(asset('/files/empresas/usuarios/sin_imagen.png')); ?>" alt="" />  
				<span class="d-none d-md-inline"> <?php echo e(Auth::user()->name); ?></span> <b class="caret"></b>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="javascript:;" class="dropdown-item">Editar Perfil</a>
				<a href="javascript:;" class="dropdown-item">Calendario</a>
				<a href="javascript:;" class="dropdown-item">Configuación</a>
				<div class="dropdown-divider"></div>
				<a  href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      Cerrar Sesión</a>
					  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                      </form>
			</div>
		</li>
		<?php if($sidebarTwo): ?>
		<li class="divider d-none d-md-block"></li>
		<li class="d-none d-md-block">
			<a href="javascript:;" data-click="right-sidebar-toggled" class="f-s-14">
				<i class="fa fa-th"></i>
			</a>
		</li>
		<?php endif; ?>
	</ul>
	<!-- end header navigation right -->
</div>
<!-- end #header -->

<script>

function getDataComuna(id)
{

  var route = "<?php echo e(url('/cliente/sucursal/')); ?>/"+id.value+"/cambiar"; 
  var opcion = confirm("Estas seguro de cambiar Sucursal?");
  if (opcion == true) {
	document.location.href=route;
  }
    
}

</script>
<?php /**PATH /home2/cst62160/sistemas/produccion/resources/views/includes/header.blade.php ENDPATH**/ ?>