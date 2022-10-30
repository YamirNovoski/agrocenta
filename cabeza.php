<?php session_start();

header("Content-Type: text/html;charset=utf-8");
if (isset($_SESSION['usuario'])) {
    include 'head_users.php';
}else{?>



<?php if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AGROCENTA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
    
    <link rel="stylesheet" href="assets/css/style.css"><link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    

    <!-- JS here -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/sweetalert2.all.min.js"></script>
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">

                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="index.php"><img src="assets/img/logo/logon.png" alt="" style="width: 235px;"></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                        <ul id="navigation">                          
                                            <li><a href="index.php">Inicio</a></li>
                                            <li><a href="productos.php">Productos</a></li>
                                            <li><a href="contact.php">Contacto</a></li>
                                            <!--li><a href="encuesta.php">Encuesta</a></li-->
                                            <!--li><a href="#">Otros</a>
                                                <ul class="submenu">
                                                     <li><a href="oldproyect/historia.html">Historia del sitio</a> </li>
                                                     <li><a href="oldproyect/plataformas.html">Plataformas Web</a> </li>
                                                     <li><a href="oldproyect/maquetacion.html">Maquetación Web</a> </li>
                                                     <li><a href="oldproyect/servidores.html">Servidores Web</a> </li>
                                                     <li><a href="oldproyect/internet.html">Internet de las cosas</a> </li>
                                                     <li><a href="oldproyect/info.html">Informacion del grupo</a> </li>
                                                     <li><a href="oldproyect/glosario.html">Glosario</a> </li> 
                                                </ul>
                                            </li-->
                                        </ul>
                                    </nav>
                                </div> 
                            </div> 
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li >
                                        <!--a href="login.php" onclick="s();"><img src="img\C.png" height="70" width="180"></a-->
                                        <div style="margin-top: 12px;">
                                            <a href="login.php" onclick="s();" class="btn-sm btn-success">Comprar <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                        </div> 
                                    </li>
                                    <li>
                                        <div style="margin-top: 12px;">
                                            <a href="login.php" class="btn-sm btn-primary">Login</a>
                                        </div> 
                                    </li>
                                    <li> 
                                        <div style="margin-top: 12px;">
                                            <a href="registro.php" class="btn-sm btn-secondary">Registrate</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script type="text/javascript">
        function s(){
            alert('Debe iniciar sesión para poder comprar');
        }
    </script>
    <!-- Header End -->
<main>
<?php } ?>