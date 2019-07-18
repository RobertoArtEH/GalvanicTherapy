<?php 
require('conexion.php');
$mensaje = '';
$user = $_POST['user'];
$nombre =$_POST['nombre'];
$apellidos =$_POST['apellidos'];
$f_nacimiento = $_POST['f_nacimiento'];
$email =$_POST['email'];
$pass = $_POST['pass'];

if (!empty ($_POST [ 'email' ]) &&  !empty ( $_POST [ 'pass' ]) && !empty($_POST['user']) 
&& !empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['f_nacimiento'])) {
$sql="INSERT INTO users(first_name, last_name,email,birthday,username, pass) 
VALUES(:nombre, :apellidos, :email, :f_nacimiento, :user, :pass)" ;
$stmt = $conexion->prepare($sql);
$stmt -> bindParam (":user" , $_POST ['user']);
$stmt -> bindParam (":nombre" , $_POST ['nombre']);
$stmt -> bindParam (":apellidos" , $_POST ['apellidos']);
$stmt -> bindParam (":f_nacimiento" , $_POST ['f_nacimiento']);
$stmt -> bindParam (":email" , $_POST ['email']);
$stmt -> bindParam (":pass" , $_POST ['pass']);

if ($stmt->execute()) {
    
    header('Location: index.php');
  } else {
    header('Location: registro.php');
  }
}else{
    header('Location: registro.php');
}

?>