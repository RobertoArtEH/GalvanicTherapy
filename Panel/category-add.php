<?php
include 'conexion.php';
$nombre =$_POST['categoryname'];
$id =$_POST['categoryid'];
$descripcion =$_POST['descriptions'];
$imagen =$_FILES['imagen']["name"];
$status = 'activa';
//Validar Categoria existente
$consulta = 'SELECT * FROM categories WHERE categoryid=? LIMIT 1';
$stmtid = $pdo -> prepare($consulta);
$stmtid -> execute([$id]);
$validarid = $stmtid -> rowCount();
if(!$validarid > 0 ) 
{
    $sentencia=$pdo->prepare("INSERT INTO categories(categoryid,categoryname,descriptions,picturecategorie,statuscategorie)
    VALUES (:categoryid,:categoryname,:descriptions,:picturecategorie,:statuscategorie)");
   
  $sentencia->bindParam(':categoryid',$id);
  $sentencia->bindParam(':categoryname',$nombre);
  $Fecha= new DateTime();
  $conversion=($imagen!="")?$Fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"default.jpg";
  $temporalfoto=$_FILES["imagen"]["tmp_name"];
  if($temporalfoto!=""){
      move_uploaded_file($temporalfoto,"../img/backgrounds/".$conversion);
  }
  $sentencia->bindParam(':picturecategorie',$conversion);
  $sentencia->bindParam(':descriptions',$descripcion);
  $sentencia->bindParam(':statuscategorie',$status);
  $sentencia->execute();
  echo 1;
}
else{
    echo 0;
}
?>