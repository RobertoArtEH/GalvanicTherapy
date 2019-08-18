<?php
include 'conexion.php';
$nombre =$_POST['categoryname'];
$id =$_POST['categoryid'];
$descripcion =$_POST['descriptions'];
$imagen =$_FILES['imagen']["name"];
$statuscategorie = $_POST['statuscategorie'];
       
$sentencia=$pdo->prepare ("UPDATE categories SET 
categoryname=:categoryname,
descriptions=:descriptions,
statuscategorie=:statuscategorie WHERE categoryid=:categoryid");
 $sentencia->bindParam(':categoryid',$id);
 $sentencia->bindParam(':categoryname',$nombre);
 $sentencia->bindParam(':descriptions',$descripcion);
 $sentencia->bindParam(':statuscategorie',$status);
$sentencia->execute();
    
$Fecha= new DateTime();
$conversion=($imagen!="")?$Fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"default.jpg";
$temporalfoto=$_FILES["imagen"]["tmp_name"];
if($temporalfoto!=""){
   move_uploaded_file($temporalfoto,"imagenes/".$conversion);
}
$sentencia=$pdo->prepare ("UPDATE categories SET 
picturecategorie=:picture WHERE categoryid=:categoryid");
 $sentencia->bindParam(':categoryid',$id);
 $sentencia->bindParam(':picture',$conversion);
 $sentencia->execute();

 echo 'actualizado';
    
?>