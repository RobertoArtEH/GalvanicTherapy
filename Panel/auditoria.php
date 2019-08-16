<?php include('conexion.php')?>
<?php
$senten = $pdo->prepare("SELECT *FROM audit_products");
$senten->execute();
$bitacora=$senten->fetchAll(PDO::FETCH_ASSOC);
// OBTENER TODOS LOS PRODUCTOS 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitacora</title>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
     <!-- Font Awesome -->
    
 </head>
<body >
<?php require_once 'views/layout/header.php' ?>
    <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Auditoria</h4>
      <div class="row">

        <table class="table table table-striped table-bordered table-hover text-center">
            <form>
            <thead class="thead-dark" >
                    <th>Sentencia</th>
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Última descripción</th>                  
                    <th>Nueva Descripción</th>                  
                    <th>Último precio</th>                  
                    <th>Nuevo precio</th>                  
                    <th>Último stock</th>                  
                    <th>Nuevo stock</th>                  
                    <th>Fecha</th>                  
                </thead>
               <?php foreach($bitacora as $bita){?>
                    <tr >
                    <td ><?php echo $bita['statement'];?></td>
                    <td ><?php echo $bita['user'];?></td>
                        <td><?php echo $bita['productname'];?></td>
                        <td><?php echo $bita['last_description'];?></td>
                        <td><?php echo $bita['new_description'];?></td>
                        <td><?php echo $bita['last_price'];?></td>
                        <td><?php echo $bita['new_price'];?></td>
                        <td><?php echo $bita['last_stock'];?></td>
                        <td><?php echo $bita['new_stock'];?></td>
                        <td><?php echo $bita['date'];?></td>
                    </tr>
               </form>
               <?php } ?>
        </table>
    </div>
    </div>
    </div>
  <!-- Bootstrap JS -->
  <script src="../resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <script src="../resources/popper-1.15.0/popper.min.js"></script>
  <script src="../resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
</body>                                           
</html>
