<?php 
include('index.php');
?>
<?php
include('models/Conexion.php');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>   
</head>
<body>

<!-- Contenedor principal -->

<div class="container">
<h3 class="text-uppercase text-center mt-2">Productos</h3>
<!-- BOTON AÑADIR,MODAL -->
<div class="form-group">
<button  id="btn_insertar" title="insertar nuevo producto"  data-toggle="modal" data-target="#ModalProductos"
class="btn btn-primary">Crear <i class="fa fa-plus"></i></button>
</div>

<!-- Input Busqueda -->
<div class="form-group">
            <input type="text" id="txt_busqueda" class="form-control" placeholder="Buscar.....">
</div>

<!-- Vista Productos(Tabla) -->
<div id="div_tabla">

</div>
<!-- Fin vista productos  -->

<!-- Paginacion -->
<div class="d-flex justify-content-center paginas">
<nav aria-label="Page navigation example" class="">
<ul class="pagination" id="pagination">

</ul>
</nav>

</div>
<!-- Fin paginacion -->
</div>
<!-- Fin cuadro principal -->

<!-- Modal productos -->
<div class="modal fade" id="ModalProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
            <!-- Mostrar la alerta -->
            <div id="alerta"></div>

            <!-- Cabecera modal -->
            <div class="modal-header">
            <h5 class="modal-title h4 text-center text-uppercase">Nuevo producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <!-- FIN CABECERA MODAL -->

            <!-- MODAL BODY -->
            <div class="modal-body">
            <!-- GIF CARGANDO -->
            <div class="form-group d-none" id="gif">
                <label for=""> <img src="images/gif" alt="">Procesando....</label>
            </div>

            <!-- Campos ocultos -->
            <div class="form-group">
                <input type="hidden" id="opcion">
                <input type="hidden" id="txtid  ">
                </div>

                <div class="form-group"> <!-- ID -->
                <label for="">Codigo:</label>
                <input type="text" class="form-control" id="txtid" placeholder="Ingrese el codigo" requier="">
                </div> 

                <div class="form-group"> <!-- Nombre -->
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" id="txt_nombre" placeholder="Ingrese el nombre" requier="">
                </div>    

                <div class="form-group"> <!-- Descripcion  -->
                    <label for="">Descripcion:</label>
                    <input type="text" class="form-control" id="txt_descripcion" placeholder="Ingrese la descripcion" require="">
                </div>  
                <div class="form-group"> <!-- Content  -->
                    <label for="">Content</label>
                    <input type="text" class="form-control" id="txt_content"  placeholder="Ingrese el contentido" require="">
                </div>                    
                                        
                <div class="form-group"> <!-- Imagen -->
                    <label for="">Imagen</label>
                    <input type="text" class="form-control" id="txt_imagen" placeholder="Imagen"require="">
                </div>    

                <div class="form-group"> <!-- Precio-->
                    <label for="">Precio</label>
                    <input type="text" class="form-control" id="txt_precio" placeholder="Precio" require="">
                </div>   

                 <div class="form-group"> <!-- Stock-->
                    <label for="" class="control-label">Stock</label>
                    <input type="text" class="form-control" id="txt_stock" placeholder="Stock" require="">
                </div>      
               
                                        
                <div class="form-group"> <!-- Categoria -->
                    <label for="">Categoria</label>
                    <select class="form-control" id="txt_categoria">
                    <option value="">Seleccione</option>
                   <?php               
                   $ins=new Conexion();
                   $ot= $ins->Renglones("SELECT *FROM categories");
                   print_r($ot);
                   while($row=$ot->fetch(PDO::FETCH_ASSOC))
                   {
                       extract($row);
                       ?>
                       <option value="<?php echo $categoryid; ?>"><?php echo $categoryid; ?></option>
                       <?php
                   }
                     ?>
                        <!-- AQUI VA EL CODIGO DE CATEGORIAS         -->
                    </select>                    
                </div>
                </div>
                <!-- FIN BODY MODAL -->

                <!-- PIE MODAL -->
                 <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                 <button type="button" class="btn btn-primary" id="btn_guardar_cambios">Guardar cambios</button>
                 </div>
                 <!-- PIE MODAL FIN -->
</div>
</div>
</div>
<!-- FIN MODAL -->
<script src="js/articulo.js"></script>

</body>
</html>