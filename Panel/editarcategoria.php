<?php
include 'conexion.php';
$id=$_GET['id'];
$senten = $pdo->prepare("SELECT *FROM categories WHERE categoryid='".$id."'");
$senten->execute();
$row=$senten->fetch(PDO::FETCH_ASSOC);

    if($row['Status'] == 'activado')
    {
       $status='desactivado';
    }
    if($row['Status'] == 'desactivado')

    {
        $status='activado';
    }

$sentencia=$pdo->prepare ("UPDATE categories SET Status='".$status."' WHERE categoryid='".$id."'");
$sentencia->execute();
header("location:categorias.php");
?>