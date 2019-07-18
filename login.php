<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"/>
      <link rel="stylesheet" href="css/style.css"/>
      
    <title>Iniciar sesion</title>
</head>
<body>
  <!-- Header -->
    <header class="container">
      <nav class="navbar navbar-expand-lg">
        <!-- Logo -->
        <a class="navbar-brand mx-lg-auto" href="index.html">
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
            <a class="cart d-lg-none" href="cart.html">
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
  <div class="global-container">       
    <article class="formulario-login p-4">
        <section class="card container pt-2 register col-md-4 col-sm-4">
          <div class="d-flex justify-content-center pt-2">
            <img class="logo-login" src="./img/brand/logo.png">
          </div>
            <form action="validar.php" method="POST" name="formulario" id="formulario" autocomplete="off">
                <fieldset>
                    <legend class="h4 text-center p-3">
                      Iniciar sesion
                    </legend>
                    <form>
                      <!-- to error: add class "has-danger" -->
                      <div class="form-group">
                          <label for="exampleInputEmail1">Direccion de correo</label>
                          <input type="email" class="form-control form-control-sm" name="email" aria-describedby="emailHelp">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Contraseña</label>
                          <a href="#" style="float:right;font-size:12px;">¿Olvidaste tu contraseña?</a>
                          <input type="password" class="form-control form-control-sm" name="password">
                      </div>
                      <button type="submit" class="btn btn-dark boton-iniciar btn-block">Iniciar sesión</button>
                      
                      <div class="sign-up p-4 text-center">
                          ¿No tienes una cuenta? <a href="registro.php">Crear una</a>
                      </div>
                  </form>
                </fieldset>
            </form>
        </section>
    </article>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
</body>
</html>