<?php
session_start();
//MetodosDePago
$stmt= $conexion->prepare('SELECT * FROM payments');
$stmt->execute();
$pago = $stmt ->fetchAll();

//validacion
$mensaje = "";

if (isset($_POST['btnAccion'])) {
  switch ($_POST['btnAccion']) {
    
    case 'Agregar':
    $proId=openssl_decrypt($_POST['id'],COD,KEY);
    $cant = 1;

    if(isset($_SESSION['CARRITO'])) {
      for ($i=0; $i < sizeof($_SESSION['CARRITO']) ; $i++) {
        if($_SESSION['CARRITO'][$i]['ID'] == $proId) {
          $cant += $_SESSION['CARRITO'][$i]['CANTIDAD'];
          break;
        }
      }
    }

    $stmt = $conexion -> prepare('SELECT productid, productname, picture, price
                                FROM products WHERE productid = :productid 
                                AND unitsinstock >= :quantity');
    $stmt -> execute([':productid'=>$proId, ':quantity'=>$cant]);
    $stmtResult = $stmt -> fetch();

    if(!$stmtResult) {
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { Swal.fire({
        type: "error",
        title: "¡No hay productos disponibles!",
        showConfirmButton: false,
        timer: 2000
      });';
      echo '}, 1000);</script>';
      break;
    }
      
    if (is_numeric(  openssl_decrypt($_POST['id'],COD,KEY  ))) {
        $ID=openssl_decrypt($_POST['id'],COD,KEY);
        $mensaje.="OK ID correcto".$ID."<br/>";
      }else {
        $mensaje.="Upps...  ID incorrecto".$ID."<br/>";
      }
      if (is_string(openssl_decrypt($_POST['picture'],COD,KEY))) {
        $IMAGEN=openssl_decrypt($_POST['picture'],COD,KEY);
        $mensaje.="Ok nombre".$IMAGEN."<br/>";
      }else {$mensaje.="Upps... algo pasa con el nombre"."<br/>"; break;}

      if (is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) {
        $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
        $mensaje.="Ok nombre".$NOMBRE."<br/>";
      }else {$mensaje.="Upps... algo pasa con el nombre"."<br/>"; break;}


      if (is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))) {
        $PRECIO = openssl_decrypt($_POST['precio'],COD,KEY);
        $mensaje.="Ok precio".$PRECIO."<br/>";
      }else {$mensaje.="Upps... algo pasa con el precio"."<br/>"; break;}


      if (is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))) {
        $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
        $mensaje.="Ok cantidad".$CANTIDAD."<br/>";
      }
      else {$mensaje.="Upps... algo pasa con la cantidad"."<br/>";break;}

      if (!isset($_SESSION['CARRITO'])) {
        $producto=array(
          'ID'=>$ID,
          'IMAGEN'=>$IMAGEN,
          'NOMBRE'=>$NOMBRE,
          'PRECIO'=>$PRECIO,
          'CANTIDAD'=>$CANTIDAD
        );
        $_SESSION['CARRITO'][0]=$producto;
      }else {
        $found = false;
        for ($k=0; $k < sizeof($_SESSION['CARRITO']) ; $k++) { 
          if ($ID == $_SESSION['CARRITO'][$k]['ID']) {
            $_SESSION['CARRITO'][$k]['CANTIDAD']+= $CANTIDAD;
            $found = true;
            break;
          }
        }

        if (!$found) {
          $_SESSION['CARRITO'][sizeof($_SESSION['CARRITO'])] = array 
          (
            'ID'=>$ID,
            'IMAGEN'=>$IMAGEN,
            'NOMBRE'=>$NOMBRE,
            'PRECIO'=>$PRECIO,
            'CANTIDAD'=>$CANTIDAD
          );
        }

        
      }
      // var_dump($_SESSION['CARRITO']);

      // $mensaje=print_r($_SESSION,true);

    break;
    case "Eliminar":
    if (is_numeric(  openssl_decrypt($_POST['id'],COD,KEY  ))) {
      $ID=openssl_decrypt($_POST['id'],COD,KEY);

      foreach($_SESSION['CARRITO'] as $indice=>$producto ){
        if ($producto['ID']==$ID) {
          unset($_SESSION['CARRITO'][$indice]);
        }
      }

      
    }else {
      $mensaje.="Upps...  ID incorrecto".$ID."<br/>";
    }
      break;

  }
}
?>