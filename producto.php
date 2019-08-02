<?php
include 'config.php';
include 'conexion.php';
include 'validarcart.php';
include 'validar-categorias.php';
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
          <a id="searchIcon" class="search-icon">
            <img src="img/icons/search.svg" alt="Buscar"/>
          </a>
        </div>
        <?php
        if(isset($_SESSION['email']) || isset($_SESSION['username'])){
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
              <?php
              
              foreach($resultado as $producto){
                ?>
              <a class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $producto['categoryid'];?>"><?php echo $producto['categoryname'];?></a>
              <?php
              }
              ?>
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
        <span class="badge badge-dark cart-count"><?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);  ?></span>  
          <img src="img/icons/cart.svg" height="16px" alt="Cart"/>
        </a>
        <!-- Perfil LG -->
        <div class="dropdown d-none d-lg-block">
          <a href="" data-toggle="dropdown" style="text-decoration: none;">
            <img src="img/icons/user.png" width="32px" height="32px" alt="Perfil">
            <img src="img/icons/arrow.svg" height="14px" alt="Flecha">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
          <span class="dropdown-item-text"><?php echo ($_SESSION['username']); ?></span>
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
            <span class="dropdown-item-text"><?php echo ($_SESSION['username']); ?></span>
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
              <?php
             
              foreach($resultado as $producto){
                ?>
              <a class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $producto['categoryid'];?>"><?php echo $producto['categoryname'];?></a>
              <?php
              }
              ?>
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
          <span class="badge badge-dark cart-count-log"><?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);  ?></span>  
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
    <!-- Mini banner -->
    <div class="container-fluid mini-banner-background d-flex align-items-center">
      <div class="container">
        <div class="row mini-banner-content">
          <div class="col text-center">
            <p class="mini-title">¡Envios a todo México!</p>
          </div>
        </div>
      </div>
    </div>
    <?php
      require('conexion.php');
      $consulta = $conexion->prepare('SELECT * FROM products where productid =' .$_GET['productid']);
      $consulta -> execute();
      $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $producto){
      ?>
    <!-- Producto -->
    <div class="container">
      <div class="row banner-content">
        <!-- Imagen -->
        <div class="col-lg-6 col-md-12 d-flex justify-content-center">
          <img src="img/products/<?php echo $producto['picture']; ?>" class="img-thumbnail" alt="Imagen de producto">
        </div>
        <!-- Detalles -->
        <div class="col-lg-6 col-md-12 text-center text-lg-left">
          <h4 class="product-title my-3"><?php echo $producto['productname']; ?></h4>
          <p class="product-text">Precio: <span>$ <?php echo number_format($producto['price'],2); ?></span></p>
          <form class="form-inline justify-content-center justify-content-lg-start">
            <label class="product-text mr-sm-2" for="formCantidad">Cantidad:</label>
            <select class="custom-select my-1 mr-sm-2" name="cantidad">
            <?php

              for($i = 1; $i <= $producto['unitsinstock']; $i++){
                ?>
              <option value='<?php $i ?>' ><?php echo $i ?></option>
              <?php
              }
              ?>
            </select>
          </form>
          <form action="" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['productid'],COD,KEY);?>">
          <input type="hidden" name="picture" id="picture" value="<?php echo openssl_encrypt($producto['picture'],COD,KEY);?>">
          <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['productname'],COD,KEY); ?>" >
          <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['price'],COD,KEY); ?>" >
          <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt($i,COD,KEY); ?>" >
          <?php
          if($producto['unitsinstock'] >0){
          ?>
          <button class="btn btn-dark btn-block my-4" name="btnAccion" value="Agregar" type="submit" >Agregar al carrito</button>
          <?php
          }else{
            ?>
            <a  href="#" class="btn btn-dark btn-block disabled my-4">Agotado</a>
            <?php
          }
          ?>
        </form>
          <p class="product-text"><?php echo $producto['description']; ?></p>
          <p class="product-text"><strong>Contenido:</strong></p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item product-text"><?php echo $producto['content']; ?></li>
          </ul>
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
    <script src="resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="js/search.js"></script>
  </body>
</html>