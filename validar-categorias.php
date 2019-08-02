<?php
require('conexion.php');
$consulta = $conexion->prepare('SELECT * FROM categories');
$consulta -> execute();
$resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);

      

      