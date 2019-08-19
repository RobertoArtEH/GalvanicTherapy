<?php
include 'config.php';
include 'conexion.php';
include 'validarcart.php';
include 'validar-categorias.php';
$consulta = $conexion->prepare('SELECT * FROM products inner join categories 
on products.categoryid = categories.categoryid where productid ='.$_GET['productid']);
$consulta -> execute();
$resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach($resultado as $producto) {
if($producto["statuscategorie"]=="desactivada"){
header('Location:index.php');
}
else
{

}
}

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
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="resources/sweetalert2/sweetalert2.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css"/>
    <title>Galvanic Therapy</title>
  </head>
  <body>
    <?php require_once 'views/layout/header.php' ?>
    <?php require_once 'views/components/mini-banner.php' ?>
    <?php
      require('productos.php');
      foreach($producto as $producto){
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
          <h4 id="productName" class="product-title my-3"><?php echo $producto['productname']; ?></h4>
          <p class="product-text">Precio: <span>$ <?php echo number_format($producto['price'],2); ?></span></p>
          <form class="form-inline justify-content-center justify-content-lg-start">
            <label class="product-text mr-sm-2" for="formCantidad">Cantidad:</label>
            <select id="cantidad" class="custom-select my-1 mr-sm-2" name="cantidad">
              <?php
                for($i = 1; $i <= $producto['unitsinstock']; $i++){
              ?>
              <option value='<?php $i ?>' ><?php echo $i ?></option>
              <?php
                }
              ?>
            </select>
          </form>
          <?php
            if($producto['unitsinstock'] >0) {
          ?>
          <button id="btnAdd" class="btn btn-dark btn-block my-4" name="btnAccion" value="Agregar" type="submit" >Agregar al carrito</button>
          <?php
            } else {
          ?>
          <a class="btn btn-dark btn-block disabled my-4">Agotado</a>
          <?php
            }
          ?>
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
    <?php require_once 'views/layout/footer.php' ?>
    <!-- Bootstrap JS -->
    <script src="resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="resources/popper-1.15.0/popper.min.js"></script>
    <script src="resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <!-- Sweetalert -->
    <script src="resources/sweetalert2/sweetalert2.min.js"></script>
    <!-- Scripts -->
    <script src="js/search.js"></script>
    <script src="js/product.js"></script>
  </body>
</html>
