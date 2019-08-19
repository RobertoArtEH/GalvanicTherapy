<?php
require('conexion.php');
//MostrarDatos
    $stmt= $conexion->prepare('SELECT * FROM products where productstatus = "activo" and productid =' .$_GET['productid']);
    $stmt->execute();
    $producto = $stmt ->fetchAll(PDO::FETCH_ASSOC);
    


 ?>