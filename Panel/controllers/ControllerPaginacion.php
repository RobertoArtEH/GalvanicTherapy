<?php
require_once '../models/Productos.php';
$producto = new Productos();
$paginacion=array();
$paginacion =$producto->Paginacion();
$filasTotal=$paginacion['filasTotal'];
$filasPagina=$paginacion['filasPagina'];
echo ceil($filasTotal/$filasPagina);
?>