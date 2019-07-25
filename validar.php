<?php session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
  $email = $_POST['email'];
  $password = $_POST['password'];
  require("conexion.php");
  $consulta = $conexion->prepare('SELECT * FROM users WHERE email = :email AND pass = :password');
  $consulta -> execute(array(':email'=>$email, ':password' =>$password));
  $message = '';
  $resultado= $consulta->fetch();
  if($resultado){
    $_SESSION['email']= $email;
    header('Location: index.php');
    
    
  }else{
    header('Location: login.php');
  }

}
  
