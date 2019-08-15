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
     <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">
           <i class="fa fa-plus" height="50px"> </i>Agregar
        </button>
        </h3>
    </div>

     <!-- MODAL LARGE -->
 <!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- FORM -->
      <?php include('conexion.php')?>
<?php 
$nombre =(isset($_POST['nombre']))?$_POST['nombre']:"";
$id =(isset($_POST['id']))?$_POST['id']:"";
$descripcion =(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$imagen =(isset($_FILES['imagen']["name"]))?$_FILES['imagen']["name"]:"";
$status='activado';

if($nombre!=null || $id=null || $descripcion!=null ||
$imagen!=null )
{
      $sentencia=$pdo->prepare("INSERT INTO categories(categoryid,categoryname,descriptions,picturecategorie,statuscategorie)
      VALUES (:categoryid,:categoryname,:descriptions,:picturecategorie,:Status)");
     
    $sentencia->bindParam(':categoryid',$id);
    $sentencia->bindParam(':categoryname',$nombre);
    $Fecha= new DateTime();
    $conversion=($imagen!="")?$Fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"default.jpg";
    $temporalfoto=$_FILES["imagen"]["tmp_name"];
    if($temporalfoto!=""){
        move_uploaded_file($temporalfoto,"imagenes/".$conversion);
    }
    $sentencia->bindParam(':picturecategorie',$conversion);
    $sentencia->bindParam(':descriptions',$descripcion);
    $sentencia->bindParam(':Status',$status);
    $sentencia->execute();
    if($nombre=1)
    {
        $nombre="";
        header("location:categorias.php");
    }

}
?>
   <div class="container col-6">
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="" class="control-label">ID</label>
        <input type="text" class="form-control" id="id" name="id" placeholder="" required="">
        <label for="" class="control-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required="" >
        <label for="" class="control-label">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" required="">
        <label for="" class="control-label">Imagen</label>
        <input type="file" accept="image/*" class="form-control" id="imagen" name="imagen" placeholder="" > 
        </div>   
            <div class="modal-footer">
            <div class="form-group"> <!-- Submit Button -->
            <button type="submit" value="Agregar" name="accion" class="btn btn-primary">Crear</button>
            <a href="index.php"><button type="button" value="Cancelar" name="accion" class="btn btn-danger">Cancelar</button></a>
    
    </div>
         </div>
         </div>
         </div>
         </div>
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
                        <input type="hidden" value="<?php echo $categoria['statuscategorie'];?>" name="statuscategorie">
                           <a href="editcategorias.php?id=<?php echo $categoria['categoryid'];?>
                            "> editar provisional no internet :(<i class="fa fa-edit" style="color :white "name="accion" value="editar"></i></a>
                       <a href="editarcategoria.php?id=<?php echo $categoria['categoryid'];?>"
                       >change status provisional no internet :(<i class="fa fa-sync "style="color :white"></i></a>  
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
