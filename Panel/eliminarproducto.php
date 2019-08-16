<?php
include 'conexion.php';
$id=$_GET['id'];
$senten = $pdo->prepare("SELECT *FROM products WHERE productid='".$id."'");
$senten->execute();
$row=$senten->fetch(PDO::FETCH_ASSOC);

    if($row['Discontinued'] == 'No')
    {
       $status='Yes';
    }
    if($row['Discontinued'] == 'Yes')

    {
        $status='No';
    }

$sentencia=$pdo->prepare ("UPDATE products SET Discontinued='".$status."' WHERE productid='".$id."'");
$sentencia->execute();
header("location:productos.php");

?>