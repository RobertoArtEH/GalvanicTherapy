
<?php
session_start(); 
 if (isset($_SESSION['username'])){
    echo "La sesión existe ...";
    var_dump($_SESSION);
    }
    else
    var_dump($_SESSION);
    echo ' no existe';
    ?>  
