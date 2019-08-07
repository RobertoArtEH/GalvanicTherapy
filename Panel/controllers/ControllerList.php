<?php
declare(strict_types=1);
require_once '../models/Productos.php';
$termino=(isset($_POST['termino']))?$_POST['termino']:"";
$producto= new Productos();
$data   =array();
// PAGINACION
$paginacion =array();
$pagina =$_POST['pagina']??1;
// isset($_POST['pagina'])?$_POST['pagina']?1; ESTO ES LO MISMO QUE ??1
$paginacion=$producto->Paginacion();
$filasTotal=$paginacion['filasTotal'];
$filasPagina=$paginacion['filasPagina'];
$empezardesde=($pagina-1)*$filasPagina;
// capturar la busqueda,validar y guardar
// Si no esta vacio,regresa la busqueda,SI NO,REGRESA TODO
if($termino!=''){
$data=$producto->BusquedaProductos($termino);
}
else
{
    $data=$producto->getAll($empezardesde,$filasPagina);
}
echo $producto->MostrarTablaproductos($data);