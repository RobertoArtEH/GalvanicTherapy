<?php
include 'config.php';
include 'conexion.php';
include 'validarcart.php';
?>

<?php
echo "<script>alert('Producto comprado...');</script>";
$pago=$_POST['pago'];
echo $username = $_SESSION['username'];
if ($_POST) {
      // $SID=session_id();
      $total=0;
      // $orden=5;
      foreach($_SESSION['CARRITO'] as $indice=>$producto ){
      $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
      // $idVENTA=$conexion->lastInsertId();
      }
      $resultado=$conexion->prepare("INSERT INTO `orders` (`orderid`, `usersid`, `total`, `orderdate`, `orderstatus`, `id_payment`)
      VALUES (NULL, '17', :total , NOW() , 'pendiente', :id_payment);");
      $resultado->bindParam(":total",$total);
      $resultado->bindParam(":id_payment",$pago);
      $resultado->execute();
      $idVENTA=$conexion->lastInsertId();

      foreach($_SESSION['CARRITO'] as $indice=>$producto ){
      $id_producto=$producto['ID'];
      $precio=$producto['PRECIO'];
      $cantidad=$producto['CANTIDAD'];
      $resultado=$conexion->prepare("INSERT INTO `orderdetails` (`orderid`, `productid`, `unitprice`, `quantity`, `discount`) 
      VALUES (:orderid , :productid , :unitprice, :quantity , '0');");
      
      $resultado->bindParam(":orderid",$idVENTA);
      $resultado->bindParam(":productid",$id_producto);
      $resultado->bindParam(":unitprice",$precio);
      $resultado->bindParam(":quantity",$cantidad);
      $resultado->execute();
    }
}

?>
