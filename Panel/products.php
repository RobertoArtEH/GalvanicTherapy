<?php include('conexion.php')?>
<?php include('barra.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <link rel="stylesheet" href="css/bootstrapstor.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
     <!-- Font Awesome -->
</head>
<body>
<?php require_once '../views/components/mini-banner.php' ?>
  <div class="container content-container">
      <h4 class="mb-4 mt-2 text-center">Productos</h4>
</div>
  <div class="row">
    <div class="container">
    <h3>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">
           <i class="fa fa-plus" height="50px"> </i>Agregar
        </button>
    </h3>
    </div>
<table class="table table table-striped table-bordered table-hover text-center">
            <thead class="thead-dark" >
                <tr>
                <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>                  
                    <th>Content</th>                  
                    <th>Categoria</th>                  
                    <th>Precio</th>                  
                    <th>Stock</th>                  
                    <th>status</th>                  
                    <th>Accion</th>
                </tr>              
                </thead>
                <!-- LISTA PRODUCTOS -->
                <tbody id="products">
                        
                </tbody>
</table>
</body>
<script src="../resources/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<script src="../resources/popper-1.15.0/popper.min.js"></script>
<script src="../resources/bootstrap-4.3.1/js/bootstrap.min.js"></script>
</html>
<script>
$(document).ready(function(){

$(document).on('click','#change',function(){
        Swal.fire({
  title: 'Desea cambiar el status?',
  text:'Esto afectara la visualizacion de sus productos.',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si!',
  cancelButtonText: 'No'
}).then((result) => {
  if (result.value) {
    let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productid');
        $.post('producstatus.php',{id},function(response){
            Swal.fire(
      response,
      '',
      'success'
    )
        })
  }
})
})

$.ajax({
    type: "GET",
    url: "productslist.php",
    success: function (response) {
        console.log(response);
        let template ='';
           $(response.data).each(function(index,value){
               template+=`
               <tr productid="${value.productid}">
               <td>${value.productid}</td>
               <td>${value.productname}</td>
                    <td>${value.description}</td>
                    <td><img class="img-thumbnail"width="100px" src="imagenes/${value.picture}"></td>
                    <td>${value.content}</td>
                    <td>${value.categoryid}</td>
                    <td>${value.price}</td>
                    <td>${value.unitsinstock}</td>
                    <td>${value.productstatus}</td>
                    <td><button class="btn btn-warning"><i class="fa fa-edit" style="color :white"></i></button><button id="change" class="btn btn-primary"><i class="fa fa-sync " style ="color :white"></i></button></td>
                   </tr> `
                });
                $('#products').html(template);
        
              
        
    }
});

});
</script>