<header class="container">
  <nav class="navbar navbar-expand-lg">
    <!-- Logo -->
    <a  id="logo" class="navbar-brand mx-lg-auto" href="index.php">
      <img src="img/brand/logo.png" class="logo" alt="Logo"/>
    </a>
    <!-- Header SM -->
    <ul class="nav">
      <li id="searchSM" class="d-flex align-items-center">
        <!-- Buscar -->
        <div class="d-lg-none">
          <div class="form-inline container">
            <div class="form-group mb-0">
              <input id="searchInputSM" class="search-input-sm" type="text" placeholder="Buscar...">
            </div>
            <a id="searchIconSM">
              <img src="img/icons/search.svg" class="icon-sm" alt="Buscar"/>
            </a>
          </div>
        </div>
      </li>
      <li id="cartSM" class="nav-item d-flex align-items-center">
        <!-- Carrito de compras -->
        <a class="cart d-lg-none" href="cart.php">
          <img src="img/icons/cart.svg" class="icon-sm" alt="Carrito"/>
          <span class="badge badge-dark cart-count"><?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);  ?></span>
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
    <?php if(isset($_SESSION['email']) || isset($_SESSION['username'])) { ?>
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
            require ('validar-categorias.php');
            foreach($resultado as $producto) {
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
        <span class="badge badge-dark cart-count"><?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); ?></span>  
      </a>
      <!-- Perfil LG -->
      <div class="dropdown d-none d-lg-block">
        <a href="" data-toggle="dropdown" style="text-decoration: none;">
          <img src="img/icons/user.png" width="32px" height="32px" alt="Perfil">
          <img src="img/icons/arrow.svg" height="14px" alt="Flecha">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <span class="dropdown-item-text"><?php echo ($_SESSION['username']); ?></span>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item bg-link" href="compras.php">Mis compras</a>
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
            <div class="dropdown-divider"></div>
            <a class="dropdown-item bg-link" href="compras.php">Mis compras</a>
            <a class="dropdown-item bg-link" href="cerrar.php">Cerrar sesión</a>
          </div>
        </li>
      </ul>
    <?php
      } else {

    ?>
    <!-- Secciones LG -->
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
          require ('validar-categorias.php');
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
