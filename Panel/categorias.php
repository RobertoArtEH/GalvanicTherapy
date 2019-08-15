<?php include('conexion.php')?>
<?php include('barra.php')?>
<?php
$senten = $pdo->prepare("SELECT *FROM categories");
$senten->execute();
$listacategorias=$senten->fetchAll(PDO::FETCH_ASSOC);
// OBTENER TODOS LOS PRODUCTOS 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorias</title>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
     <!-- Font Awesome -->
    
 </head>
<body >
<?php require_once '../views/components/mini-banner.php' ?>
    <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Categorias</h4>
      <div class="row">
      <div class="container">
     <h3>
            <a href="addcategorias.php"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus"> </i>
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
                    <th>Status</th>                  
                    <th>Accion</th>                  
                </thead>
               <?php foreach($listacategorias as $categoria){?>
                    <tr >
                    <td ><?php echo $categoria['categoryid'];?></td>
                    <td ><?php echo $categoria['categoryname'];?></td>
                        <td><?php echo $categoria['descriptions'];?></td>
                        <td><img class="img-thumbnail"width="100px" src="imagenes/<?php echo $categoria['picturecategorie'];?>"></td>
                        <td><?php echo $categoria['statuscategorie'];?></td>
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                        <td>
                            <form action="" method="post">
                        <input type="hidden" value="<?php echo $categoria['categoryname'];?>" name="categoryname">
                        <input type="hidden" value="<?php echo $categoria['descriptions'];?>" name="descriptions">
                        <input type="hidden" value="<?php echo $categoria['picturecategorie'];?>" name="picturecategorie">
                        <input type="hidden" value="<?php echo $categoria['Status'];?>" name="Status">
                           <button class="btn btn-warning">
                           <a href="editcategorias.php?id=<?php echo $categoria['categoryid'];?>
                            "> <i class="fa fa-edit" style="color :white "name="accion" value="editar"></i></a>
                           </button> 
                           <button class="btn btn-danger">
                       <a href="editarcategoria.php?id=<?php echo $categoria['categoryid'];?>"
                       > <i class="fa fa-sync "style="color :white"></i></a>  
                       </button> 
                       </form>                      
                     </td>
                      
                    </tr>
               <?php } ?>

            
    </table>
</div>
</div>
</div>
</body>                                           
</html>
