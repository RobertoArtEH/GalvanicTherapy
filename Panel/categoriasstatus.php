<?php
include 'conexion.php';
$id=$_POST['id'];
$senten = $pdo->prepare("SELECT *FROM categories WHERE categoryid='".$id."'");
$senten->execute();
$row=$senten->fetch(PDO::FETCH_ASSOC);

    if($row['statuscategorie'] == 'activa')
    {
       $status='desactivada';
    }
    if($row['statuscategorie'] == 'desactivada')

    {
        $status='activa';
    }

$sentencia=$pdo->prepare ("UPDATE categories SET statuscategorie='".$status."' WHERE categoryid='".$id."'");
$sentencia->execute();
echo 'Status changed';
?>