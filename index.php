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
    <link rel="stylesheet" href="resources/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="img/brand/icon.png" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css"/>
    <title>Galvanic Therapy</title>
  </head>
  <body>
    <?php require_once 'views/layout/header.php' ?>
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
               if(!isset($_SESSION['username'])){
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
    <div class="text-center my-5">
      <h1 class="display-4">Explora nuestro catalogo</h1>
    </div>
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-12 col-lg-6 banner-new-background py-5">
          <h1 class="categories-title">Lo nuevo</h1>
          <h4 class="categories-title">Prueba nuestros productos más recientes</h4>
          <a role="button" class="btn btn-light mt-2" href="nuevo.php">Explorar catalogo</a>
        </div>
        <div class="col-12 col-lg-6 banner-trends-background py-5">
          <h1 class="categories-title">Tendencias</h1>
          <h4 class="categories-title">Prueba nuestros productos más vendidos</h4>
          <a role="button" class="btn btn-light mt-2" href="tendencias.php">Explorar catalogo</a>
        </div>
      </div>
    </div>
    <div class="text-center my-5">
      <h1 class="display-4">Categorias</h1>
    </div>
    <div class="container-fluid categories-bg">
      <nav class="index-categories">
        <ul class="categories-list d-flex">
          <?php
            require ('validar-categorias.php');
            foreach($resultado as $producto){
          ?>
            <li>
              <a class="mini-title" href="catalogo.php?categoryid=<?php echo $producto['categoryid'];?>"><article class="category-square text-center d-flex justify-content-center align-items-center mt-3" 
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.5)), url(img/backgrounds/<?php echo $producto['picturecategorie'];?>);">
              <h4 class="categories-title"><?php echo $producto['categoryname'];?></h4>
            </article></a>
          </li>
          <?php
            }
          ?>
        </ul>
      </nav>
    </div>
    <div class="container content-container">
        <div class="text-center my-5">
          <div class="container">
            <h1 class="display-4">Empieza a comprar ahora</h1>
          </div>
        </div>
      <section class="d-flex flex-wrap justify-content-center mb-4">
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
    <?php require_once 'views/layout/footer.php' ?>
    <!-- Bootstrap JS -->
    <script src="resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="resources/popper-1.15.0/popper.min.js"></script>
    <script src="resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="js/search.js"></script>
  </body>
</html>