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
		<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Team</b> Store</a>
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
		<li class="navbar-form">
			<form action="" method="POST" name="search_form">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Buscador..." />
					<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</li>
		<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
				<i class="fa fa-bell"></i>
				<span class="label">5</span>
			</a>
			<div class="dropdown-menu media-list dropdown-menu-right">
				<div class="dropdown-header">Notificaciones (5)</div>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<i class="fa fa-bug media-object bg-silver-darker"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading">Reporte de Errores <i class="fa fa-exclamation-circle text-danger"></i></h6>
						<div class="text-muted f-s-10">3 minutos</div>
					</div>
				</a>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<img src="/imagenes/avatares/user/user-1.jpg" class="media-object" alt="" />
						<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading"> <?php echo e(Auth::user()->name); ?></h6>
						<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
						<div class="text-muted f-s-10">25 minutes ago</div>
					</div>
				</a>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<img src="/assets/img/user/user-2.jpg" class="media-object" alt="" />
						<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading">Olivia</h6>
						<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
						<div class="text-muted f-s-10">35 minutos</div>
					</div>
				</a>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<i class="fa fa-plus media-object bg-silver-darker"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading"> Nuevos usuarios registrados</h6>
						<div class="text-muted f-s-10">1 hora</div>
					</div>
				</a>
				<a href="javascript:;" class="dropdown-item media">
					<div class="media-left">
						<i class="fa fa-envelope media-object bg-silver-darker"></i>
						<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
					</div>
					<div class="media-body">
						<h6 class="media-heading"> Nuevo Email</h6>
						<div class="text-muted f-s-10">2 horas</div>
					</div>
				</a>
				<div class="dropdown-footer text-center">
					<a href="javascript:;">Ver más</a>
				</div>
			</div>
		</li>
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
				<img src="/imagenes/avatares/<?php echo e(session('avatar')); ?>" alt="" /> 
				<span class="d-none d-md-inline"> <?php echo e(Auth::user()->name); ?></span> <b class="caret"></b>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="javascript:;" class="dropdown-item">Editar Perfil</a>
				<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
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
<?php /**PATH /home2/cst62160/sistemas/desarrollo/resources/views/includes/header.blade.php ENDPATH**/ ?>