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
$status = $_POST['productstatus'];
//Validar producto existente
$consulta = 'SELECT * FROM products WHERE productid=? LIMIT 1';
$stmtid = $pdo -> prepare($consulta);
$stmtid -> execute([$id]);
$validarid = $stmtid -> rowCount();
if(!$validarid > 0 ) {
    $sentencia=$pdo->prepare("INSERT INTO products(productid,productname,picture,description,content,categoryid,price,unitsinstock,productstatus)
    VALUES (:productid,:productname,:picture,:description,:content,:categoryid,:price,:unitsinstock,:productstatus)");
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
    $sentencia->bindParam(':productstatus',$status);
    $sentencia->execute(); 
    echo 1;
}
else
{
    echo 0;

}
    
?>

