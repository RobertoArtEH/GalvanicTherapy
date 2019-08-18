<?php
require ('fpdf.php');
 require ('../conexion.php');

class PDF extends FPDF
{
    function Header()
    {
        global $total;
        global $total2;
        // LOGO
        $this->Image('pingu.png',150,8,33);
        // Helvetica Bold 15
        $this->SetFont('helvetica','B',15);
        // Movernos a la derecha
        $this->Cell(60);
        $this->Cell(60,10, utf8_decode('Productos mas vendidos'),0, 2 );
        $this->Cell(-60,-30);
        

        // $this->Cell(60);
        // Titulo
        // Salto de linea
        $this->Ln(10);
        $this->Cell(60,10,'Producto',1,0,'C',0);
       $this->Cell(90,10,'Categoria',1,0,'C',0);
       $this->Cell(30,10,'Cantidad',1,1,'C',0);

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
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('courier','',16);
//  OBTENER TOTAL PRODUCTOS 
$senten = $pdo->prepare("SELECT categories.categoryname, products.productname,SUM(orderdetails.quantity) as total FROM
orderdetails inner join products 
on orderdetails.productid = products.productid inner join
categories on categories.categoryid = products.categoryid
GROUP BY productname
ORDER BY total DESC
LIMIT 0,30 ");

$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
    $pdf->Cell(60,10,$row['productname'],1,0,'C',0);
    $pdf->Cell(90,10,$row['categoryname'],1,0,'C',0);
    $pdf->Cell(30,10,$row['total'],1,1,'C',0);
    
}

$pdf -> Output();




?>