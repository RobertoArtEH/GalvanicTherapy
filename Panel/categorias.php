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
     <!-- Font Awesome -->
    
 </head>
<body >
    <div class="container">
    <h1 class="text-center text-info">Categorias</h1>
    </div>

<h3><a href="addcategorias.php"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-plus"> </i>
</button></a></h3>

</form>
<!-- FIN DEL FORM -->
    
    <div id="crudarticulos" class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead class="table-primary" >
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
                        <td><?php echo $categoria['Status'];?></td>
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
                       > <i class="fa fa-trash "style="color :white"></i></a>  
                       </button> 
                       </form>                      
                     </td>
                      
                    </tr>
               <?php } ?>

            
    </table>
</div>
</div>
</body>                                           
</html>
