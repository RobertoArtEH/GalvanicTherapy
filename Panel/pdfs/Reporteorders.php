<?php

require ('fpdf.php');
 require ('../conexion.php');
 $senten = $pdo->prepare("SELECT SUM(total) AS Suma FROM orders");
 $senten->execute();
 while($row=$senten->fetch(PDO::FETCH_ASSOC))
 {
    $suma=$row['Suma'];
 }
//  OBTENER TOTAL ORDENES 
$senten = $pdo->prepare("SELECT COUNT(*) as C FROM orders
WHERE orderstatus='completado'");
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
   $completos=$row['C'];
}
$senten = $pdo->prepare("SELECT COUNT(*) as C FROM orders
WHERE orderstatus ='cancelado'");
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
   $cancelados=$row['C'];
}
$senten = $pdo->prepare("SELECT COUNT(*) as C FROM orders
WHERE orderstatus ='pendiente'");
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
   $pendientes=$row['C'];
}
class PDF extends FPDF
{
    function Header()
    {
        global $total;
        global $total2;
        global $total3;
        // LOGO
        $this->Image('pingu.png',150,8,33);
        // Helvetica Bold 15
        $this->SetFont('helvetica','B',12);
        // Movernos a la derecha
        $this->Cell(60);
        $this->Cell(60,10, utf8_decode('Reporte de Ordenes'),0, 2 );
        $this->Cell(-60,-30);
        $this->Cell(0,20, utf8_decode('Ordenes canceladas : '. $total2),0, 2 , 'L' );
        $this->Cell(0,0, utf8_decode('Ordenes completas : '. $total),0, 2 , 'L' );
        $this->Cell(0,20, utf8_decode('Ordenes pendientes  : '. $total3),0, 2 , 'L' );

        // $this->Cell(60);
        // Titulo
        // Salto de linea
        $this->Ln(10);
       $this->Cell(15,10,'ID',1,0,'C',0);
       $this->Cell(30,10,'Usuario',1,0,'C',0);
       $this->Cell(30,10,'fecha',1,0,'C',0);
       $this->Cell(30,10,'orderstatus',1,0,'C',0);
       $this->Cell(40,10,'Metodo',1,0,'C',0);
       $this->Cell(40,10,'Total',1,1,'C',0);



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
$total=$completos;
$total2=$cancelados;
$total3=$pendientes;
$pdf->SetTitle($total);
$pdf->SetTitle($total2);
$pdf->SetTitle($total3);
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('helvetica','',12);
$senten = $pdo->prepare("SELECT *FROM users inner join orders 
on users.id = orders.usersid inner join payments 
on id_payment = id_payment_method
order by orderdate ASC");
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
    $pdf->Cell(15,10,$row['orderid'],1,0,'C',0);
    $pdf->Cell(30,10,$row['first_name'],1,0,'C',0);
    $pdf->Cell(30,10,$row['orderdate'],1,0,'C',0);
    $pdf->Cell(30,10,$row['orderstatus'],1,0,'C',0);
    $pdf->Cell(40,10,$row['method_payment'],1,0,'C',0);
    $pdf->Cell(40,10,'$'.$row['total'],1,1,'C',0);    
}
$pdf->Cell(250,10,'TOTAL',0,0,'C',0);    
$pdf->Cell(-65);    
$pdf->Cell(-40,10,'$'.$suma,1,1,'C',0);    


$pdf -> Output();




?>