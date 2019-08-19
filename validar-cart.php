<?php
session_start();

if (isset($_POST)) {
  require('conexion.php');

  $productName = $_POST['productName'];
  $quantity = $_POST['quantity'];

  if($_SESSION['CARRITO']) {
    for ($i=0; $i < sizeof($_SESSION['CARRITO']) ; $i++) {
      if($_SESSION['CARRITO'][$i]['NOMBRE'] == $productName) {
        $quantity += $_SESSION['CARRITO'][$i]['CANTIDAD'];
        break;
      }
    }
  }

  $stmt = $conexion -> prepare('SELECT productid, productname, picture, price
                                FROM products WHERE productname = :productname 
                                AND unitsinstock >= :quantity');
  $stmt -> execute([':productname'=>$productName, ':quantity'=>$quantity]);
  $stmtResult = $stmt -> fetch();

  if($stmtResult) {
    $quantity = $_POST['quantity'];

    $stmt = $conexion -> prepare('SELECT * FROM products WHERE productname = :productname');
    $stmt -> execute([':productname'=>$productName]);
    $stmtResult = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    $product = $stmtResult[0];

    $productid = $product['productid'];
    $picture = $product['picture'];
    $price = $product['price'];

    echo 'success';

    if(!isset($_SESSION['CARRITO'])) {
      $producto = array(
        'ID'=>$productid,
        'IMAGEN'=>$picture,
        'NOMBRE'=>$productName,
        'PRECIO'=>$price,
        'CANTIDAD'=>$quantity
      );
      $_SESSION['CARRITO'][0]=$producto;
    } else {
      $found = false;
      for ($k=0; $k < sizeof($_SESSION['CARRITO']) ; $k++) { 
        if ($productid == $_SESSION['CARRITO'][$k]['ID']) {
          $_SESSION['CARRITO'][$k]['CANTIDAD']+= $quantity;
          $found = true;
          break;
        }
      }

      if (!$found) {
        $_SESSION['CARRITO'][sizeof($_SESSION['CARRITO'])] = array 
        (
          'ID'=>$productid,
          'IMAGEN'=>$picture,
          'NOMBRE'=>$productName,
          'PRECIO'=>$price,
          'CANTIDAD'=>$quantity
        );
      } 
    }
  } else {
    echo 'error';
  }
}
