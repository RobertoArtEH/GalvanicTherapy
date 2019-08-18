<?php
require 'conexion.php';

 if(isset($_SESSION['username'])){
//   $sentenciaId = $conexion -> prepare('SELECT id FROM users WHERE username = '.$_SESSION['username']);
//   $sentenciaId -> execute();
//   $resultId = $sentenciaId -> fetchAll();
  $username = $_SESSION['username'];

  $sentencia=$conexion ->prepare('SELECT * from products  inner join orderdetails
  on products.productid = orderdetails.productid inner join orders on orderdetails.orderid = orders.orderid inner join users on users.id = orders.usersid where users.username = :username');
  $sentencia ->execute(array(':username'=> $username));
  $compra = $sentencia ->fetchAll();

}

