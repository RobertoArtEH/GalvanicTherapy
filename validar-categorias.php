<?php
require('conexion.php');
      $consultacategorias = $conexion->prepare('SELECT * FROM categories');
      $consultacategorias -> execute();
      $resultado= $consultacategorias->fetchAll(PDO::FETCH_ASSOC);

      

      