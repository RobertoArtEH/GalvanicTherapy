<?php session_start();
require('conexion.php');
if(isset($_SESSION['carrito'])){
  if(isset($_GET['productid'])){
  $arreglo=$_SESSION['carrito'];
  $find=false;
  $num=0;
  for ($i=0;$i<count($arreglo);$i++){ 
    if($arreglo[$i]['Productid']==$_GET['productid']){
        $find=true;
        $num=$i;
      }
    }
  if($find==true){
    $arreglo[$num]['Cantidad']=$arreglo[$num]['Cantidad']+1;
    $_SESSION['carrito']=$arreglo;
  }else{
    $nombre='';
    $precio = 0;
    $imagen = '';
    $cantidad = 0;
    $consulta =$conexion->prepare('SELECT * from products where productid='.$_GET['productid']);
    $consulta -> execute();
      $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultado as $f){
        $nombre =$f['productname'];
        $precio = $f['price'];
        $imagen = $f['picture'];
        
      }
    $newdata=array('Productid'=>$_GET['productid'],
    'Productname' =>$nombre,
    'Price'=>$precio,
    'Picture' => $imagen
    
    );
    array_push($arreglo, $newdata);
    $_SESSION['carrito']=$arreglo;
  }
}
}else{
  if(isset($_GET['productid'])){
    $nombre='';
    $precio = 0;
    $imagen = '';
    $Cantidad = 0;
    $consulta =$conexion->prepare('SELECT * from products where productid='.$_GET['productid']);
    $consulta -> execute();
    $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultado as $f){
        $nombre =$f['productname'];
        $precio =$f['price'];
        $imagen =$f['picture'];
      }
      $arreglo[]=array('Productid'=>$_GET['productid'],
            'Productname'=>$nombre,
            'Price'=>$precio,
            'Picture'=> $imagen,
            'Cantidad'=>1);
            
      $_SESSION['carrito']=$arreglo;
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
    <link rel="stylesheet" href="resources/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="">
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
        <div class="search d-none d-lg-block">
          <img src="img/icons/search.svg" height="16px" alt="Search"/>
        </div>
        <!-- Secciones -->
        <ul class="navbar-nav sections-secundary mx-lg-auto">
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
        <!-- Perfil LG -->
        <div class="dropdown d-none d-lg-block">
          <a href="" data-toggle="dropdown" style="text-decoration: none;">
            <img src="img/icons/user.png" width="32px" height="32px" alt="Perfil">
            <img src="img/icons/arrow.svg" height="14px" alt="Flecha">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item product-link" href="admin-productos.html">Gestionar</a>
            <a class="dropdown-item product-link" href="#">Cerrar sesión</a>
          </div>
        </div>
        <!-- Perfil SM --> 
        <ul class="navbar-nav sections mx-lg-auto d-lg-none">
          <li class="nav-item">
            <div class="dropdown-divider"></div>
            <a class="nav-link product-link" data-toggle="dropdown" href="">Perfil</a>
            <div class="dropdown-menu">
              <a class="dropdown-item product-link" href="admin-productos.html">Gestionar</a>
              <a class="dropdown-item product-link" href="#">Cerrar sesión</a>
            </div>
          </li>
        </ul>
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
      <h4 class="mb-4 text-center">Carrito</h4>
      <div class="row">
        <!-- Productos -->
        <div class="col-lg col-md-12">
        <?php
       $total = 0;
      if(isset($_SESSION['carrito'])){
        $data =$_SESSION['carrito'];
       
        for($i=0;$i<count($data);$i++){
          ?>
          <article class="cart-product row px-4 py-3 mb-4">
            <!-- Imagen de producto -->
            <div class="col-auto col-sm-auto">
              <img src="img/products/<?php echo $data['picture']; ?>" alt="Producto" class="img-product img-thumbnail">
            </div>
            <!-- Nombre y descripción -->
            <div class="col-4 col-sm-4 text-md-left col-md col-lg">
              <h4 class="card-title"><?php echo $data['productname']; ?></h4>
              <h6>Precio: <span>$ <?php echo $data['price']; ?></span></h6>
            </div>
            <!-- Info extra - derecha -->
            <div class="col-12 mt-2 col-sm text-sm-center col-md-auto col-lg-auto text-md-right row">
              <!-- Cantidad -->
              <div class="col-auto col-sm-auto col-md-auto col-lg-auto">
                <form class="form-inline">
                  <label class="product-text pr-1" for="formCantidad">Cantidad:</label>
                  <select class="custom-select" id="formCantidad">
                    <option selected>-</option>
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
                  <button type="button" class="btn btn-dark mt-3 mt-sm-auto ml-sm-2"><img src="img/icons/delete.svg" height="16px" alt="Eliminar"></button>
                </form>
              </div>
              <!-- Eliminar -->
              <!-- <div class="col-auto col-sm-auto col-md-auto col-lg-auto text-right">
              </div> -->
            </div>
          </article>
          <?php
          $total=($data[$i]['Cantidad']*$data[$i]['Price'])+$total;
        }
        
      }
    else{
      echo 'El carro de compras esta vacio';
    }
    echo  
          '
        </div>
        <!-- Total -->
        <div class="col-lg-4 col-md-12">
          <article class="cart-product px-4 py-3">
            <h4 class="card-title">Total</h4>
            <div class="d-flex justify-content-between my-4">
              <h6>Monto total:</h6>
              <h6>$ '.$total.'</h6>
            </div>
            <button type="button" class="btn btn-dark btn-block">Continuar</button>
          </article>
        </div>
      </div>
    </div>'
    ?>
    <!-- Bootstrap JS -->
    <script src="resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="resources/popper-1.15.0/popper.min.js"></script>
    <script src="resources/bootstrap-4.3.1/js/bootstrap.js"></script>
</body>
</html>