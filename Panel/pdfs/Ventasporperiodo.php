<?php

require ('fpdf.php');
 require ('../conexion.php');
 $desde=$_POST['desde'];
 $hasta=$_POST['hasta'];

class PDF extends FPDF
{
    function Header()
    {
        global $de;
        global $ha;
        // LOGO
        $this->Image('logo.png',150,8,33);
        // Helvetica Bold 15
        $this->SetFont('helvetica','B',15);
        // Movernos a la derecha
        $this->Cell(60,30, utf8_decode('Reporte de ventas desde : ' .$de.' A '.$ha),0, 2 );
        $this->Cell(-60,-30);
        // Titulo
        // Salto de linea
        $this->Ln(10);
       $this->Cell(60,10,'Usuario',1,0,'C',0);
       $this->Cell(30,10,'OrderID',1,0,'C',0);
       $this->Cell(60,10,'Fecha',1,0,'C',0);
       $this->Cell(30,10,'Total',1,1,'C',0);
    }
 

    // PIE DE PAGINA
    function Footer()
    {   // posicion a 1.5cm del final
        $this->SetY(-15);
        // Helvetica Bold 15
        $this->SetFont('helvetica','B',15);
        // Numero de pagina
        $this->Cell(0,10, utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    }
}
// Clase a utilizar
$pdf = new PDF();
$de=$desde;
$ha=$hasta;
$pdf->SetTitle($de);
$pdf->SetTitle($ha);
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('courier','',16);
$senten = $pdo->prepare("SELECT *FROM orders 
INNER JOIN users 
on orders.usersid = users.id WHERE 
orderdate BETWEEN '$desde' AND '$hasta' 
");
$senten->execute();
$totalventas=0;
 while($row=$senten->fetch(PDO::FETCH_ASSOC))
 {
    $pdf->Cell(60,10,$row['first_name'],1,0,'C',0);
    $pdf->Cell(30,10,$row['orderid'],1,0,'C',0);
    $pdf->Cell(60,10,$row['orderdate'],1,0,'C',0);
    $pdf->Cell(30,10,$row['total'],1,1,'C',0);
    $totalventas+=$row['total'];
 }
 $pdf->Cell(0);
 $pdf->Cell(-150,10,'TOTAL',0,0,'C',0);
 $pdf->Cell(0);
 $pdf->Cell(-50,10,$totalventas,0,0,'C',0);

$pdf -> Output();




?>