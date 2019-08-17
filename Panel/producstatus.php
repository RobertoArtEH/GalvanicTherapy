<?php
include 'conexion.php';
$id=$_POST['id'];
$senten = $pdo->prepare("SELECT *FROM products WHERE productid='".$id."'");
$senten->execute();
$row=$senten->fetch(PDO::FETCH_ASSOC);

    if($row['productstatus'] == 'activo')
    {
       $status='desactivado';
    }
    if($row['productstatus'] == 'desactivado')

    {
        $status='activo';
    }

$sentencia=$pdo->prepare ("UPDATE products SET productstatus='".$status."' WHERE productid='".$id."'");
$sentencia->execute();
echo 'Status changed';
?>