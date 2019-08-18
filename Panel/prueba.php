<?php include('conexion.php')?>
<?php
$id= $_POST['id'];
$senten = $pdo->prepare("SELECT *FROM users inner join orders
on users.id = orders.usersid");
$senten->execute();
        $arreglo=array();
        while($row=$senten->fetch(PDO::FETCH_ASSOC))
        {
            $arreglo= array(
                "first_name"=>$row['first_name'],
                "last_name"=>$row['last_name'],
                "id"=>$row['id'],
                "imageprofile"=>$row['imageprofile']
            );
        }
        $jsonstring =json_encode($arreglo);
        echo $jsonstring;
?>