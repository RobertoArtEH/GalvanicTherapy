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
    <script src="https://kit.fontawesome.com/a2a999c481.js"></script>

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
                    <th>Accion</th>                  
                                      
                </thead>
               <?php foreach($orders as $ord){?>
                    <tr>
                    <td>
                    <button class="btn id btn-white order"><?php echo $ord['orderid'];?>
                    <i class="far fa-eye fa-ms" style="color :black;" ></i></button>
                    </td>
                    <td><?php echo $ord['first_name'];?></td>
                        <td>$<?php echo $ord['total'];?></td>
                        <td><?php echo $ord['orderdate'];?></td>
                        <td><button class="btn status"><?php echo $ord['orderstatus'];?></button></td>
                        <td><?php echo $ord['method_payment'];?></td>
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                        <td class="accion"><div class="row justify-content-center">
                           <a  href="PaymentChange.php?id=<?php echo $ord['orderid'];?>"
                            class=""> <div class="col">
                            <i class="ban fa fa-sync" style="color :info"></i></td>
                            </div>
                            </a>
                        </div>
                    <br>
               </td>
                    </tr>
               <?php } ?>
    </table>
    </div>
    </div>
    </div>
</body> 
<script src="js/jquery.min.js"></script>
</html>
<script>

$(document).ready(function () {
    $('.status').each(function(indice,valor) {
      if($(this).text()== 'completado')
      {
     $(this).addClass('btn-success');
      }
      else if($(this).text()== 'pendiente')
        $(this).addClass('btn-warning');
        else if($(this).text()== 'rechazado')
        $(this).addClass('btn-danger');
      });  

    
});

</script>
