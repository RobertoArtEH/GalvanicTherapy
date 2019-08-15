<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Panel</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../resources/bootstrap-4.3.1/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="img/brand/icon.png" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="../css/style.css"/>
</head>
<body class="bg-admin">
  <?php require_once 'views/layout/header-idx.php' ?>
  <nav class="admin-sections tbg-white">
    <ul class="ul-sections d-flex my-4">
      <li>
        <a href="users.php">
          <article class="section-square section-audit">
            <!-- <div>
              <h4 class="mini-title">Usuarios</h4>
            </div> -->
          </article>
        </a>
      </li>
      <li>
        <a href="categorias.php">
          <article class="section-square section-audit">
            <!-- <h4>Categorias</h4> -->
          </article>
        </a>
      </li>
      <li>
        <a href="productos.php">
          <article class="section-square section-products">
            <!-- <h4>Productos</h4> -->
          </article>
        </a>
      </li>
      <li>
        <a href="orders.php">
          <article class="section-square section-orders">
            <!-- <h4>Ordenes</h4> -->
          </article>
        </a>
      </li>
      <li>
        <a href="auditoria.php">
          <article class="section-square section-audit">
            <!-- <h4>Auditoria</h4> -->
          </article>
        </a>
      </li>
      <li>
        <a href="#">
          <article class="section-square section-audit">
            <!-- <h4>Reportes</h4> -->
          </article>
        </a>
      </li>
    </ul>
  </nav>
  <!-- Bootstrap JS -->
  <script src="../resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <script src="../resources/popper-1.15.0/popper.min.js"></script>
  <script src="../resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
</body>
</html>