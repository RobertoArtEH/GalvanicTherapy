<?php

require ('fpdf.php');
 require ('../conexion.php');

//  OBTENER TOTAL PRODUCTOS 
$senten = $pdo->prepare("SELECT COUNT(*) as C FROM users
WHERE status='active'");
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
   $inactivos=$row['C'];
}
$senten = $pdo->prepare("SELECT COUNT(*) as C FROM users
WHERE status ='desactived'");
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
   $activos=$row['C'];
}
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
        $this->Cell(60,10, utf8_decode('Reporte de Usuarios'),0, 2 );
        $this->Cell(-60,-30);
        $this->Cell(0,20, utf8_decode('Usuarios desactivados : '. $total2),0, 2 , 'L' );
        $this->Cell(0,0, utf8_decode('Usuarios activos : '. $total),0, 2 , 'L' );
        $this->Cell(0,20, utf8_decode('TOTAL  : '. ($total + $total2)),0, 2 , 'L' );

        // $this->Cell(60);
        // Titulo
        // Salto de linea
        $this->Ln(10);
       $this->Cell(60,10,'Nombre',1,0,'C',0);
       $this->Cell(30,10,'Apellido',1,0,'C',0);
       $this->Cell(30,10,'role',1,0,'C',0);
       $this->Cell(60,10,'username',1,1,'C',0);

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
$total=$inactivos;
$total2=$activos;
$pdf->SetTitle($total);
$pdf->SetTitle($total2);
$pdf -> AliasNbPages();
$pdf -> AddPage();
$pdf -> SetFont('courier','',16);
$senten = $pdo->prepare("SELECT *FROM users");
// 'SELECT * from products  inner join orderdetails
//   on products.productid = orderdetails.productid inner join orders on orderdetails.orderid = orders.orderid inner join users on users.id = orders.usersid
$senten->execute();
while($row=$senten->fetch(PDO::FETCH_ASSOC))
{
    $pdf->Cell(60,10,$row['first_name'],1,0,'C',0);
    $pdf->Cell(30,10,$row['last_name'],1,0,'C',0);
    $pdf->Cell(30,10,$row['role'],1,0,'C',0);
    $pdf->Cell(60,10,$row['username'],1,1,'C',0);
}
$pdf -> Output();




?>