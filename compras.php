<?php
session_start();
include 'config.php';
include 'conexion.php';
include 'orden.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="resources/bootstrap-4.3.1/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="img/brand/icon.png" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="css/style.css"/>
  <title>Mis compras</title>
</head>
<body>
  <?php require_once 'views/layout/header.php' ?>
  <?php require_once 'views/components/mini-banner.php' ?>
  <h4 class="mb-4 mt-4 text-center">Mis compras</h4>

  <div class="container">
  <?php
          $count = 1;
          foreach($compra as $compra){
            ?>
          <div>
    <div class="accordion" id="accordionCompras<?php echo $count; ?>">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div>
            <button class="btn bg-link" type="button" data-toggle="collapse" data-target="#collapseProducts<?php echo $count;?>" aria-expanded="true" aria-controls="collapseProducts">
              Orden <?php echo $count ?>
              <span class="info-date mr-2"><?php echo $compra['orderdate']; ?></span>
              <?php
              switch($compra['orderstatus']) {
                case 'completado':
                    echo '<span class="badge badge-success">Confirmado</span>';
                    break;
                case 'pendiente':
                    echo '<span class="badge badge-warning">Pendiente</span>';
                    break;
                case 'cancelado':
                    echo '<span class="badge badge-danger">Cancelado</span>';
                    break;
              }
              ?>
            </button>
          </div>
          <div>
            <button class="btn text-right info-price" type="button" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
            Total: <?php echo $compra['total']; ?>
            </button>
          </div>
        </div>
        
        <div id="collapseProducts<?php echo $count;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCompras<?php echo $count; ?>">
          <div class="card-body">
            <div id="producto">
              <article class="cart-product row px-2">
                <!-- Imagen de producto -->
                <div class="col-auto col-sm-auto">
                  <img src="img/products/<?php echo $compra['picture']; ?>" alt="Producto" class="img-product img-thumbnail">
                </div>
                <!-- Nombre y descripción -->
                <div class="col col-sm-4 text-md-left col-md col-lg">
                  <h4 class="cart-title"><?php echo $compra['productname']; ?></h4>
                  <h6 class="cart-text">Precio: <span><?php echo $compra['unitprice']; ?></span></h6>
                </div>
                <!-- Info extra - derecha -->
                <div class="col mt-2 col-sm text-sm-center col-md-auto col-lg-auto text-md-right row">
                  <!-- Cantidad -->
                  <div class="col-auto col-sm-auto col-md-auto col-lg-auto">
                    <form method="post">
                      <label class="product-text pr-1" for="formCantidad">Cantidad: <?php echo $compra['quantity']; ?></label>
                      <h6 class="cart-text">Total: <span>$ <?php echo $compra['total']; ?></span></h6>
                    </form>
                  </div>
                </div>
              </article>
            </div>
          </div>

        </div>
      </div>
    </div>
    <?php
           $count++;
          }
          ?>
  </div>

  <!-- Bootstrap JS -->
  <script src="resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <script src="resources/popper-1.15.0/popper.min.js"></script>
  <script src="resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
  <!-- Scripts -->
  <script src="js/search.js"></script>
</body>
</html>