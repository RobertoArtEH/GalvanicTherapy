<?php include('conexion.php')?>
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
    <link rel="stylesheet" href="../css/style.css">
     <!-- Font Awesome -->
    
 </head>
<body >
    <?php require_once 'views/layout/header.php' ?>
    <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Usuarios</h4>
      <div class="row">
    

    
        <table class="table table table-striped table-bordered table-hover text-center">
            <form>
            <thead class="thead-dark" >
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Imagen</th>                  
                    <th>Usuario</th>                  
                    <th>Role</th>                  
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
                           <div class="btn btn-danger">
                       <a href="changestatususer.php?id=<?php echo $users['id'];?>"
                       > <i class="fa fa-sync "style="color :white"></i></a>  
               </div>   
                        </form>               
                     </td>
                      
                    </tr>
               <?php } ?> 
        </table>
        
    </div>
    </div>
    </div>
  <!-- Bootstrap JS -->
  <script src="../resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <script src="../resources/popper-1.15.0/popper.min.js"></script>
  <script src="../resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
</body>                                           
</html>
