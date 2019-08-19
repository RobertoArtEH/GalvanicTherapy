<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes</title>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/brand/icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script></head>
<body>
<?php require_once 'views/layout/header.php' ?>
<center><h1 class="mt-3">Reportes</h1></center>
<div class="container mt-5">
<div class="row mt-5">
  <div class="col-3 ml-5">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="pdfs/masvendido.jpg" height="210px" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Productos mas vendidos por categoria</h5>
    <p class="card-text">
      Genere reporte de los productos mas vendidos en su categoria</p>
<center><a href="pdfs/Productosmasvendidos.php" target="_blank"><button class="btn btn-block btn-danger"> Reporte <i class="fas fa-file-pdf fa-lg"style="color:white"></i></button></a></center>
  </div>
</div>
</div>



<div class="col-3 ml-5">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="pdfs/ventasportiempo.jpg" height="210px" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Ventas por periodo</h5>
    <p class="card-text">Genere reporte de las ventas en determinado periodo</p>
    <button type="button" class="btn btn-block btn-danger" data-toggle="collapse" data-target="#demo">Consultar</button>
  <div id="demo" class="collapse mt-2">

  <form action="pdfs/Ventasporperiodo.php" target="_blank" method="post">
    <label for="">Desde</label>
  <input class="form-control"type="date" required="" name="desde">
  <label for="">Hasta</label>
    <input class="form-control"type="date" required="" name="hasta">
    <center>
<button class="btn btn-block btn-danger mt-2"> Reporte <i class="fas fa-file-pdf fa-lg"style="color:white"></i>
</button></center>
</form>    
  </div>
  </div>
</div>
</div>

<div class="col-3 ml-5">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="pdfs/ProductosxPeriodo.jpg" height="210px" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Productos mas vendidos</h5>
    <p class="card-text">Genere reporte de los productos mas vendidos en determinado periodo</p>
    <button type="button" class="btn btn-block btn-danger" data-toggle="collapse" data-target="#demo2">Consultar</button>
  <div id="demo2" class="collapse mt-2">

  <form action="pdfs/Productosxperiodo.php" target="_blank" method="post">
    <label for="">Desde</label>
  <input class="form-control"type="date" required="" name="desde">
  <label for="">Hasta</label>
    <input class="form-control"type="date" required="" name="hasta">
    <center>
<button class="btn btn-block btn-danger mt-2"> Reporte <i class="fas fa-file-pdf fa-lg"style="color:white"></i>
</button></center>
</form>    
  </div>  </div>
</div>
</div>



</div>
</div>





    
</body>
</html>