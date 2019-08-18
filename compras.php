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
  <h4 class="mb-4 mt-4 text-center">
    Mis compras 
    <img src="img/icons/information.svg" style="cursor:pointer; height:20px;" alt="Ayuda" data-toggle="modal" data-target="#modalDeposito">
  </h4>

  <div class="modal fade" id="modalDeposito">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Depósito bancario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center p-4">
          <p>En los siguientes sitios podrás realizar tu depósito bancario:</p>
          <?php
            $stmt= $conexion->prepare('SELECT * FROM payments');
            $stmt->execute();
            $pago = $stmt ->fetchAll();

            foreach($pago as $pago){
            ?>
          <div class="row align-items-center">
            <div class="col">
              <img src="img/icons/<?php echo $pago['payment_picture']?>" alt="" height="30px">
            </div>
            <div class="col">
              <p><?php echo $pago['payment_number']; ?></p>
            </div>
            <div class="col">
              <p><?php echo $pago['method_payment']; ?></p>
            </div>
          </div>
          <hr>
          <?php
            }
            ?>
          <p> Una vez realizado, envía el comprobante de pago al siguiente correo electrónico:</p>
          <div class="row justify-content-center my-3">
            <img class="mx-2" src="img/icons/mail-black.svg" height="30px">
            <h5>galvanictherapy@hotmail.com</h5>
          </div>
          <p>Tu pago será confirmado una vez revisemos tu comprobante de pago.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <?php 
      $count = 1;
      $lastOrder = null;
      foreach($compra as $compra) {
        if($lastOrder != $compra['orderid']) {
    ?>
    <div class="accordion" id="accordionCompras<?php echo $compra['orderid'] ?>">
      <div class="card">
      
        <div class="card-header d-flex justify-content-between">
          <div>
            <button class="btn bg-link" type="button" data-toggle="collapse" data-target="#collapseProducts<?php echo $compra['orderid'] ?>" aria-expanded="true" aria-controls="collapseProducts<?php echo $compra['orderid'] ?>">
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
            <span ><img src="img/icons/<?php echo $compra['payment_picture']?>" alt="" height="18px"> </span>
            </button>
          </div>
          <div class="mr-0">
            <button class="btn text-right info-price text-center" type="button" data-toggle="collapse" data-target="#collapseProducts<?php echo $compra['orderid'] ?>" aria-expanded="true" aria-controls="collapseProducts<?php echo $compra['orderid'] ?>">
              Total: $ <?php echo number_format($compra['total'],2); ?>
            </button>
          </div>
        </div>

        <div id="collapseProducts<?php echo $compra['orderid'] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCompras<?php echo $compra['orderid'] ?>">
          <?php
            $stmt = $conexion ->prepare('SELECT * from products  inner join orderdetails
            on products.productid = orderdetails.productid inner join orders on orderdetails.orderid = orders.orderid inner join users on users.id = orders.usersid where orderdetails.orderid = :orderid');
            $stmt -> execute(array(':orderid'=> $compra['orderid']));
            $resultProducts = $stmt ->fetchAll();

            foreach($resultProducts as $resultProducts) {            
          ?>
          <div class="card-body">
            <div id="producto">
              <article class="cart-product row px-2" style="box-shadow: none;">
                <!-- Imagen de producto -->
                <div class="col-auto col-sm-auto">
                  <img src="img/products/<?php echo $resultProducts['picture']; ?>" alt="Producto" class="img-product img-thumbnail">
                </div>
                <!-- Nombre y descripción -->
                <div class="col col-sm-4 text-md-left col-md col-lg">
                  <h4 class="cart-title"><?php echo $resultProducts['productname']; ?></h4>
                  <h6 class="cart-text">Precio: $ <span><?php echo number_format($resultProducts['unitprice'],2); ?></span></h6>
                </div>
                <!-- Info extra - derecha -->
                <div class="col mt-2 col-sm text-sm-center col-md-auto col-lg-auto text-md-right row">
                  <!-- Cantidad -->
                  <div class="col-auto col-sm-auto col-md-auto col-lg-auto">
                    <form method="post">
                      <label class="cart-text pr-1" for="formCantidad">Cantidad: <?php echo $resultProducts['quantity']; ?></label>
                      <h6 class="cart-text">Total: <span>$ <?php echo number_format($resultProducts['unitprice'] * $resultProducts['quantity'],2 ); ?></span></h6>
                    </form>
                  </div>
                </div>
              </article>
            </div>
          </div>
          <?php
            }
          ?>
        </div>

      </div>
    </div>
    <?php
        }
      $lastOrder = $compra['orderid'];
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