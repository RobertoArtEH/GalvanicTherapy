<?php include('conexion.php')?>
<?php include('barra.php')?>
<?php
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
    <title>Productos</title>
    <script src="https://kit.fontawesome.com/a2a999c481.js"></script>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
     <!-- Font Awesome -->
    
 </head>
<body >
<a href="#">
                  <small class="bg-green">Online</small>
                  <span class="hidden-xs">Raul</span>
                </a>
<h3><a href="addproducto.php"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-plus"> </i>
</button></a></h3>

</form>
<!-- FIN DEL FORM -->
    
    <div id="crudarticulos" class="row">
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>                  
                    <th>Content</th>                  
                    <th>Categoria</th>                  
                    <th>Precio</th>                  
                    <th>Stock</th>                  
                    <th>Accion</th>                  
                </thead>
               <?php foreach($listaproductos as $producto){?>
                    <tr>
                    <td><?php echo $producto['productid'];?></td>
                    <td><?php echo $producto['productname'];?></td>
                        <td><?php echo $producto['description'];?></td>
                        <td><?php echo $producto['picture'];?></td>
                        <td><?php echo $producto['content'];?></td>
                        <td><?php echo $producto['categoryid'];?></td>
                        <td><?php echo $producto['price'];?></td>
                        <td><?php echo $producto['unitsinstock'];?></td>
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                        <td>
                            <form action="" method="post">
                        <input type="hidden" value="<?php echo $producto['productname'];?>" name="nombre">
                        <input type="hidden" value="<?php echo $producto['description'];?>" name="descripcion">
                        <input type="hidden" value="<?php echo $producto['content'];?>" name="content">
                        <input type="hidden" value="<?php echo $producto['picture'];?>" name="imagen">
                        <input type="hidden" value="<?php echo $producto['price'];?>" name="precio">
                        <input type="hidden" value="<?php echo $producto['categoryid'];?>" name="categoria">
                        <input type="hidden" value="<?php echo $producto['productid'];?>" name="id">
                        <input type="hidden" value="<?php echo $producto['unitsinstock'];?>" name="stock">
                            <a href="editarproducto.php?id=<?php echo $producto['productid'];?>
                            "> <i class="fa fa-edit" name="accion" value="editar">editar</i></a>
                       <a href="eliminarproducto.php?id=<?php echo $producto['productid'];?>"
                       > <i class="fa fa-refresh ">eliminar</i></a>  
                       </form>                      
                     </td>
                      
                    </tr>
               <?php } ?>

            
    </table>
</div>
</div>
</body>                                           
</html>
