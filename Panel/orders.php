<?php include('conexion.php')?>
<?php
$senten = $pdo->prepare("SELECT *FROM users inner join orders 
on users.id = orders.usersid inner join payments 
on id_payment = id_payment_method");
$senten->execute();
$orders=$senten->fetchAll(PDO::FETCH_ASSOC);
// OBTENER TODOS LOS PRODUCTOS 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
     <!-- Font Awesome -->
    
 </head>
<body >
<?php require_once 'views/layout/header.php' ?>
    <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Ordenes</h4>
      <div class="row">

        <table class="table table table-striped table-bordered table-hover text-center">
            <form>
            <thead class="thead-dark" >
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Total</th>
                    <th>Fecha</th>                  
                    <th>Status</th>                  
                    <th>Método de pago</th>                  
                                      
                </thead>
               <?php foreach($orders as $ord){?>
                    <tr>
                    <td>
                    <button class="btn btn-white order"><?php echo $ord['orderid'];?>
                    <i class="far fa-eye fa-ms" style="color :black;" ></i></button>
                    </td>
                    <td><?php echo $ord['first_name'];?></td>
                        <td>$<?php echo $ord['total'];?></td>
                        <td><?php echo $ord['orderdate'];?></td>
                        <td><?php echo $ord['orderstatus'];?></td>
                        <td><?php echo $ord['method_payment'];?></td>
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                    </tr>
               <?php } ?>
    </table>
</div>
</div>
<!-- Bootstrap JS -->
<script src="../resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<script src="../resources/popper-1.15.0/popper.min.js"></script>
<script src="../resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
</body>                                           
</html>
