<?php
	$sidebarClass = (!empty($sidebarTransparent)) ? 'sidebar-transparent' : '';
?>
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar <?php echo e($sidebarClass); ?>">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<?php if(!$sidebarSearch): ?>
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="image">
						<img src="/imagenes/logos/<?php echo e(session('logo')); ?>" alt="" />
					</div>
					<div class="info">
						<b class="caret pull-right"></b>
						<?php echo e(session('empresa')); ?>

						<small>Administrador</small>
					</div>
				</a>
			</li>
			<li>
				<ul class="nav nav-profile">
					<li><a href="javascript:;"><i class="fa fa-cog"></i> Configuraciones</a></li>
					<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Notificaciones</a></li>
					<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Ayuda</a></li>
				</ul>
			</li>
		</ul>
		<!-- end sidebar user -->
		<?php endif; ?>
		<!-- begin sidebar nav -->
		<ul class="nav">
			<?php if($sidebarSearch): ?>
			<li class="nav-search">
        <input type="text" class="form-control" placeholder="Sidebar menu filter..." data-sidebar-search="true" />
			</li>
			<?php endif; ?>
			<li class="nav-header">Menu Opciones</li>
			<?php
				$currentUrl = (Request::path() != '/') ? '/'. Request::path() : '/';
				
				function renderSubMenu($value, $currentUrl) {
					$subMenu = '';
					$GLOBALS['sub_level'] += 1 ;
					$GLOBALS['active'][$GLOBALS['sub_level']] = '';
					$currentLevel = $GLOBALS['sub_level'];
					foreach ($value as $key => $menu) {
						$GLOBALS['subparent_level'] = '';
						
						$subSubMenu = '';
						$hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
						$hasCaret = (!empty($menu['sub_menu'])) ? '<b class="caret pull-right"></b>' : '';
						$hasTitle = (!empty($menu['title'])) ? $menu['title'] : '';
						$hasHighlight = (!empty($menu['highlight'])) ? '<i class="fa fa-paper-plane text-theme m-l-5"></i>' : '';
						
						if (!empty($menu['sub_menu'])) {
							$subSubMenu .= '<ul class="sub-menu">';
							$subSubMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
							$subSubMenu .= '</ul>';
						}
						
						$active = ($currentUrl == $menu['url']) ? 'active' : '';
						
						if ($active) {
							$GLOBALS['parent_active'] = true;
							$GLOBALS['active'][$GLOBALS['sub_level'] - 1] = true;
						}
						if (!empty($GLOBALS['active'][$currentLevel])) {
							$active = 'active';
						}
						$subMenu .= '
							<li class="'. $hasSub .' '. $active .'">
								<a href="'. $menu['url'] .'">'. $hasCaret . $hasTitle . $hasHighlight .'</a>
								'. $subSubMenu .'
							</li>
						';
					}
					return $subMenu;
				}
			
				
				if (auth()->user()->perfil_id == 7){
					$contenido_menu = config('sidebar.menu_administrador');
				} else if (auth()->user()->perfil_id == 8){
					$contenido_menu = config('sidebar.menu_clienteAdmin');
				} else {
					$contenido_menu = config('sidebar.menu');
				}

				
			
				
				foreach ($contenido_menu as $key => $menu) {
					$GLOBALS['parent_active'] = '';
					
					$hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
					$hasCaret = (!empty($menu['caret'])) ? '<b class="caret"></b>' : '';
					$hasIcon = (!empty($menu['icon'])) ? '<i class="'. $menu['icon'] .'"></i>' : '';
					$hasImg = (!empty($menu['img'])) ? '<div class="icon-img"><img src="'. $menu['img'] .'" /></div>' : '';
					$hasLabel = (!empty($menu['label'])) ? '<span class="label label-theme m-l-5">'. $menu['label'] .'</span>' : '';
					$hasTitle = (!empty($menu['title'])) ? '<span>'. $menu['title'] . $hasLabel .'</span>' : '';
					$hasBadge = (!empty($menu['badge'])) ? '<span class="badge pull-right">'. $menu['badge'] .'</span>' : '';
					
					$subMenu = '';
					
					if (!empty($menu['sub_menu'])) {
						$GLOBALS['sub_level'] = 0;
						$subMenu .= '<ul class="sub-menu">';
						$subMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
						$subMenu .= '</ul>';
					}
					$active = ($currentUrl == $menu['url']) ? 'active' : '';
					$active = (empty($active) && !empty($GLOBALS['parent_active'])) ? 'active' : $active;
					echo '
						<li class="'. $hasSub .' '. $active .'">
							<a href="'. $menu['url'] .'">
								'. $hasImg .'
								'. $hasBadge .'
								'. $hasCaret .'
								'. $hasIcon .'
								'. $hasTitle .'
							</a>
							'. $subMenu .'
						</li>
					';
				}
			?>
			<!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			<!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->

<?php /**PATH C:\xampp\htdocs\store-sftp-local\sistemas\desarrollo\resources\views/includes/sidebar.blade.php ENDPATH**/ ?>