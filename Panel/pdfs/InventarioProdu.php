<?php

require ('fpdf.php');
 require ('../conexion.php');

//  OBTENER TOTAL PRODUCTOS 
$senten = $pdo->prepare("SELECT COUNT(*) as C FROM products");
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
   $count=$row['C'];
}
class PDF extends FPDF
{
    function Header()
    {
        global $total;
        // LOGO
        $this->Image('logo.png',150,8,33);
        // Helvetica Bold 15
        $this->SetFont('helvetica','B',15);
        // Movernos a la derecha
        $this->Cell(60);
        $this->Cell(60,30, utf8_decode('Inventario de Productos'),0, 2 );
        $this->Cell(-60,-30);
        $this->Cell(0,0, utf8_decode('Cantidad de productos : '. $total),0, 2 , 'L' );        // $this->Cell(60);
        // Titulo
        // Salto de linea
        $this->Ln(10);
       $this->Cell(90,10,'Nombre',1,0,'C',0);
       $this->Cell(40,10,'Precio',1,0,'C',0);
       $this->Cell(40,10,'Unidades',1,1,'C',0);

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
$total=$count;
$pdf->SetTitle($total);
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('courier','',16);
$senten = $pdo->prepare("SELECT *FROM products");
// 'SELECT * from products  inner join orderdetails
//   on products.productid = orderdetails.productid inner join orders on orderdetails.orderid = orders.orderid inner join users on users.id = orders.usersid
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
    $pdf->Cell(90,10,$row['productname'],1,0,'C',0);
    $pdf->Cell(40,10,$row['price'],1,0,'C',0);
    $pdf->Cell(40,10,$row['unitsinstock'],1,1,'C',0);
}
$pdf -> Output();




?>