<?php
  require('conexion.php');
?>
<?php
  if(isset($_POST)) {
    $user          = $_POST['user'];
    $nombre        = $_POST['nombre'];
    $apellidos     = $_POST['apellidos'];
    $f_nacimiento  = $_POST['f_nacimiento'];
    $email         = $_POST['email'];
    $pass          = $_POST['pass'];
    $pass          = hash('sha512',$pass );

    //Validar correo existente
    $emailQuery = 'SELECT * FROM users WHERE email=? LIMIT 1';
    $stmtEmail = $conexion -> prepare($emailQuery);
    $stmtEmail -> execute([$email]);
    $emailCount = $stmtEmail -> rowCount();

    //Validar usuario existente
    $userQuery = 'SELECT * FROM users WHERE username=? LIMIT 1';
    $stmtUser = $conexion -> prepare($userQuery);
    $stmtUser -> execute([$user]);
    $userCount = $stmtUser -> rowCount();

    if($emailCount > 0 && $userCount > 0) {
      echo 'correo-user-error';
      exit();
    }

    if($emailCount > 0) {
      echo 'correo-existente';
      exit();
    }

    if($userCount > 0) {
      echo 'user-existente';
      exit();
    }

    //Registrar usuario
    $sql = 'INSERT INTO users(first_name, last_name, email, birthday, username, pass, role, status) 
              VALUES(:nombre, :apellidos, :email, :birthday, :username, :pass, :role, :status)';
      
    $stmtInsert = $conexion -> prepare($sql);
    $result = $stmtInsert -> execute([
      ':nombre'=>$nombre, 
      ':apellidos'=>$apellidos, 
      ':email'=>$email ,
      ':birthday'=>$f_nacimiento, 
      ':username'=>$user, 
      ':pass'=>$pass, 
      ':role'=>'user', 
      ':status'=>'active']);

    if($result) {
      echo 'success';
    } else {
      echo 'error';
    }
  } else {
    echo 'no-data';
  }
?>