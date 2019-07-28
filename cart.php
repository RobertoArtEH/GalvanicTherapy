<?php
include 'config.php';
include 'validarcart.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="resources/bootstrap-4.3.1/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css"/>
    <title>Carrito</title>
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
              <a id="1"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 1;?>">Cuidado corporal</a>
              <a id="2"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 2;?>">Cuidado facial</a>
              <a id="3"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 3;?>">Suplementos Alimenticios</a>
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
              <a id="1"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 1;?>">Cuidado corporal</a>
              <a id="2"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 2;?>">Cuidado facial</a>
              <a id="3"class="dropdown-item bg-link" href="catalogo.php?categoryid=<?php echo $f['categoryid'] = 3;?>">Suplementos Alimenticios</a>
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
    <!-- Mini header -->
    <div class="container-fluid mini-banner-background d-flex align-items-center">
      <div class="container">
        <div class="row mini-banner-content">
          <div class="col text-center">
            <p class="mini-title">¡Envios a todo México!</p>
          </div>
        </div>
      </div>
    </div>
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
                <h6 class="cart-text pt-4">Subtotal: <span>$ <?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'],2 );  ?> </span></h6>        
               <label class="product-text pr-1" for="formCantidad">Cantidad:</label>
                  <select class="custom-select" name="cantidad" >
                    <option selected><?php echo $producto['CANTIDAD'] ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
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
            <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#modalForm">Continuar</button>
          </article>
        </div>
        <div class="modal fade" id="modalForm">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar dirección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputCountry">País</label>
                  <select id="inputCountry" class="form-control" required>
                    <option>México</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputStreet">Calle</label>
                  <input type="text" class="form-control" id="inputStreet" required>
                </div>
                <div class="form-group">
                  <label for="inputState">Estado</label>
                  <select id="inputState" class="form-control" required>
                    <option>Elegir...</option>
                    <option>Aguascalientes</option>
                    <option>Baja California</option>
                    <option>Baja California Sur</option>
                    <option>Campeche</option>
                    <option>Chihuahua</option>
                    <option>Chiapas</option>
                    <option>Ciudad de México</option>
                    <option>Coahuila</option>
                    <option>Colima</option>
                    <option>Durango</option>
                    <option>Guanajuato</option>
                    <option>Guerrero</option>
                    <option>Hidalgo</option>
                    <option>Jalisco</option>
                    <option>México</option>
                    <option>Michoacán</option>
                    <option>Morelos</option>
                    <option>Nayarit</option>
                    <option>Nuevo León</option>
                    <option>Oaxaca</option>
                    <option>Puebla</option>
                    <option>Querétaro</option>
                    <option>Quintana Roo</option>
                    <option>San Luis Potosí</option>
                    <option>Sinaloa</option>
                    <option>Sonora</option>
                    <option>Tabasco</option>
                    <option>Tamaulipas</option>
                    <option>Tlaxcala</option>
                    <option>Veracruz</option>
                    <option>Yucatán</option>
                    <option>Zacatecas</option>
                  </select>
                </div>
                <div class="form-row">
                  <div class="form-group col-6">
                    <label for="inputCellphone">Celular</label>
                    <input type="text" class="form-control" id="inputCellphone" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="inputNumber">Número</label>
                    <input type="text" class="form-control" id="inputNumber" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" id="inputZip" required>
                </div>
                <div class="form-group">
                  <label for="inputPayment">Método de pago</label>
                  <select id="inputPayment" class="form-control" required>
                    <option>Elegir...</option>
                    <option>Opción</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-dark">Continuar</button>
              </div>
            </div>
          </div>
        </div>
        <?php } else{ ?>
          <div class="alert alert-success">No hay productos en el carrito...</div>
        <?php } ?>
      </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="resources/popper-1.15.0/popper.min.js"></script>
    <script src="resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="js/search.js"></script>
</body>
</html>
