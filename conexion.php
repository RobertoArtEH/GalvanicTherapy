<?php
  try {
    $conexion = new PDO('mysql:host=localhost;dbname=galvanictherapy', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
  } catch(PDOExeption $e) {
    echo 'Error'.$e->getMessage();
  }
?>