<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Jardineria DPWEB </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="manifest" href="site.webmanifest">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/slicknav.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/sweetalert2.min.css">
	<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
	<script src="./assets/js/sweetalert2.all.min.js"></script>
	<style>
		body{
			background-color: hsla(89, 100%, 50%, 0.1);
		}
	</style>
</head>

<body>

	<a href="index.php" class="btn-sm btn-primary float-right" title="">Regresar</a>
	<div class="container">
		<div class="row align-items-center">

			<div class="col-lg-6 ofset offset-md-3" style="text-align: center;">
				<div class="login_part_form">
					<div class="login_part_form_iner">
						<h1>JARDINERIA DPWEB</h1><br>
						<br>
						<img src="https://static.vecteezy.com/system/resources/previews/000/585/414/non_2x/vector-leaf-green-nature-logo-and-symbol-template.jpg" style="width: 250px;" alt="">
						<br>
						<h3>Inicio de sesión <br>
						Ingresa tus datos</h3>
						<form id="formulario" class="row contact_form" action="#" method="post" >
							<div class="col-md-12 form-group p_star">
								<input required="" type="text" class="form-control" id="usuario" name="usuario" value="" placeholder="Usuario">
							</div>
							<div class="col-md-12 form-group p_star">
								<input required="" type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account d-flex align-items-center">
									<input type="checkbox" id="f-option" name="selector">
									<label for="f-option">Recuerdame</label>
								</div>
								<button type="submit" value="submit" class="btn-sm btn-primary">
									Iniciar sesión
								</button>
								<br />
								<a class="lost_pass" style="color: blue;" href="#">Olvide mi password</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>

		$('#formulario').submit(function(event) {
			event.preventDefault();


			$.ajax({
				url: 'peticiones.php',
				type: 'POST',
				dataType: 'json',
				data: {login_peticion: 'asdGsdf/678&/(fbrtyYH$%Efgsdg$', usuario:$('#usuario').val(), password:$('#password').val(),},
		
			})

			/*$sdf546*/
			.done(function(data) {
				if (data.exito==1) {
					let timerInterval
					Swal.fire({
						
						title: 'Bienvenido '+data.nombre,
						html: 'Entrando siendo redirigido',
						timer: 2000,
						timerProgressBar: true,
						onBeforeOpen: () => {
							Swal.showLoading()
							timerInterval = setInterval(() => {
								const content = Swal.getContent()
								if (content) {
									const b = content.querySelector('b')
									if (b) {
										b.textContent = Swal.getTimerLeft()
									}
								}
							}, 100)
						},
						onClose: () => {
							clearInterval(timerInterval)
						}
					}).then((result) => {
						/* Read more about handling dismissals below */
						if (result.dismiss === Swal.DismissReason.timer) {
							location.href = data.redireccion;
						}
					})

				}else{
					Swal.fire(
						'Mensaje',
						data.mensaje,
						'question'
						);
				}
				
			})
			.fail(function() {
				Swal.fire({
					icon: 'error',
					title: 'Problemas',
					text: 'No se pudo realizar la petición',
					footer: 'Verifique la conexion a datos'
				});
			})
			.always(function() {
				console.log("complete");
			});



		});


	</script>


	<!-- JS here -->

	<!-- All JS Custom Plugins Link Here here -->
	<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
	<!-- Jquery, Popper, Bootstrap -->
	<script src="./assets/js/popper.min.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<!-- Jquery Mobile Menu -->
	<script src="./assets/js/jquery.slicknav.min.js"></script>

	<!-- Jquery Slick , Owl-Carousel Plugins -->
	<script src="./assets/js/owl.carousel.min.js"></script>
	<script src="./assets/js/slick.min.js"></script>

	<!-- One Page, Animated-HeadLin -->
	<script src="./assets/js/wow.min.js"></script>
	<script src="./assets/js/animated.headline.js"></script>
	<script src="./assets/js/jquery.magnific-popup.js"></script>

	<!-- Scrollup, nice-select, sticky -->
	<script src="./assets/js/jquery.scrollUp.min.js"></script>
	<script src="./assets/js/jquery.nice-select.min.js"></script>
	<script src="./assets/js/jquery.sticky.js"></script>

	<!-- contact js -->
	<script src="./assets/js/contact.js"></script>
	<script src="./assets/js/jquery.form.js"></script>
	<script src="./assets/js/jquery.validate.min.js"></script>
	<script src="./assets/js/mail-script.js"></script>
	<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

	<!-- Jquery Plugins, main Jquery -->	
	<script src="./assets/js/plugins.js"></script>
	<script src="./assets/js/main.js"></script>

</body>
</html>