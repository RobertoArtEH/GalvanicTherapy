<?php
include 'conexion.php';
$nombre =$_POST['nombre'];
$id =$_POST['id'];
$descripcion =$_POST['descripcion'];
$precio =$_POST['precio'];
$stock =$_POST['stock'];
$imagen =$_FILES['imagen']["name"];
$content =$_POST['content'];
$category =$_POST['categoria'];   
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
            $temporalfoto=$_FILES["imagen"]["tmp_name"];
            if($temporalfoto!=""){
               move_uploaded_file($temporalfoto,"imagenes/".$conversion);
            }
            $sentencia=$pdo->prepare ("UPDATE products SET 
        picture=:picture WHERE productid=:productid");
             $sentencia->bindParam(':productid',$id);
             $sentencia->bindParam(':picture',$conversion);
             $sentencia->execute();

             echo 'actualizado';
    
?>