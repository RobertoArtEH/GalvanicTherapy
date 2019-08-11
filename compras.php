<?php
include 'config.php';
include 'conexion.php';
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
    <div class="accordion" id="accordionCompras">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div>
            <button class="btn bg-link" type="button" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
              Orden 1 <span class="info-date">fecha</span>
            </button>
          </div>
          <div class="mr-0">
            <button class="btn text-right info-price" type="button" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
              Total: $999
            </button>
          </div>
        </div>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCompras">
          <div class="card-body">
            <div id="producto">
              <article class="cart-product row px-2">
                <!-- Imagen de producto -->
                <div class="col-auto col-sm-auto">
                  <img src="img/products/firmeza.jpg" alt="Producto" class="img-product img-thumbnail">
                </div>
                <!-- Nombre y descripción -->
                <div class="col col-sm-4 text-md-left col-md col-lg">
                  <h4 class="cart-title">ads</h4>
                  <h6 class="cart-text">Precio: <span>$ 11</span></h6>
                </div>
                <!-- Info extra - derecha -->
                <div class="col mt-2 col-sm text-sm-center col-md-auto col-lg-auto text-md-right row">
                  <!-- Cantidad -->
                  <div class="col-auto col-sm-auto col-md-auto col-lg-auto">
                    <form method="post">
                      <label class="product-text pr-1" for="formCantidad">Cantidad: 1</label>
                      <h6 class="cart-text">Total: <span>$ 11</span></h6>
                    </form>
                  </div>
                </div>
              </article>
            </div>
          </div>

          <div class="card-body">
            <div id="producto">
              <article class="cart-product row px-2">
                <!-- Imagen de producto -->
                <div class="col-auto col-sm-auto">
                  <img src="img/products/firmeza.jpg" alt="Producto" class="img-product img-thumbnail">
                </div>
                <!-- Nombre y descripción -->
                <div class="col col-sm-4 text-md-left col-md col-lg">
                  <h4 class="cart-title">ads</h4>
                  <h6 class="cart-text">Precio: <span>$ 11</span></h6>
                </div>
                <!-- Info extra - derecha -->
                <div class="col mt-2 col-sm text-sm-center col-md-auto col-lg-auto text-md-right row">
                  <!-- Cantidad -->
                  <div class="col-auto col-sm-auto col-md-auto col-lg-auto">
                    <form method="post">
                      <label class="product-text pr-1" for="formCantidad">Cantidad: 1</label>
                      <h6 class="cart-text">Total: <span>$ 11</span></h6>
                    </form>
                  </div>
                </div>
              </article>
            </div>
          </div>

        </div>
      </div>
    </div>
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