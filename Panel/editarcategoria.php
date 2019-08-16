<?php
include 'conexion.php';
$id=$_GET['id'];
$senten = $pdo->prepare("SELECT *FROM categories WHERE categoryid='".$id."'");
$senten->execute();
$row=$senten->fetch(PDO::FETCH_ASSOC);

    if($row['statuscategorie'] == 'activado')
    {
       $status='desactivado';
    }
    if($row['statuscategorie'] == 'desactivado')

    {
        $status='activado';
    }

$sentencia=$pdo->prepare ("UPDATE categories SET statuscategorie='".$status."' WHERE categoryid='".$id."'");
$sentencia->execute();
header("location:categorias.php");
?>