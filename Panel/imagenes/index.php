<?php
session_start();
$variable=$_SESSION['user']; 
$sesion =$variable["role"];
var_dump($sesion);
if($sesion!="admin")
{
  header('location:../index.php');
}
?>
