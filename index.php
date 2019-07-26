<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="resources/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Galvanic Therapy</title>
  </head>
  <body>
    <!-- Header -->
    <header class="container">
      <nav class="navbar navbar-expand-lg">
        <!-- Logo -->
        <a class="navbar-brand mx-lg-auto" href="index.php">
          <img src="img/brand/logo.png" class="logo" alt="Logo"/>
        </a>
        <!-- Header SM -->
        <ul class="nav">
          <li class="nav-item d-flex align-items-center">
            <!-- Buscar -->
            <div class="d-lg-none">
              <img src="img/icons/search.svg" class="icon-sm" alt="Buscar"/>
            </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <!-- Carrito de compras -->
            <a class="cart d-lg-none" href="cart.php">
              <img src="img/icons/cart.svg" class="icon-sm" alt="Carrito"/>
            </a>
          </li>
          <li class="nav-item">
            <!-- Boton de menu -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_trg">
              <img src="img/icons/menu.svg" class="icon-sm" alt="Menú"/>
            </button>
          </li>
        </ul>
      </nav>
    </header>
    <!-- Elementos de menú SM -->
    <nav class="navbar container navbar-expand-lg">
      <div class="collapse navbar-collapse" id="collapse_trg">
        <!-- Buscar -->
        <div class="search-bar d-none d-lg-block">
          <input id="searchInput" class="search-input" type="text" placeholder="Buscar...">
          <a href="#" id="searchIcon" class="search-icon">
            <img src="img/icons/search.svg" alt="Buscar"/>
          </a>
        </div>
        <?php 
if(isset($_SESSION['email'])){
  ?>
  <!-- Secciones -->
  <ul class="navbar-nav sections-secundary mx-lg-auto">
          <li class="nav-item active">
            <a class="nav-link bg-link" href="index.php">Inicio</a>
          </li>
          <!-- Dropdown de Productos -->
          <li class="nav-item dropdown">
            <a class="nav-link bg-link" data-toggle="dropdown" href="#">Productos</a>
            <div class="dropdown-menu">
              <h4 class="dropdown-header">Categorias</h4>
              <a id="1"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 1;?>">Cuidado corporal</a>
              <a id="2"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 2;?>">Cuidado facial</a>
              <a id="3"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 3;?>">Suplementos Alimenticios</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-link" href="tendencias.php">Tendencias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-link" href="nuevo.php">Lo nuevo</a>
          </li>
        </ul>
        <!-- Carrito de compras lg -->
        <a class="cart d-none d-lg-block" href="cart.php">
        <span><?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);  ?></span>  
          <img src="img/icons/cart.svg" height="16px" alt="Cart"/>
        </a>
        <!-- Perfil LG -->
        <div class="dropdown d-none d-lg-block">
          <a href="" data-toggle="dropdown" style="text-decoration: none;">
            <img src="img/icons/user.png" width="32px" height="32px" alt="Perfil">
            <img src="img/icons/arrow.svg" height="14px" alt="Flecha">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item bg-link" href="admin-productos.html">Gestionar</a>
            <a class="dropdown-item bg-link" href="cerrar.php">Cerrar sesión</a>
          </div>
        </div>
        <!-- Perfil SM --> 
        <ul class="navbar-nav sections mx-lg-auto d-lg-none">
          <li class="nav-item">
            <div class="dropdown-divider"></div>
            <a class="nav-link bg-link" data-toggle="dropdown" href="">Perfil</a>
            <div class="dropdown-menu">
              <a class="dropdown-item bg-link" href="admin-productos.html">Gestionar</a>
              <a class="dropdown-item bg-link" href="cerrar.php">Cerrar sesión</a>
            </div>
          </li>
        </ul>
      <?php
        }else{

          ?><!-- Secciones -->
        <ul class="navbar-nav sections mx-lg-auto">
          <li class="nav-item active">
            <a class="nav-link bg-link" href="index.php">Inicio</a>
          </li>
          <!-- Dropdown de Productos -->
          <li class="nav-item dropdown">
            <a class="nav-link bg-link" data-toggle="dropdown" href="#">Productos</a>
            <div class="dropdown-menu">
              <h4 class="dropdown-header">Categorias</h4>
              <a id="1"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 1;?>">Cuidado corporal</a>
              <a id="2"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 2;?>">Cuidado facial</a>
              <a id="3"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 3;?>">Suplementos Alimenticios</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-link" href="tendencias.php">Tendencias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-link" href="nuevo.php">Lo nuevo</a>
          </li>
        </ul>
        <!-- Carrito de compras lg -->
        <a class="cart d-none d-lg-block" href="cart.php">
          <img src="img/icons/cart.svg" height="16px" alt="Cart"/>
        </a>
  <!-- Boton de log-in LG -->
  <div class="d-none d-lg-block">
          <a class="btn btn-dark" href="login.php" role="button">Iniciar sesión</a>
        </div>
        <!-- Boton de log-in SM -->
        <ul class="navbar-nav sections mx-lg-auto d-lg-none">
          <li class="nav-item">
            <div class="dropdown-divider"></div>
            <a class="nav-link bg-link" href="login.php">Iniciar sesión</a>
          </li>
        </ul>
  <?php
}
?>
        
    
        </div>
    </nav>
    <!-- Banner -->
    <main class="container-fluid banner-background d-flex align-items-center">
      <div class="container">
        <div class="row banner-content d-flex align-items-center">
          <!-- Título, eslogan y call to action -->
          <section class="col-lg-6 col-md-12 text-center text-lg-left">
            <h1 class="banner-title">
              Galvanic Therapy:<br/>Belleza a tu alcance
            </h1>
            <h4 class="banner-subtitle">
            Productos a base de ingredientes naturales <br/>para el cuidado de la piel.
            </h4>
            <?php
               if(!isset($_SESSION['email'])){
             ?>
            <a role="button" class="btn btn-light banner-button" href="registro.php">Registrarse</a>
            <?php
            }
            ?>
          </section>
          <!-- Slide -->
          <section class="col-lg-6 col-md-12">
            <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                <li data-target="#carouselIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#"><img src="img/slide/slider1.jpg" class="d-block w-100" alt="..."/></a>
                </div>
                <div class="carousel-item">
                   <a href="#"><img src="img/slide/slider2.jpg" class="d-block w-100" alt="..."/></a>
                </div>
                <div class="carousel-item">
                    <a href="#"><img src="img/slide/slider3.jpg" class="d-block w-100" alt="..."/></a>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
              </a>
            </div>
          </section>
        </div>
      </div>
    </main>
    <!-- Info -->
    <div class="container content-container">
        <div class="text-center my-5">
          <div class="container">
            <h1 class="display-4">Empieza a comprar ahora</h1>
          </div>
        </div>
      <section class="d-flex flex-wrap justify-content-center">
        <div class="info-card text-center">
          <img src="img/brand/compras-online.svg" class="info-img" alt="Imagen">
          <h4 class="card-title mt-3">COMPRAS ONLINE</h4>
          <p class="card-text">Realiza compras de tus productos favoritos.</p>
        </div>
        <div class="info-card text-center">
          <img src="img/brand/envios.svg" class="info-img" alt="Imagen">
          <h4 class="card-title mt-3">ENVIOS</h4>
          <p class="card-text">Envio seguro, rápido y eficaz a todo México.</p>
        </div>
        <div class="info-card text-center">
          <img src="img/brand/formas-de-pago.svg" class="info-img" alt="Imagen">
          <h4 class="card-title mt-3">FORMAS DE PAGO</h4>
          <p class="card-text">Formas de pago accesibles y totalmente seguras.</p>
        </div>
      </section>
    </div>
    <!-- Footer -->
    <footer>
      <div class="container-fluid text-center">
        <div class="row justify-content-center">
          <div class="col">
            <img src="img/brand/logo-secundary.png" height="80">
          </div>
          <hr class="clearfix w-100 d-md-none">
          <div class="col col-md-4 mt-3 text-center">
            <h5 class="font-weight-bold">ACERCA DE LA EMPRESA</h5>
            <p>Somos una empresa distribuidora de productos de belleza, abierta para el publico en general.</p>
          </div>
          <hr class="clearfix w-100 d-md-none">
          <div class="col col-md-4 mb-md-0 text-center">
            <h5 class="font-weight-bold text-uppercase">CONTACTANOS</h5>
            <img class="m-2" src="img/icons/facebook-logo.svg" height="30">
            <img class="m-2" src="img/icons/instagram.svg" height="30">
            <img class="m-2" src="img/icons/telefono.svg" height="30">
            <img class="m-2" src="img/icons/mail.svg" height="30">
          </div>
        </div>
      </div>
    </footer>
    <div class="home text-center py-3">
      <a class="text-decoration-none text-white" href="#">Inicio de pagina</a>
    </div>
    <!-- Bootstrap JS -->
    <script src="resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="resources/popper-1.15.0/popper.min.js"></script>
    <script src="resources/bootstrap-4.3.1/js/bootstrap.js"></script>
    <!-- Scripts -->
    <script src="js/search.js"></script>
  </body>
</html>