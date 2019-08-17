<?php
include 'config.php';
include 'conexion.php';
include 'validarcart.php';
?>
<?php
// RECUPERAR SESSION CARRITO
isset($_SESSION['CARRITO']);
// echo "<script>alert('Producto comprado...');</script>";
$pago=$_POST['pago'];
$user=$_SESSION['user'];
if ($_POST) {


      $total=0;
      foreach($_SESSION['CARRITO'] as $indice=>$producto ){
      $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
      }


      // insertar datos de orden
      $iduser=$user['id'];
      $resultado=$conexion->prepare("INSERT INTO `orders` (`orderid`, `usersid`, `total`, `orderdate`, `orderstatus`, `id_payment`) VALUES (NULL, $iduser, :total , NOW() , 'pendiente', :id_payment);");
      $resultado->bindParam(":total",$total);
      $resultado->bindParam(":id_payment",$pago);
      $resultado->execute();

      // insertar datos de pago
      $idVENTA=$conexion->lastInsertId();
      $resultado=$conexion->prepare("INSERT INTO `users_payments` (`id_cp`, `id_user`, `id_payment`) VALUES (NULL,$iduser ,$pago); ");
      $resultado->execute();



      // insertar datos de detalle de orden
      foreach($_SESSION['CARRITO'] as $indice=>$producto ){
      $id_producto=$producto['ID'];
      $precio=$producto['PRECIO'];
      $cantidad=$producto['CANTIDAD'];
      $resultado=$conexion->prepare("INSERT INTO `orderdetails` (`orderid`, `productid`, `unitprice`, `quantity`, `discount`) VALUES (:orderid , :productid , :unitprice, :quantity , '0');");
      
      $resultado->bindParam(":orderid",$idVENTA);
      $resultado->bindParam(":productid",$id_producto);
      $resultado->bindParam(":unitprice",$precio);
      $resultado->bindParam(":quantity",$cantidad);
      $resultado->execute();
      }

      // ELIMINAR SESSION CARRITO
      unset($_SESSION['CARRITO']);
      header('Location: index.php');
}
?>
