<?php include('conexion.php')?>
<?php
$senten = $pdo->prepare("SELECT *FROM users inner join orders 
on users.id = orders.usersid inner join payments 
on id_payment = id_payment_method");
$senten->execute();
$orders=$senten->fetchAll(PDO::FETCH_ASSOC);
// OBTENER TODOS LOS PRODUCTOS 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/a2a999c481.js"></script>

     <!-- Font Awesome -->
    
 </head>
<body >
<?php require_once 'views/layout/header.php' ?>
<!-- <?php require_once '../views/components/mini-banner.php' ?> -->
    <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Ordenes</h4>
      <div class="row">
      <div class="container">
      <div style="text-align: right;width:101.4%"> 
      <a href="pdfs/Reporteorders.php" target="_blank"><button class="btn btn-danger"> Reporte <i class="fas fa-file-pdf fa-lg"style="color:white"></i></button></a>         
        </div>
      </div>
        <table class="table table table-striped table-bordered table-hover text-center">
            <form>
            <thead class="thead-dark" >
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Total</th>
                    <th>Fecha</th>                  
                    <th>Status</th>                  
                    <th>Método de pago</th>                  
                    <th>Accion</th>                  
                                      
                </thead>
               <?php foreach($orders as $ord){?>
                    <tr>
                    <td>
                    <button type="button" value="<?php echo $ord['orderid'];?>" class="enviar btn btn-white"  data-toggle="modal" data-target=".bd-example-modal-lg"
                    class="btn id btn-white order"><?php echo $ord['orderid'];?>
                    <i class="far fa-eye" style="color :blue;" ></i></button>
                    </td>
                    <td><?php echo $ord['first_name'];?></td>
                        <td>$<?php echo $ord['total'];?></td>
                        <td><?php echo $ord['orderdate'];?></td>
                        <td><div class="btn status"><?php echo $ord['orderstatus'];?></div></td>
                        <td><?php echo $ord['method_payment'];?></td>
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                        <td class="accion"><div class="row justify-content-center">
                           <a  href="PaymentChange.php?id=<?php echo $ord['orderid'];?>"
                            class=""> <div class="col">
                            <i class="ban fa fa-sync" style="color :info"></i></td>
                            </div>
                            </a>
                        </div>
                    <br>
               </td>
                    </tr>
               <?php } ?>
    </table>
    </div>
    </div>
    </div>

 <!-- MODAL LARGE -->
 <!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- FORM -->
      <?php include('conexion.php')?>
      <table id="tablainfo" class="table table table-striped table-bordered table-hover text-center">
            <form>
            <thead class="thead-dark" >
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>                  
                    <th>quantity</th>                  
                    <th>Total</th>                 
                </thead>
               
    </table>
  
    </div>
    
         </div>
         </div>
         </div>
         </div>
         </div>
    

</body> 
<script src="js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrapstor.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/orders.js"></script>
</html>
<script>

$(document).ready(function () {
    $('.status').each(function(indice,valor) {
      if($(this).text()== 'completado')
      {
     $(this).addClass('btn-success');
      }
      else if($(this).text()== 'pendiente')
        $(this).addClass('btn-warning');
        else if($(this).text()== 'cancelado')
        $(this).addClass('btn-danger');
      });  
      function limpiar(prod)
      {
        $(prod.data).each(function(index,value){
          $("#tablainfo td").remove();
          $("#tablainfo td").remove();
          $("#tablainfo td").remove();
          $("#tablainfo td").remove();
          $("#tablainfo td").remove();
          $("#tablainfo td").remove();
          $("#tablainfo td").remove();

        });

      }

      $('.enviar').each(function(indice,valor){
        $(this).click(function(){
         let id= $(this).val();
         $.post('orderdetails.php',{id},function(response){
           console.log(response);
            limpiar(response);
           $(response.data).each(function(index,value){
            $("#tablainfo").append('<tr></tr>');
            $("#tablainfo").append('<td><img class="img-thumbnail"width="100px" src="imagenes/default.jpg"></td>');
            $("#tablainfo").append('<td>' + value.productname + '</td>');
            $("#tablainfo").append('<td>' + value.description + '</td>');
            $("#tablainfo").append('<td>' + value.price + '</td>');
            $("#tablainfo").append('<td>' + value.quantity + '</td>');
            $("#tablainfo").append('<td>' + value.total + '</td>');

           });
            // $("#tabla td").remove();
            // $('.usuarios').removeClass('invisible');
            // $('#tabla').append('<td>'+user.id+'</td>');
            // $('#tabla').append('<td>'+user.first_name+'</td>');
            // $('#tabla').append('<td>'+user.last_name+'</td>');
            // $('#tabla').append('<td><img class="img-thumbnail"width="100px" src="imagenes/'+user.imageprofile+'"></td>');
        })

        //   $(".order" ).click(function() {
        // let id = $(this).text();
        // $.post('orderproducts.php',{id},function(response){
        //    console.log(response);


        })
      });
    
});

</script>
