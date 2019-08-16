<?php
require('conexion.php');
//MostrarDatos
    $stmt= $conexion->prepare('SELECT * FROM products where productid =' .$_GET['productid']);
    $stmt->execute();
    $producto = $stmt ->fetchAll();


 ?>