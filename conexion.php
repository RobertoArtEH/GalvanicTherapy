<?php

try{

    $conexion = new PDO('mysql:host=localhost;dbname=galvanictherapy', 'root', '');

    

}catch(PDOExeption $e){

    echo 'Error'.$e->getMessage();

}

    



  