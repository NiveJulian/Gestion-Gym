<style>
	.collapse a {
		text-indent: 10px;
	}

	nav#sidebar {
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
	hr{
		margin: 5px;
		margin-top: 5px;
		margin-bottom: 15px;
		background: #6c6b70bf;
		align-items: center;
	}
	h5{
		color: #c2f2f2;
		font-size: 14px;
		margin: 7px;
		text-align: center;
	}
	
	.sidebar-brand {
	height: 4.375rem;
	color: #fff;
	text-decoration: none;
	font-size: 1rem;
	font-weight: 800;
	padding: 1.5rem 1rem;
	text-align: center;
	text-transform: uppercase;
	letter-spacing: 0.05rem;
	z-index: 1;
	}

	.sidebar-brand .sidebar-brand-icon i {
	font-size: 2rem;
	}

	
</style>

<nav id="sidebar" class='mx-lt-5'>
	<div class="sidebar-list">
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=students">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">GYM Admin <sup>2</sup></div>
            </a>
		<hr>
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
		<br>
	</div>
</nav>

<script>
	$('.nav_collapse').click(function() {
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>