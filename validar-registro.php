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

    //Validar correo existente
    $emailQuery = 'SELECT * FROM users WHERE email=? LIMIT 1';
    $stmt = $conexion -> prepare($emailQuery);
    $stmt -> execute([$email]);
    $emailCount = $stmt -> rowCount();

    if($emailCount > 0) {
      echo 'correo-existente';
      exit();
    }

    //Validar usuario existente
    $userQuery = 'SELECT * FROM users WHERE username=? LIMIT 1';
    $stmt = $conexion -> prepare($userQuery);
    $stmt -> execute([$user]);
    $userCount = $stmt -> rowCount();

    if($userCount > 0) {
      echo 'user-existente';
      exit();
    }

    //Registrar usuario
    $sql = 'INSERT INTO users(first_name, last_name, email, birthday, username, pass) 
              VALUES(?, ?, ?, ?, ?, ?)';
      
    $stmt = $conexion -> prepare($sql);
    $result = $stmt -> execute([$nombre, $apellidos, $email ,$f_nacimiento, $user, $pass]);

    if($result) {
      echo 'success';
    } else {
      echo 'error';
    }
  } else {
    echo 'no-data';
  }
?>