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
    <title>Carrito</title>
  </head>
  <body>
    <?php require_once 'views/layout/header.php' ?>
    <?php require_once 'views/components/mini-banner.php' ?>
    <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Carrito</h4>
      <?php if(!empty($_SESSION['CARRITO'])){ ?>
      <div class="row">
      
        <!-- Productos -->
        <div class="col-lg col-md-12">
       
       <?php $total=0; ?>
       <?php foreach($_SESSION['CARRITO'] as $indice=>$producto ){  ?>
        
          <div id="producto">
          <article class="cart-product row px-2 py-3 mb-4">
            <!-- Imagen de producto -->
            <div class="col-auto col-sm-auto">
              <img src="img/products/<?php echo $producto['IMAGEN'] ?>" alt="Producto" class="img-product img-thumbnail">
            </div>
            <!-- Nombre y descripción -->
            <div class="col col-sm-4 text-md-left col-md col-lg">
              <h4 class="cart-title"><?php echo $producto['NOMBRE'] ?></h4>
              <h6 class="cart-text">Precio: <span>$ <?php echo number_format($producto['PRECIO'],2); ?></span></h6>
            </div>
            <!-- Info extra - derecha -->
            <div class="col mt-2 col-sm text-sm-center col-md-auto col-lg-auto text-md-right row">
              <!-- Cantidad -->
              <div class="col-auto col-sm-auto col-md-auto col-lg-auto">
                <form class="form-inline" action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                <!-- <h6 class="cart-text pt-4">Subtotal: <span>$ <?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'],2 );  ?> </span></h6>         -->
               <label class="product-text pr-1" for="formCantidad">Cantidad:</label>
                  <select class="custom-select" name="cantidad" >
                    <?php
                    for($i = 1; $i <= $producto['CANTIDAD']; $i++){
                    ?>
                  <option value='<?php echo $i ?>'><?php echo $i ?></option>
                  <?php
                  }
                  ?>
                  </select>
                  <button class="btn btn-dark mt-3 mt-sm-auto ml-sm-2" type="submit" name="btnAccion" value="Eliminar" ><img src="img/icons/delete.svg" height="16px"></button>      
                </form>
              </div>
            </div>
          </article>
          </div>
          <?php $total=$total+($producto['PRECIO'] * $producto['CANTIDAD']); ?>
            <?php } ?>
    </div>
        <!-- Total -->
        <div class="col-lg-4 col-md-12">
          <article class="cart-product px-4 py-3">
            <h4 class="card-title">Total</h4>
            <div class="d-flex justify-content-between my-4">
              <h6>Monto total:</h6>
              <h6>$ <?php echo number_format($total,2); ?></h6>
            </div>
            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#modalDeposito">Depósito bancario</button>
          </article>
        </div>
        <?php
              if(isset($_SESSION['email']) || isset($_SESSION['username'])){
              ?>
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
              <form action="pagar.php" method="post">
                <p>En los siguientes sitios podrás realizar tu depósito bancario:</p>
                <?php
                  foreach($pago as $pago){
                  ?>
                <div class="row align-items-center">
                  <div class="col">
                    <input type="radio" name="pago" value="<?php echo $pago['id_payment_method'] ?>">
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
                <div class="alert alert-warning mb-0" role="alert">
                  Al continuar, se procesará tu compra. <br> Puedes ver todas tus compras en <a href="compras.php" class="alert-link">Mis compras.</a>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Continuar</button>
            </form>
              </div>
            </div>
          </div>
        </div>
            <?php
              }else{
                ?>
                <div class="modal fade" id="modalDeposito">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <div class="modal-body">
                    <div class="global-container">       
                      <section class=" container p-4 register col-sm-8 col-md-8 col-lg-10">
                      <div class="d-flex justify-content-center pt-2">
                          <img class="logo-login" src="./img/brand/logo.png">
                        </div>
                        <form class="content-form needs-validation" action="cart.php" method="POST" name="formulario" id="formulario" autocomplete="off">
                          <fieldset>
                            <legend class="h4 text-center p-3">
                              Iniciar sesion
                            </legend>
                            <form>
                              <div id="login-alert" class="alert alert-danger d-none" role="alert"></div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Usuario</label>
                                <input type="text" id="access" class="form-control form-control-sm" name="email" aria-describedby="emailHelp" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input type="password" id="password" class="form-control form-control-sm" name="password" required>
                              </div>
                              <button type="submit" id="login-btn" class="btn btn-dark boton-iniciar btn-block">Iniciar sesión</button>
                              <div class="sign-up p-4 text-center">
                                ¿No tienes una cuenta? <a class="text-link" href="registro.php">Crear una</a>
                              </div>
                            </form>
                          </fieldset>
                        </form>
                      </section>
                  </div>
                </div>
            </div>
          <?php
          }
          ?>
        <?php 
          } else{ ?>
          <img src="img/icons/cart.png" height="250" class="mx-auto d-block">
          <h6 class="text-center">Carrito de compras vacio</h6>
        <?php } ?>
      </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="resources/popper-1.15.0/popper.min.js"></script>
    <script src="resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="js/search.js"></script>
    <script src="js/form.js"></script>
</body>
</html>
