<?php
require('conexion.php');
//Categorias
    $consulta = $conexion->prepare('SELECT * FROM categories WHERE statuscategorie = "activa"');
    $consulta -> execute();
    $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);

//tendencias
    $sqltrends = $conexion->prepare('SELECT * from orders left join orderdetails on orders.orderid=orderdetails.orderid left join products on orderdetails.productid =
    products.productid left join categories on products.categoryid = categories.categoryid where unitsinstock >0 group by products.productname order by orders.orderid desc LIMIT 0,9');
    $sqltrends -> execute();
    $tendencias= $sqltrends->fetchAll(PDO::FETCH_ASSOC);

//lonuevo
    $sqlnew = $conexion->prepare('SELECT * from products where unitsinstock >0 order by productid desc LIMIT 0,9');
    $sqlnew-> execute();
    $new= $sqlnew->fetchAll(PDO::FETCH_ASSOC);
      