<style>
	.collapse a {
		text-indent: 10px;
	}

	nav#sidebar {
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
	hr{
		margin: 10px;
		margin-top: 5px;
		margin-bottom: 30px;
		background: #6c6b70bf;
	}
	h5{
		font-size: 14px;
		margin: 7px;
	}
</style>

<nav id="sidebar" class='mx-lt-5'>
	<div class="sidebar-list">
		<h5>Tus clientes</h5>
		<hr>
		<a href="index.php?page=students" class="nav-item nav-students"><span class='icon-field'><i class="fa fa-users "></i></span> Clientes</a>
		<br>
		<h5>Tus balances</h5>
		<hr>
		<a href="index.php?page=fees" class="nav-item nav-fees"><span class='icon-field'><i class="fa fa-money-check "></i></span> Balance de pagos</a>
		<a href="index.php?page=payments" class="nav-item nav-payments"><span class='icon-field'><i class="fa fa-receipt "></i></span> Pagos</a>
		<a href="index.php?page=payments_report" class="nav-item nav-payments_report"><span class='icon-field'><i class="fa fa-th-list"></i></span> Reportes de Pago</a>
		<br>
		<h5>Actividades</h5>
		<hr>
		<a href="index.php?page=courses" class="nav-item nav-courses"><span class='icon-field'><i class="fa fa-scroll "></i></span> Actividades</a>
		<h5>Usuarios</h5>
		<br>
		<hr>
		
		<?php if ($_SESSION['login_type'] == 1) : ?>
			<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users "></i></span> Usuarios</a> <?php endif; ?>
	</div>
</nav>

<script>
	$('.nav_collapse').click(function() {
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>