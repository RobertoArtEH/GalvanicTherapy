'SELECT * from products  inner join orderdetails
  on products.productid = orderdetails.productid inner join orders on orderdetails.orderid = orders.orderid inner join users on users.id = orders.usersid

  <?php include('conexion.php')?>
<?php include('barra.php')?>
<?php
$senten = $pdo->prepare("SELECT *FROM orders");
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
     <!-- Font Awesome -->
    
 </head>
<body >
    <div class="container">
    <h1 class="text-center text-warning">Orders</h1>
    </div>
<!-- FIN DEL FORM -->
    <div id="crudarticulos" class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead class="table-warning" >
                    <th>ID</th>
                    <th>Users</th>
                    <th>Total</th>
                    <th>Date</th>                  
                    <th>Status</th>                  
                    <th>Payment</th>                  
                                      
                </thead>
               <?php foreach($orders as $ord){?>
                    <tr>
                    <td>
                    <button class="btn btn-white order"><?php echo $ord['orderid'];?>
                    <i class="far fa-eye fa-lg" style="color :blue;" ></i></button>
                    </td>
                    <td ><button class="btn btn-white user"><?php echo $ord['usersid'];?>
                    <i class="far fa-eye fa-lg" style="color :magenta;" ></i></button></td>
                        <td>$<?php echo $ord['total'];?></td>
                        <td><?php echo $ord['orderdate'];?></td>
                        <td><?php echo $ord['orderstatus'];?></td>
                        <td><?php echo $ord['id_payment'];?></td>
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                    </tr>
               <?php } ?>
    </table>
</div>
</div>
<div class="container">
<table class="table table-striped table-bordered table-condensed table-hover usuarios invisible">
            <thead class="table-primary" >
                    <th>ID</th>
                    <th>First_Name</th>
                    <th>Last_Name</th>
                    <th>Imageprofile</th>                             
                </thead>
                <tr id="tabla">
                </tr>
              
            
    </table>
</div>
</body>                                           
</html>
