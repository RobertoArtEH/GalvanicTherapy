<?php
require('conexion.php');
//Categorias
    $consulta = $conexion->prepare('SELECT * FROM categories');
    $consulta -> execute();
    $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);

//tendencias
    $sqltrends = $conexion->prepare('SELECT * from orders left join orderdetails on orders.OrderID=OrderDetails.OrderID left join products on OrderDetails.ProductID =
    products.ProductID left join Categories on products.CategoryID = Categories.CategoryID where unitsinstock >0 group by products.productname order by orders.OrderID desc');
    $sqltrends -> execute();
    $tendencias= $sqltrends->fetchAll(PDO::FETCH_ASSOC);

//lonuevo
    $sqlnew = $conexion->prepare('SELECT * from products where unitsinstock >0 order by productid desc');
    $sqlnew-> execute();
    $new= $sqlnew->fetchAll(PDO::FETCH_ASSOC);
      