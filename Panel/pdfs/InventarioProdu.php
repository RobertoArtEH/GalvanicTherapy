<?php include('../conexion.php')?>
<?php
$count = $pdo->prepare("SELECT COUNT(*) as total FROM products");
$count->execute();
$number =$count->fetch(PDO::FETCH_ASSOC);
print_r($number['total']);

$senten = $pdo->prepare("SELECT *FROM products");
$senten->execute();
$listaproductos=$senten->fetchAll(PDO::FETCH_ASSOC);
// OBTENER TODOS LOS PRODUCTOS 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario Productos</title>
    <link rel="stylesheet" href="../css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
     <!-- Font Awesome -->
    
 </head>
<body >
    <div class="container content-container">
    <h1>TOTAL PRODUCTOS : <?php echo $number['total'];?>
</h1>
      <div class="row">
    <div class="container">
    </div>
        <table class="table table table-striped table-bordered table-hover text-center">
            <form>
            <thead class="thead-dark" >
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>              
                    <th>Content</th>                  
                    <th>Categoria</th>                  
                    <th>Precio</th>                  
                    <th>Stock</th>                  
                </thead>
               <?php foreach($listaproductos as $producto){?>
                    <tr >
                    <td ><?php echo $producto['productid'];?></td>
                    <td ><?php echo $producto['productname'];?></td>
                        <td><?php echo $producto['description'];?></td>
                        <td><?php echo $producto['content'];?></td>
                        <td><?php echo $producto['categoryid'];?></td>
                        <td><?php echo $producto['price'];?></td>
                        <td><?php echo $producto['unitsinstock'];?></td>
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                    </tr>
               <?php } ?>
    </table>
</div>
</div>
</div>
</body>                                           
</html>
