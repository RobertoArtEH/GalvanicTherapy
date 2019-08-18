<?php
require 'conexion.php';

 if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];

  $sentencia=$conexion ->prepare('SELECT * from products  inner join orderdetails
  on products.productid = orderdetails.productid inner join orders 
  on orderdetails.orderid = orders.orderid inner join users 
  on users.id = orders.usersid inner join payments 
  on id_payment = id_payment_method where users.username = :username order by orders.orderid asc');
  $sentencia ->execute(array(':username'=> $username));
  $compra = $sentencia ->fetchAll();

}

