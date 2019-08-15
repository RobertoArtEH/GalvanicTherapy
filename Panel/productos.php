<?php include('conexion.php')?>
<?php include('barra.php')?>
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
    
    <?php require_once '../views/components/mini-banner.php' ?>
  <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Productos</h4>
</div>
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
$accion =(isset($_POST['accion']))?$_POST['accion']:"";
$nombre =(isset($_POST['nombre']))?$_POST['nombre']:"";
$id =(isset($_POST['id']))?$_POST['id']:"";
$descripcion =(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$precio =(isset($_POST['precio']))?$_POST['precio']:"";
$imagen =(isset($_FILES['imagen']["name"]))?$_FILES['imagen']["name"]:"";
$content =(isset($_POST['content']))?$_POST['content']:"";
$category =(isset($_POST['category']))?$_POST['category']:"";
$discontinued='No';
switch($accion)
{   case "btnagregar":
        $sentencia=$pdo->prepare("INSERT INTO products(productid,productname,picture,description,content,categoryid,price,unitsinstock,Discontinued)
        VALUES (:productid,:productname,:picture,:description,:content,:categoryid,:price,:unitsinstock,:Discontinued)");
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
        $sentencia->bindParam(':Discontinued',$discontinued);
        $sentencia->execute();  
        header("location:productos.php");
        
    break;
    case "btncancelar":
    header("location:productos.php");
    break;
}

    ?>
    <div class="container"> 
    <form action="" method="post" enctype="multipart/form-data">
    <label for="" class="control-label">ID</label>
    <input type="text" class="form-control" id="id" name="id"placeholder="" required="" >
    <label for="" class="control-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre"placeholder="" required=""  >
    <label for="" class="control-label">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion"placeholder="" required="" >
    <label for="" class="control-label">Content</label>
    <input type="text" class="form-control" id="content" name="content"placeholder="" required="" >
    <label for="" class="control-label">Imagen</label>
    <input type="file" accept="image/*" class="form-control" id="imagen" name="imagen"placeholder="" >    
    <label for="" class="control-label">Precio</label>
    <input type="text" class="form-control" id="precio" name="precio"placeholder="" required="" >
    <label for="" class="control-label">Categoria</label>
    <select class="form-control" name="category" id="categoria" required="" >

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
    <input type="text" class="form-control" id="stock" name="stock" placeholder="" required="" >
    </div>
    <div class="modal-footer">
        <div class="form-group"> <!-- Submit Button -->
        <button type="submit" value="btnagregar" name="accion" class="btn btn-primary">Crear</button>
        
        <button type="button" data-dismiss="modal" value="btncancelar" name="accion" class="btn btn-danger">Cancelar</button>
    </form>
         </div>
         </div>
         </div>
         </div>
         </div>
        <?php
$senten = $pdo->prepare("SELECT *FROM products");
$senten->execute();
$listaproductos=$senten->fetchAll(PDO::FETCH_ASSOC);
// OBTENER TODOS LOS PRODUCTOS 
?>
  
<!-- FORM -->

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
                    <th>Discontinued</th>                  
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
                        <td><?php echo $producto['Discontinued'];?></td>
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                        <td>
                            <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $producto['productname'];?>" name="nombre">
                        <input type="hidden" value="<?php echo $producto['description'];?>" name="descripcion">
                        <input type="hidden" value="<?php echo $producto['content'];?>" name="content">
                        <input type="hidden" value="<?php echo $producto['picture'];?>" name="imagen">
                        <input type="hidden" value="<?php echo $producto['price'];?>" name="precio">
                        <input type="hidden" value="<?php echo $producto['categoryid'];?>" name="categoria">
                        <input type="hidden" value="<?php echo $producto['productid'];?>" name="id">
                        <input type="hidden" value="<?php echo $producto['unitsinstock'];?>" name="stock">
                        <input type="hidden" value="<?php echo $producto['Discontinued'];?>" name="Discontinued">
                           <div class="btn btn-warning">
                           <a class="eliminar" href="editarproducto.php?id=<?php echo $producto['productid'];?>">
                           provisional no icons no internet :(
                            <i class="fa fa-edit" style="color :white"></i></a>
                           </div>
                           <div class="btn btn-danger">
                       <a class="eliminar" href="eliminarproducto.php?id=<?php echo $producto['productid'];?>"
                       > link status <i class="fa fa-trash "style="color :white"></i></a>  
                           </div>
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
<script>
 $(document).ready(function () {
 

    });

</script>
