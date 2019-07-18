<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="resources/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Catalogo</title>
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
        <div class="search d-none d-lg-block">
          <img src="img/icons/search.svg" height="16px" alt="Search"/>
        </div>
        <!-- Secciones -->
        <ul class="navbar-nav sections mx-lg-auto">
          <li class="nav-item active">
            <a class="nav-link product-link" href="index.php">Inicio</a>
          </li>
          <!-- Dropdown de Productos -->
          <li class="nav-item dropdown">
            <a class="nav-link product-link" data-toggle="dropdown" href="#">Productos</a>
            <div class="dropdown-menu">
              <h4 class="dropdown-header">Categorias</h4>
              <a id="1"class="dropdown-item product-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 1;?>">Cuidado corporal</a>
              <a id="2"class="dropdown-item product-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 2;?>">Cuidado facial</a>
              <a id="3"class="dropdown-item product-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 3;?>">Suplementos Alimenticios</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link product-link" href="tendencias.php">Tendencias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link product-link" href="catalogo.html">Lo nuevo</a>
          </li>
        </ul>
        <!-- Carrito de compras lg -->
        <a class="cart d-none d-lg-block" href="cart.php">
          <img src="img/icons/cart.svg" height="16px" alt="Cart"/>
        </a>
        <!-- Boton de log-in -->
        <a class="btn btn-dark" href="login.php" role="button">Iniciar sesión</a>
      </div>
    </nav>
    <?php
      
      require('conexion.php');
      $consulta = $conexion->prepare('SELECT * FROM categories where categoryid ='.$_GET['categoryid']);
      $consulta -> execute();
      $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultado as $f){
      ?>
    <!-- Banner -->
    <main class="container-fluid banner-cuidadocorp-background d-flex align-items-center">
      <div class="container">
        <div class="row banner-content-secundary">
          <div class="col text-center">
          <h1 class="banner-title"><?php echo $f['categoryname']; ?></h1>
            <h4 class="banner-subtitle"><?php echo $f['descriptions']; ?></h4>
          </div>
        </div>
      </div>
    </main>
    <?php
      }
      ?>
    <!-- Productos - Contenedor -->
    <div class="container content-container d-flex flex-wrap justify-content-center">
    <?php
      
      require('conexion.php');
      $consulta = $conexion->prepare('SELECT * FROM products where unitsinstock >0 and categoryid ='.$_GET['categoryid']);
      $consulta -> execute();
      $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $f){
      ?>
      <!-- Producto -->
      <div class="card product-card" style="width: 18rem;">
        <a href="producto.php?productid=<?php echo $f['productid'];?>">
        <img src="img/products/<?php echo $f['picture'];?>" class="card-img-top product-thumbnail" alt="Imagen de producto">
        </a>
        <div class="card-body text-center">
          <a href="producto.php?productid=<?php echo $f['productid'];?>" class="product-link">
            <h5 class="card-title"><?php echo $f['productname']; ?></h5>
          </a>
          <p class="card-text">Precio: $ <?php echo $f['price']; ?></p>
          <p class="card-text">Envio: $ 99</p>
        </div>
        <div class="card-footer">
          <a href="cart.php?productid=<?php echo $f['productid'];?>" class="btn btn-dark btn-block">Agregar al carrito</a>
        </div>
      </div>
      <?php
      }
      ?>
      <?php
      
      require('conexion.php');
      $consulta = $conexion->prepare('SELECT * FROM products where unitsinstock <=0 and categoryid ='.$_GET['categoryid']);
      $consulta -> execute();
      $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $f){
      ?>
      <!-- Producto agotado -->
      <div class="card product-card" style="width: 18rem;">
        <a href="producto.php?productid=<?php echo $f['productid'];?>">
          <img src="img/products/<?php echo $f['picture']; ?>" class="card-img-top product-thumbnail" alt="Imagen de producto">
        </a>
        <div class="card-body text-center">
          <a href="producto.php?productid=<?php echo $f['productid'];?>" class="product-link">
            <h5 class="card-title"><?php echo $f['productname']; ?></h5>
          </a>
          <p class="card-text">Precio: $ <?php echo $f['price']; ?></p>
          <p class="card-text">Envio: $ 99</p>
        </div>
        <div class="card-footer">
          <a href="#" class="btn btn-dark btn-block disabled">Agotado</a>
        </div>
      </div>
    
    <?php
      }
      ?>
      </div>
    <!-- Footer -->
    <footer>
      <!--FOOTER TEXT-->
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
  </body>
</html>
