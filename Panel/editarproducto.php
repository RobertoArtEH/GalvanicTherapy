<?php include 'conexion.php';
$id=$_GET['id'];
$sentencia=$pdo->prepare("SELECT *FROM products WHERE productid='".$id."'");
$sentencia->execute();
while($row=$sentencia->fetch(PDO::FETCH_ASSOC))
{
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
    <script src="https://kit.fontawesome.com/a2a999c481.js"></script>
    <link rel="stylesheet" href="css/bootstrapstor.min.css">
</head>
<body>
<div class="container border border-primary mt-1 col-6">
<form method="POST" ectype="multipart/form-data">
    <h1>Editar producto</h1>
    <label for=""class="control-label invisible">ID</label>
    <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php echo $row['productid']?>" require="">
    <label for="" class="control-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" require="" value="<?php echo $row['productname']?>" >
    <label for="" class="control-label">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" require="" value="<?php echo $row['description']?>">
    <label for="" class="control-label">Content</label>
    <input type="text" class="form-control" id="content" name="content" placeholder="" require="" value="<?php echo $row['content']?>">
    <label for="" class="control-label">Imagen</label>
    <input type="text" class="form-control" id="imagen" name="imagen" placeholder=""require="" value="<?php echo $row['picture']?>" >    
    <label for="" class="control-label">Precio</label>
    <input type="text" class="form-control" id="precio" name="precio" placeholder="" require="" value="<?php echo $row['price']?>">
    <label for="" class="control-label">Stock</label>
    <input type="text" class="form-control" id="stock" name="stock" placeholder="" require="" value="<?php echo $row['unitsinstock']?>" >
    </div>   
        <div class="modal-footer mt-1">
        <div class="form-group"> <!-- Submit Button -->
        <button type="submit" name="" class="btn btn-primary">Actualizar</button>
        <a href="index.php"><button type="button" value="Cancelar" name="accion" class="btn btn-danger">Regresar</button></a>
   
    </form>
<?php }?>
<?php
$nombre =(isset($_POST['nombre']))?$_POST['nombre']:"";
$descripcion =(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$precio =(isset($_POST['precio']))?$_POST['precio']:"";
$stock =(isset($_POST['stock']))?$_POST['stock']:"";
$imagen =(isset($_POST['imagen']))?$_POST['imagen']:"";
$content =(isset($_POST['content']))?$_POST['content']:"";
$category =(isset($_POST['category']))?$_POST['category']:"";
if($nombre!=null || $id=null || $descripcion!=null || $precio !=null || $stock!=null ||
$imagen!=null  || $content!=null || $category!=null)
{
    $sentencia=$pdo->prepare ("UPDATE products SET productname='".$nombre."',description='".$descripcion."',
    picture='".$imagen."',content='".$content."',categoryid='".$category."',price='".$precio."',
    unitsinstock='".$stock."' WHERE  productid='".$id."'");
    $sentencia->execute();
    if($nombre=1)
    {
        header("location:index.php");
    }
}?>

</div>    
</div>    
</body>
</html>