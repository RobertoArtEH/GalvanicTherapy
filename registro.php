<?php
  require('conexion.php');
  include 'validar-categorias.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="resources/bootstrap-4.3.1/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css"/>
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="resources/sweetalert2/sweetalert2.min.css">
</head>
<body>
  <?php require_once 'views/layout/header.php' ?>
  <div class="formulario-registro global-container">
    <article class="p-4">
      <section class="card container  register col-md-8 col-sm-8 col-lg-4">
        <div class="d-flex justify-content-center pt-4">
          <img class="logo-login" src="./img/brand/logo.png">
        </div>
        <form class="content-form needs-validation" action="registro.php" method="post" name="formulario" id="formulario" autocomplete="off">
          <fieldset>
            <legend class="h4 p-4 text-center">Ingresa tus datos</legend>
            <div class="form-group">
              <label>Usuario</label>
              <input type="text" id="user" name="user" class="form-control" required>
              <div class="invalid-feedback">
                El nombre de usuario ya existe.
              </div>
            </div>
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Apellidos</label>
              <input type="text" id="apellidos" name="apellidos" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Fecha de nacimiento</label>
              <input type="date" id="f_nacimiento" name="f_nacimiento" class="form-control" required>
            </div>
            <div class="form-group" id="group-email">
              <label>Correo electrónico</label>
              <input type="email" id="email" name="email" class="form-control" required>
              <div class="invalid-feedback">
                El correo electrónico ya existe.
              </div>
            </div>
            <div class="form-group">
              <label>Contraseña</label>
              <input type="password" id="pass" name="pass" class="form-control" required>
            </div>
            <div class="form-group text-center">
              <input  name="create" type="submit" id="registro" value="Registrarse" class="btn btn-dark registrarse-boton btn-block">
            </div>
            <div class="pb-4 text-center">
              ¿Ya tienes una cuenta? <a class="text-link" href="login.php">Inicia sesión</a>
            </div>
          </fieldset>
        </form>
      </section>
    </article>
  </div>
  <?php require_once 'views/layout/footer.php' ?>
  <!-- Bootstrap JS -->
  <script src="resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <script src="resources/popper-1.15.0/popper.min.js"></script>
  <script src="resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
  <!-- Sweetalert -->
  <script src="resources/sweetalert2/sweetalert2.min.js"></script>
  <!-- Scripts -->
  <script src="js/search.js"></script>
  <script src="js/form.js"></script>
</body>
</html>
