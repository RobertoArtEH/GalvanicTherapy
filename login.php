<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="resources/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="img/brand/icon.png" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css"/>
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="resources/sweetalert2/sweetalert2.min.css">
    <title>Iniciar sesion</title>
</head>
<body>
  <?php require_once 'views/layout/header.php' ?>
  <div class="global-container">       
    <article class="formulario-login p-4">
      <section class="card container pt-2 register col-md-8 col-sm-8 col-lg-4">
        <div class="d-flex justify-content-center pt-2">
          <img class="logo-login" src="./img/brand/logo.png">
        </div>
        <form class="content-form needs-validation" action="login.php" method="POST" name="formulario" id="formulario" autocomplete="off">
          <fieldset>
            <legend class="h4 text-center p-3">
              Iniciar sesion
            </legend>
            <form>
              <div id="login-alert" class="alert alert-danger d-none" role="alert"></div>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo electrónico o usuario</label>
                <input type="text" id="access" class="form-control form-control-sm" name="email" aria-describedby="emailHelp" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <a class="text-link" href="#" style="float:right;font-size:12px;">¿Olvidaste tu contraseña?</a>
                <input type="password" id="password" class="form-control form-control-sm" name="password" required>
              </div>
              <button type="submit" id="login-btn" class="btn btn-dark boton-iniciar btn-block">Iniciar sesión</button>
              <div class="sign-up p-4 text-center">
                ¿No tienes una cuenta? <a class="text-link" href="registro.php">Crear una</a>
              </div>
            </form>
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
  <!-- Scripts -->
  <script src="js/search.js"></script>
  <script src="js/form.js"></script>
</body>
</html>