<?php session_start();

if(isset($_POST)) {
  require("conexion.php");
  
  $access = $_POST['access'];
  $password = $_POST['password'];
  $password= hash('sha512',$password );

  // Verificar contraseña
  $accessQuery = $conexion -> prepare('SELECT * FROM users WHERE username = :access AND pass = :password');
  $accessQuery -> execute(array(':access'=>$access, ':password' =>$password));
  $accessResult = $accessQuery -> fetch(PDO::FETCH_ASSOC);

  // Verificar status
  $statusQuery = $conexion -> prepare('SELECT * FROM users WHERE email OR username = :access AND status = "active" ');
  $statusQuery -> execute(array(':access'=>$access));
  $statusResult = $statusQuery -> fetch();
  
  // Verificar role
  $roleQuery = $conexion -> prepare('SELECT * FROM users WHERE email OR username = :access AND role = "user" ');
  $roleQuery -> execute(array(':access'=>$access));
  $roleResult = $roleQuery -> fetch();

  // Usuario y contraseña correcta
  if($accessResult) {
    // Status activo
    if($statusResult) {
      // Rol usuario
      if($roleResult) {
        $_SESSION['username'] = $access;
        $_SESSION['user'] = $accessResult;

        echo 'user-success';
        exit();
      }
      // Rol administrador
      echo 'admin-success';
      exit();
    }
    // Status inactivo
    echo 'inactive';
    exit();
  }
  // Usuario o contraseña incorrecta
  echo 'error';
}
