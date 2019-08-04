<?php
require('conexion.php');
 class Producto {
   public $productid;
   public $productname;
   public $description;
   public $picture;
   public $content;
   public $categoryid;
   public $price;
   public $unitsinstock;
   
   public function __construct($producid,$productname, $description,$picture,$content,$categoryid, $price,$unitsinstock ) {
        $this->productid = $productid;
        $this->productname = $productname;
        $this->description = $description;
        $this->picture = $picture;
        $this->content = $content;
        $this->categoryid = $categoryid;
        $this->price = $price;
        $this->unitsinstock = $unitsinstock;
      
   }
   
 }
 $stmt= $conexion->prepare('SELECT * FROM products where productid =' .$_GET['productid']);
 $stmt->setFetchMode(PDO::FETCH_CLASS, 'Producto');
 $stmt->execute();

 $stmt= $conexion->prepare('SELECT * FROM products where productid =' .$_GET['productid']);
 $stmt->execute();
 $producto = $stmt ->fetchAll();

 ?>