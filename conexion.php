<?php

try{

    $conexion = new PDO('mysql:host=localhost;dbname=galvanictherapy2', 'root', '');

    

}catch(PDOExeption $e){

    echo 'Error'.$e->getMessage();

}

    



  