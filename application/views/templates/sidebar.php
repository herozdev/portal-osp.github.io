    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    	<!-- Sidebar - Brand -->
    	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
    		<div class="sidebar-brand-text mx-3">Portal<sup>OSP</sup></div>
    	</a>

    	<!-- Divider -->
    	<hr class="sidebar-divider">
    	<!--QueryMenu-->
    	<?php
    	$role_id = $this->session->userdata('role_id');
    	$query = "SELECT a.id, menu FROM user_menu as a JOIN user_access_menu as b ON a.id = b.menu_id WHERE b.role_id = $role_id ORDER BY a.menu_order ASC";

    	$menu = $this->db->query($query)->result_array();

    	?>

    	<!-- Heading -->
    	<?php foreach ($menu as $m) :?>
    		<div class="sidebar-heading">
    			<?= $m['menu']; ?>
    		</div>

    		<?php
    		$menuId = $m['id'];
    		$querysubmenu = "SELECT * FROM user_sub_menu as a JOIN user_menu as b ON a.menu_id = b.id WHERE b.id = $menuId AND a.is_active = 1";

    		$submenu = $this->db->query($querysubmenu)->result_array();
    		?>

    		<?php foreach ($submenu as $sub) : ?>
    			<!-- Nav Item - Dashboard -->
    			<?php if ($title == $sub['title']): ?>
    				<li class="nav-item active">
    					<?php else : ?>
    						<li class="nav-item">
    						<?php endif; ?>
    						<a class="nav-link pb-0" href="<?= base_url($sub['url']); ?>">
    							<i class="<?= $sub['icon']; ?>"></i>
    							<span><?= $sub['title']; ?></span></a>
    						</li>
    					<?php endforeach; ?>
    					<!-- Divider -->
    					<hr class="sidebar-divider mt-3 d-none d-md-block">

    				<?php endforeach; ?>

    				<!-- Sidebar Toggler (Sidebar) -->
    				<div class="text-center d-none d-md-inline">
    					<button class="rounded-circle border-0" id="sidebarToggle"></button>
    				</div>

    			</ul>
    			<!-- End of Sidebar -->
