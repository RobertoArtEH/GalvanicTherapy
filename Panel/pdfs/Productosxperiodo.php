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
        $this->SetFont('helvetica','B',12);
        // Movernos a la derecha
        $this->Cell(60,30, utf8_decode('Reporte de ventas desde : ' .$de.' A '.$ha),0, 2 );
        $this->Cell(-60,-30);
        // Titulo
        // Salto de linea
        $this->Ln(10);
       $this->Cell(50,10,'OrderDate',1,0,'C',0);
       $this->Cell(40,10,'Productname',1,0,'C',0);
       $this->Cell(25,10,'Quantity',1,0,'C',0);
       $this->Cell(40,10,'UnitPrice',1,0,'C',0);
       $this->Cell(40,10,'Subtotal',1,1,'C',0);

    }
 

    // PIE DE PAGINA
    function Footer()
    {   // posicion a 1.5cm del final
        $this->SetY(-15);
        // Helvetica Bold 15
        $this->SetFont('helvetica','B',12);
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
$pdf -> SetFont('helvetica','B',9);
//  OBTENER TOTAL PRODUCTOS 
$senten = $pdo->prepare("SELECT orders.orderdate,products.productname,orderdetails.unitprice,
orderdetails.quantity FROM products 
INNER JOIN orderdetails ON products.productid = orderdetails.productid
INNER JOIN orders ON orderdetails.orderid = orders.orderid
WHERE orderdate BETWEEN '$desde' AND '$hasta'
ORDER BY quantity DESC; ");


$senten->execute();
$totalventas=0;
$totalunidades=0;
$totalprecios=0;
 while($row=$senten->fetch(PDO::FETCH_ASSOC))
 {
    $pdf->Cell(50,10,$row['orderdate'],1,0,'C',0);
    $pdf->Cell(40,10,$row['productname'],1,0,'C',0);
    $pdf->Cell(25,10,$row['quantity'],1,0,'C',0);
    $pdf->Cell(40,10,$row['unitprice'],1,0,'C',0);
    $pdf->Cell(40,10,$row['unitprice']*$row['quantity'],1,1,'C',0);
    $totalventas+=$row['unitprice']*$row['quantity'];
    $totalprecios+=$row['unitprice'];
    $totalunidades+=$row['quantity'];
 }
 $pdf->Cell(0);
 $pdf->Cell(-240,10,'TOTAL',0,0,'C',0);
 $pdf->Cell(0);
 $pdf->Cell(-175,10,$totalunidades,0,0,'C',0);
 $pdf->Cell(0);
 $pdf->Cell(-110,10,$totalprecios,0,0,'C',0);
 $pdf->Cell(0);
 $pdf->Cell(-30,10,$totalventas,0,0,'C',0);

$pdf -> Output();




?>






