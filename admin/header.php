<?php session_start();
header("Content-Type: text/html;charset=utf-8");
if ($_SESSION['rol']!=1) {
	header('location: logout.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Jardineria admin DPWEB</title>
	<!-- Favicon-->


	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<!-- Bootstrap Core Css -->
	<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Waves Effect Css -->
	<link href="plugins/node-waves/waves.css" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="plugins/animate-css/animate.css" rel="stylesheet" />

	<!-- Morris Chart Css-->
	<link href="plugins/morrisjs/morris.css" rel="stylesheet" />

	<!-- Custom Css -->
	<link href="css/style.css" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="css/themes/all-themes.css" rel="stylesheet" />


	<!-- Jquery Core Js -->
	<script src="plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core Js -->
	<script src="plugins/bootstrap/js/bootstrap.js"></script>


	<!-- Slimscroll Plugin Js -->
	<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Waves Effect Plugin Js -->
	<script src="plugins/node-waves/waves.js"></script>

	<!-- Jquery CountTo Plugin Js -->
	<script src="plugins/jquery-countto/jquery.countTo.js"></script>

	<!-- Morris Plugin Js -->
	<script src="plugins/raphael/raphael.min.js"></script>
	<script src="plugins/morrisjs/morris.js"></script>

	<!-- ChartJs -->
	<script src="plugins/chartjs/Chart.bundle.js"></script>

	<!-- Flot Charts Plugin Js -->
	<script src="plugins/flot-charts/jquery.flot.js"></script>
	<script src="plugins/flot-charts/jquery.flot.resize.js"></script>
	<script src="plugins/flot-charts/jquery.flot.pie.js"></script>
	<script src="plugins/flot-charts/jquery.flot.categories.js"></script>
	<script src="plugins/flot-charts/jquery.flot.time.js"></script>

	<!-- Sparkline Chart Plugin Js -->
	<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>
</head>

<body class="theme-red">
	<!-- Page Loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Cargando datos...</p>
		</div>
	</div>
	<!-- #END# Page Loader -->
	<!-- Overlay For Sidebars -->
	<div class="overlay"></div>

	<!-- Top Bar -->
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
				<a href="javascript:void(0);" class="bars"></a>
				<a class="navbar-brand" href="index.php">Administración Jardineria - DWEB</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">



					<li class="pull-right"><a href="logout.php" class="js-right-sidebar" data-close="true">Salir</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- #Top Bar -->
	<section>
		<!-- Left Sidebar -->
		<aside id="leftsidebar" class="sidebar">
			<!-- User Info -->
			<div class="user-info">
				<div class="image">

					<img src="images/user.png" width="48" height="48" alt="User" />
				</div>
				<div class="info-container">
					<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['nombre']; ?></div>
					<div class="email"><?= $_SESSION['correo']; ?></div>
					<div class="btn-group user-helper-dropdown">
						<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
						<ul class="dropdown-menu pull-right">

							<li><a href="logout.php"><i class="material-icons">input</i>Salir</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- #User Info -->
			<!-- Menu -->
			<div class="menu">
				<ul class="list">
					<li class="header">Menú Principal</li>
					<li class="active">
						<a href="index.php">
							<i class="material-icons">home</i>
							<span>Inicio</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="menu-toggle">
							<i class="material-icons">perm_identity</i>
							<span>Usuarios</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a href="detalle_usuario.php">
									<span>Detalles</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" class="menu-toggle">
							<i class="material-icons">library_books</i>
							<span>Reportes</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a href="reporte_encuestas.php">
									<span>Encuestas</span>
								</a>
							</li>
							<li>
								<a href="reporte_productos.php">
									<span>Productos</span>
								</a>
							</li>
							<li>
								<a href="reporte_compras.php">
									<span>compras</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="esquemadb.php">
							<i class="material-icons">storage</i>
							<span>DiagramaDB</span>
						</a>
					</li>
					<li class="">
						<a href="contactos_detalle.php">
							<i class="material-icons">account_box</i>
							<span>Contactos</span>
						</a>
					</li>

					<li>
						<a href="javascript:void(0);" class="menu-toggle">
							<i class="material-icons">library_books</i>
							<span>Productos</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a href="agregar_productos.php">
									<span>Agregar</span>
								</a>
							</li>

						</ul>
					</li>


				</ul>
			</div>
			<!-- #Menu -->
			<!-- Footer -->
			<div class="legal">
				<div class="copyright">
					<?date('Y')?> 
				</div>
				<div class="version">
					<b>Version: </b> 1.0.0
				</div>
			</div>
			<!-- #Footer -->
		</aside>
		<!-- #END# Left Sidebar -->

	</section>

	<section class="content">