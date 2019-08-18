<?php
include 'conexion.php';
$id=$_POST['id'];
$senten = $pdo->prepare("SELECT *FROM users WHERE id='".$id."'");
$senten->execute();
$row=$senten->fetch(PDO::FETCH_ASSOC);

    if($row['status'] == 'active')
    {
       $status='desactived';
    }
    if($row['status'] == 'desactived')

    {
        $status='active';
    }

$sentencia=$pdo->prepare ("UPDATE users SET status='".$status."' WHERE id='".$id."'");
$sentencia->execute();
echo 'Status changed';
?>