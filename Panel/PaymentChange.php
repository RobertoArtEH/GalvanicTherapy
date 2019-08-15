<?php
include 'conexion.php';
$id=$_GET['id'];
$senten = $pdo->prepare("SELECT *FROM orders WHERE orderid='".$id."'");
$senten->execute();
$row=$senten->fetch(PDO::FETCH_ASSOC);

    if($row['orderstatus'] == 'completado')
    {
       $status='rechazado';
    }
    if($row['orderstatus'] == 'rechazado'||$row['orderstatus'] == 'pendiente')

    {
        $status='completado';
    }

$sentencia=$pdo->prepare ("UPDATE orders SET orderstatus='".$status."' WHERE orderid='".$id."'");
$sentencia->execute();
header("location:orders.php");

?>