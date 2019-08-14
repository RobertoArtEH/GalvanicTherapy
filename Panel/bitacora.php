<?php include('conexion.php')?>
<?php include('barra.php')?>
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
     <!-- Font Awesome -->
    
 </head>
<body >
    <div class="container">
    <h1 class="text-center text-warning">Bitacora</h1>
    </div>
</form>
<!-- FIN DEL FORM -->
    
    <div id="crudarticulos" class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead class="table-warning" >
                    <th>statement</th>
                    <th>user</th>
                    <th>productname</th>
                    <th>last description</th>                  
                    <th>new description</th>                  
                    <th>last price</th>                  
                    <th>new price</th>                  
                    <th>last stock</th>                  
                    <th>new stock</th>                  
                    <th>date</th>                  
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
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                       
                      
                    </tr>
               <?php } ?>

            
    </table>
</div>
</div>
</body>                                           
</html>
