<?php

//Almacenamos el reporte a imprimir en una variable
ob_start();
require "InventarioProdu.php";
$html = ob_get_clean();

// incluir autoloader
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Opcional por si cambiaras la orientacion
$dompdf->setPaper('A4','landscape');

// Convertir HTML A PDF
$dompdf->render();


$dompdf->stream();