<?php include('conexion.php')?>
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
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
     <!-- Font Awesome -->
    
 </head>
<body >
    <?php require_once 'views/layout/header.php' ?>
    <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Productos</h4>
      <div class="row">
    <div class="container">
    <h3>
        <a href="addproducto.php">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
           <i class="fa fa-plus" height="50px"> </i>
        </button>
        </a>
    </h3>
    </div>
        <table class="table table table-striped table-bordered table-hover text-center">
            <form>
            <thead class="thead-dark" >
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
                    <tr >
                    <td ><?php echo $producto['productid'];?></td>
                    <td ><?php echo $producto['productname'];?></td>
                        <td><?php echo $producto['description'];?></td>
                        <td><img class="img-thumbnail"width="100px" src="imagenes/<?php echo $producto['picture'];?>"></td>
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
                           <button class="btn btn-warning">
                           <a href="editarproducto.php?id=<?php echo $producto['productid'];?>
                            "><i class="fa fa-edit" style="color :white "name="accion" value="editar"></i></a>
                           </button> 
                           <br>
                           </br>
                           <button class="btn btn-danger">
                       <a href="eliminarproducto.php?id=<?php echo $producto['productid'];?>"
                       ><i class="fa fa-trash "style="color :white"></i></a>  
                       </button> 
                       </form>                      
                     </td>
                      
                    </tr>
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
