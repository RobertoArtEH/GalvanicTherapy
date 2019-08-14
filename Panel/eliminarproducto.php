<?php
include 'conexion.php';
$id=$_GET['id'];
$sentencia=$pdo->prepare ("DELETE FROM products WHERE productid='".$id."'");
$sentencia->execute();
header('location:productos.php'); 
?>