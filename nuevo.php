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
    <title>Lo nuevo</title>
  </head>
  <body>
    <?php require_once 'views/layout/header.php' ?>
    <!-- Banner -->
    <main class="container-fluid banner-new-background d-flex align-items-center">
      <div class="container">
        <div class="row banner-content-secundary">
          <div class="col text-center">
            <h1 class="banner-title">Lo nuevo</h1>
            <h4 class="banner-subtitle">Prueba nuestros productos más recientes</h4>
          </div>
        </div>
      </div>
    </main>
    <!-- Productos - Contenedor -->
    <div class="container content-container d-flex flex-wrap justify-content-center">
    <?php
      foreach($new as $producto){
    ?>
    <!-- Producto -->
    <div class="card product-card" style="width: 18rem">
      <a href="producto.php?productid=<?php echo $producto['productid'];?>">
      <img src="img/products/<?php echo $producto['picture'];?>" class="card-img-top product-thumbnail" alt="Imagen de producto">
      </a>
      <div class="card-body text-center">
        <a href="producto.php?productid=<?php echo $producto['productid'];?>" class="bg-link">
          <h6 class="card-title"><?php echo $producto['productname']; ?></h6>
        </a>
        <p class="card-text">Precio: $ <?php echo number_format($producto['price'],2); ?></p>
        <p class="card-text">Envio: $ 99</p>
      </div>
      <form action="" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['productid'],COD,KEY);?>">
        <input type="hidden" name="picture" id="picture" value="<?php echo openssl_encrypt($producto['picture'],COD,KEY);?>">
        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['productname'],COD,KEY); ?>" >
        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['price'],COD,KEY); ?>" >
        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>" >
        <div class="card-footer">
          <button class="btn btn-dark btn-block" name="btnAccion" value="Agregar" type="submit" >Agregar al carrito</button>
        </div>
      </form>
    </div>
    <?php
      }
    ?>
    <?php
    require('conexion.php');
    $consulta = $conexion->prepare('SELECT * from products where unitsinstock <=0 order by productid desc');
    $consulta -> execute();
    $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $producto){
    ?>
    <!-- Producto agotado -->
    <div class="card product-card" style="width: 18rem">
      <a href="producto.php?productid=<?php echo $producto['productid'];?>">
        <img src="img/products/<?php echo $producto['picture']; ?>" class="card-img-top" alt="Imagen de producto">
      </a>
      <div class="card-body text-center">
        <a href="producto.html" class="bg-link">
          <h6 class="card-title"><?php echo $producto['productname']; ?></h6>
        </a>
        <p class="card-text">Precio: $ <?php echo number_format($producto['price'],2); ?></p>
        <a href="#" class="btn btn-dark btn-block disabled">Agotado</a>
      </div>
    </div>
    <?php
      }
    ?>
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
