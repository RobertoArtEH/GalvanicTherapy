
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
    <label for="" class="control-label">Content</label>
    <input type="text" class="form-control" id="content" name="content" placeholder="" require="">
    <label for="" class="control-label">Imagen</label>
    <input type="file" accept="image/*" class="form-control" id="imagen" name="imagen" placeholder=""require="" >    
    <label for="" class="control-label">Precio</label>
    <input type="text" class="form-control" id="precio" name="precio" placeholder="" require="">
    <label for="" class="control-label">Categoria</label>
    <select class="form-control" name="category" id="categoria" >
    <?php include('conexion.php')?>
<?php 
$nombre =$_POST['nombre'];
$id =$_POST['id'];
$descripcion =$_POST['descripcion'];
$precio =$_POST['precio'];
$stock =$_POST['stock'];
$imagen =$_FILES['imagen']["name"];
$content =$_POST['content'];
$category =$_POST['category'];
if($nombre!=null || $id=null || $descripcion!=null || $precio !=null || $stock!=null ||
$imagen!=null || $accion!=null || $content!=null || $category!=null)
{
    $sentencia=$pdo->prepare("INSERT INTO products(productid,productname,picture,description,content,categoryid,price,unitsinstock)
    VALUES (:productid,:productname,:picture,:description,:content,:categoryid,:price,:unitsinstock)");
    $sentencia->bindParam(':productid',$id);
    $sentencia->bindParam(':productname',$nombre);
    $Fecha= new DateTime();
    $conversion=($imagen!="")?$Fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"default.jpg";
    $temporalfoto=$_FILES["imagen"]["tmp_name"];
    if($temporalfoto!=""){
        move_uploaded_file($temporalfoto,"imagenes/".$conversion);
    }
    $sentencia->bindParam(':picture',$conversion);
    $sentencia->bindParam(':description',$descripcion);
    $sentencia->bindParam(':content',$content);
    $sentencia->bindParam(':categoryid',$category);
    $sentencia->bindParam(':price',$precio);
    $sentencia->bindParam(':unitsinstock',$stock);
    $sentencia->execute();
    if($nombre=1)
    {
        header("location:index.php");
    }
}
?>

<?php
$stmt = $pdo->prepare('SELECT * FROM categories');
        $stmt->execute();
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $categoryid; ?>"><?php echo $categoryname; ?></option>
            <?php
        }
        ?>    
        </select>                    
    <label for="" class="control-label">Stock</label>
    <input type="text" class="form-control" id="stock" name="stock" placeholder="" require="" >
    </div>   
        <div class="modal-footer">
        <div class="form-group"> <!-- Submit Button -->
        <button type="submit" value="Agregar" name="accion" class="btn btn-primary">Crear</button>
        <a href="index.php"><button type="button" value="Cancelar" name="accion" class="btn btn-danger">Cancelar</button></a>

</div>
    
</body>
</html>