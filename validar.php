<?php session_start();

if(isset($_POST)) {
  require("conexion.php");
  
  $access = $_POST['access'];
  $password = $_POST['password'];
  $password= hash('sha512',$password );

  $emailQuery = $conexion -> prepare('SELECT * FROM users WHERE email = :access  AND pass = :password');
  $emailQuery -> execute(array(':access'=>$access, ':password' =>$password));
  $emailResult = $emailQuery -> fetch();

  if($emailResult) {
    $_SESSION['email']= $access;
    $_SESSION['username']= $access;
    echo 'success';
    exit();
  }

  $userQuery = $conexion -> prepare('SELECT * FROM users WHERE username = :access AND pass = :password');
  $userQuery -> execute(array(':access'=>$access, ':password' =>$password));
  $userResult = $userQuery -> fetch();

  if($userResult) {
    $_SESSION['username']= $access;
    echo 'success';
    exit();
  } else {
    echo 'error';
  }
}
  
