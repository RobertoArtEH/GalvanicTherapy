<?php
require_once '../models/Productos.php';
$prodcuto = new Producto();
$opcion = $_POST['opcion'];
$id= $_POST['id'];
$nombre= $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$imagen= $_POST['imagen'];
$content= $_POST['content'];
$precio= $_POST['precio'];
$stock= $_POST['stock'];
$categoria= $_POST['categoria'];

switch($opcion){
    case 'insertar':
    if(!empty($nombre) && !empty($descripcion) && !empty($imagen) && !empty($content)
     && !empty($precio) && !empty($stock) && !empty($categoria))
     {
         $prodcuto->insert($id,$nombre,$descripcion,$imagen,$content,$precio,$stock,$categoria);

     }else
     {
         echo 'VACIO';
     }
     break;
     case 'editar':
     break;
     case 'eliminar':
     break;
}
?>