<?php session_start();

if(isset($_POST)) {
  require("conexion.php");
  
  $access = $_POST['access'];
  $password = $_POST['password'];
  $password= hash('sha512',$password );

  $Query = $conexion -> prepare('SELECT * FROM users WHERE email OR username = :access  AND pass = :password');
  $Query -> execute(array(':access'=>$access, ':password' =>$password));
  $Result = $Query -> fetch(PDO::FETCH_ASSOC);

  if($Query) {
    $_SESSION['username'] = $access;
    echo 'success';
    exit();
  }
}

//   $userQuery = $conexion -> prepare('SELECT * FROM users WHERE username = :access AND pass = :password');
//   $userQuery -> execute(array(':access'=>$access, ':password' =>$password));
//   $userResult = $userQuery -> fetch();

//   if($userResult) {
//     $_SESSION['username']= $access;
//     echo 'success';
//     exit();
//   } else {
//     echo 'error';
//   }
// }
  
