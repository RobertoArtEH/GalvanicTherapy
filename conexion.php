<?php
try{
    $conexion = new PDO('mysql:host=localhost;dbname=galvanic_therapy', 'galvanic_therapy', 'galvanicroot');
    
}catch(PDOExeption $e){
    echo 'Error'.$e->getMessage();
}
    

  