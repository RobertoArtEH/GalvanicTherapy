
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar</title>
    <script src="https://kit.fontawesome.com/a2a999c481.js"></script>
    <link rel="stylesheet" href="css/bootstrapstor.min.css">
</head>
<body>

<div class="container col-6">
    
<form action="" method="post" enctype="multipart/form-data">
    <label for="" class="control-label">ID</label>
    <input type="text" class="form-control" id="id" name="id" placeholder="" require="">
    <label for="" class="control-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" require="" >
    <label for="" class="control-label">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" require="">
    <label for="" class="control-label">Imagen</label>
    <input type="file" accept="image/*" class="form-control" id="imagen" name="imagen" placeholder=""require="" > 
    </div>   
        <div class="modal-footer">
        <div class="form-group"> <!-- Submit Button -->
        <button type="submit" value="Agregar" name="accion" class="btn btn-primary">Crear</button>
        <a href="index.php"><button type="button" value="Cancelar" name="accion" class="btn btn-danger">Cancelar</button></a>

</div>

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
      $sentencia=$pdo->prepare("INSERT INTO categories(categoryid,categoryname,descriptions,picturecategorie,Status)
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
    
</body>
</html>