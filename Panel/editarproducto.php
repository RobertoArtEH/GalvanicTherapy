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
<form method="POST" enctype="multipart/form-data">
    <h1>Editar producto</h1>
    <label for=""class="control-label invisible">ID</label>
    <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php echo $row['productid']?>" required="">
    <label for="" class="control-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required="" value="<?php echo $row['productname']?>" >
    <label for="" class="control-label">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" required="" value="<?php echo $row['description']?>">
    <label for="" class="control-label">Content</label>
    <input type="text" class="form-control" id="content" name="content" placeholder="" required="" value="<?php echo $row['content']?>">
    <label for="" class="control-label">Imagen</label>
    <input type="file" accept="image/*" class="form-control" id="imagen" name="imagen"placeholder=""  value="<?php echo $row['picture']?>" >    
    <label for="" class="control-label">Precio</label>
    <input type="text" class="form-control" id="precio" name="precio" placeholder="" required="" value="<?php echo $row['price']?>">
    <label for="" class="control-label">Stock</label>
    <input type="text" class="form-control" id="stock" name="stock" placeholder="" required="" value="<?php echo $row['unitsinstock']?>" >
    <label for="" class="control-label invisible">categoria</label>
    <input type="hidden" class="form-control" id="category" name="category" placeholder="" required="" value="<?php echo $row['categoryid']?>" >
    </div>   
        <div class="modal-footer mt-1">
        <div class="form-group"> <!-- Submit Button -->
        <button type="submit" name="" class="btn btn-primary">Actualizar</button>   
    </form>
<?php }?>
<?php
$nombre =(isset($_POST['nombre']))?$_POST['nombre']:"";
$descripcion =(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$precio =(isset($_POST['precio']))?$_POST['precio']:"";
$stock =(isset($_POST['stock']))?$_POST['stock']:"";
$imagen =(isset($_FILES['imagen']["name"]))?$_FILES['imagen']["name"]:"";
$content =(isset($_POST['content']))?$_POST['content']:"";
$category =(isset($_POST['category']))?$_POST['category']:"";
    if($nombre!=""&& $descripcion!=""&& $precio!=""&& $stock!=""&&$content!=""&&$category!="")
    {
        $sentencia=$pdo->prepare ("UPDATE products SET 
        productname=:productname,
        description=:description,
        content=:content,
        categoryid=:categoryid,
        price=:price,
        unitsinstock=:unitsinstock WHERE productid=:productid");
         $sentencia->bindParam(':productid',$id);
         $sentencia->bindParam(':productname',$nombre);
         $sentencia->bindParam(':description',$descripcion);
         $sentencia->bindParam(':content',$content);
         $sentencia->bindParam(':categoryid',$category);
         $sentencia->bindParam(':price',$precio);
         $sentencia->bindParam(':unitsinstock',$stock);
        $sentencia->execute();
    
        $Fecha= new DateTime();
        $conversion=($imagen!="")?$Fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"default.jpg";
        $temporalfoto=(isset($_FILES['imagen']["tmp_name"]))?$_FILES['imagen']["tmp_name"]:"";
        if($temporalfoto!=""){
            move_uploaded_file($temporalfoto,"imagenes/".$conversion);
        }
        $sentencia=$pdo->prepare ("UPDATE products SET 
        picture=:picture WHERE productid=:productid");
             $sentencia->bindParam(':productid',$id);
             $sentencia->bindParam(':picture',$conversion);
             $sentencia->execute();
        header("location:productos.php");
    }
?>

</div>    
</div>    
</body>
</html>