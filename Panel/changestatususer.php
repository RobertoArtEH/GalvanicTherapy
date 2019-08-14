<?php
include 'conexion.php';
$id=$_GET['id'];
$senten = $pdo->prepare("SELECT *FROM users WHERE id='".$id."'");
$senten->execute();
$row=$senten->fetch(PDO::FETCH_ASSOC);

    if($row['status'] == 'activo')
    {
       $status='bloqueado';
    }
    if($row['status'] == 'bloqueado')

    {
        $status='activo';
    }

$sentencia=$pdo->prepare ("UPDATE users SET status='".$status."' WHERE id='".$id."'");
$sentencia->execute();
header("location:users.php");
?>