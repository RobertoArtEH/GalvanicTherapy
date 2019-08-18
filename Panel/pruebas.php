<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>prueba</title>
</head>
<body id="contenedor">
    
</body>
<script src="js/jquery.min.js"></script>
</html>

<script>

$(document).ready(function () {
    $.ajax({
	url: 'orders.php',
	success: function(respuesta) {
        $('#contenedor').html(respuesta);
    },
	error: function() {
        console.log("No se ha podido obtener la información");
    }
});
});

</script>