<?php include('conexion.php')?>
<?php
$id=$_POST['id'];
$senten = $pdo->prepare("SELECT *FROM products inner join orderdetails
on products.productid = orderdetails.productid inner join orders on orderdetails.orderid = orders.orderid WHERE
orders.orderid =$id");
$senten->execute();
        while($row=$senten->fetchAll(PDO::FETCH_ASSOC))
        {
           print_r($row);
        }
       
?>