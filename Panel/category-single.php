<?php
include 'conexion.php';
$id=$_POST['id'];
$senten = $pdo->prepare("SELECT *FROM categories WHERE
categoryid = $id");
// 'SELECT * from products  inner join orderdetails
//   on products.productid = orderdetails.productid inner join orders on orderdetails.orderid = orders.orderid inner join users on users.id = orders.usersid
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
   $data["data"][]=$row;
}
header('Content-type: application/json');
echo json_encode($data);

// $sentencia=$pdo->prepare ("UPDATE categories SET statuscategorie='".$status."' WHERE categoryid='".$id."'");
// $sentencia->execute();
// header("location:categorias.php");
?>