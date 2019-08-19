
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
        <a class="tw" href="users.php">
          <article class="section-square section-users d-flex align-items-end">
            <div class="section-banner text-center">
              <h5 class="m-0">Usuarios</h5>
            </div>
          </article>
        </a>
      </li>
      <li>
        <a class="tw" href="categorias.php">
          <article class="section-square section-category d-flex align-items-end">
          <div class="section-banner text-center">
              <h5 class="m-0">Categorias</h5>
            </div>
          </article>
        </a>
      </li>
      <li>
        <a class="tw" href="products.php">
          <article class="section-square section-products d-flex align-items-end">
          <div class="section-banner text-center">
              <h5 class="m-0">Productos</h5>
            </div>
          </article>
        </a>
      </li>
      <li>
        <a class="tw" href="orders.php">
          <article class="section-square section-orders d-flex align-items-end">
          <div class="section-banner text-center">
              <h5 class="m-0">Ordenes</h5>
            </div>
          </article>
        </a>
      </li>
      <li>
        <a class="tw" href="auditoria.php">
          <article class="section-square section-audit d-flex align-items-end">
          <div class="section-banner text-center">
              <h5 class="m-0">Auditoria</h5>
            </div>
          </article>
        </a>
      </li>
      <li>
        <a class="tw" href="#">
          <article class="section-square section-reportes d-flex align-items-end">
          <div class="section-banner text-center">
              <h5 class="m-0">Reportes</h5>
            </div>
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