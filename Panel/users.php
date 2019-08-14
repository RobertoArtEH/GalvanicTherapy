<?php include('conexion.php')?>
<?php include('barra.php')?>
<?php
$senten = $pdo->prepare("SELECT *FROM users");
$senten->execute();
$listausers=$senten->fetchAll(PDO::FETCH_ASSOC);
// OBTENER TODOS LOS PRODUCTOS 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
     <!-- Font Awesome -->
    
 </head>
<body >
    <div class="container">
    <h1 class="text-center text-info">Usuarios</h1>
    </div>



</form>
<!-- FIN DEL FORM -->
    
    <div id="crudarticulos" class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <thead class="table-primary" >
                    <th>ID</th>
                    <th>First_Name</th>
                    <th>Last_Name</th>
                    <th>Imageprofile</th>                  
                    <th>Username</th>                  
                    <th>role</th>                  
                    <th>Status</th>                  
                    <th>Accion</th>                  
                </thead>
               <?php foreach($listausers as $users){?>
                    <tr >
                    <td ><?php echo $users['id'];?></td>
                    <td ><?php echo $users['first_name'];?></td>
                        <td><?php echo $users['last_name'];?></td>
                        <td><img class="img-thumbnail"width="100px" src="imagenes/<?php echo $users['imageprofile'];?>"></td>
                        <td><?php echo $users['username'];?></td>
                        <td><?php echo $users['role'];?></td>
                        <td><?php echo $users['status'];?></td>
                        <!-- FORMULARIO OCULTO PARA ENVIAR LA INFORMACION -->
                        <td>
                           <button class="btn btn-danger">
                       <a href="changestatususer.php?id=<?php echo $users['id'];?>"
                       > <i class="fa fa-sync "style="color :white"></i></a>  
                       </button>                  
                     </td>
                      
                    </tr>
               <?php } ?>

            
    </table>
</div>
</div>
</body>                                           
</html>
