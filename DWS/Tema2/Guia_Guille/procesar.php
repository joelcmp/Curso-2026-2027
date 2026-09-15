<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Entrada</title>
</head>
<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && 
        !empty($_POST['nombre']) &&
        !empty($_POST['edad']))
    {
        $nombre = $_POST['nombre'];
        $edad = (int)$_POST['edad'];
        echo "<h2>Resultado:</h2>";
        if ($edad >= 18)
            { echo "<p>Hola <strong>$nombre</strong>, tienes <strong>$edad</strong> años y eres mayor de edad.</p>"; }
        else 
            { echo "<p>Hola <strong>$nombre</strong>, tienes <strong>$edad</strong> años. Eres menor de edad.</p>"; }
    } else { echo "<p>No se han recibido datos del formulario.</p>"; }
?>
<br/>
<a href="condicional2paginas.html">Volver al formulario</a>
</body>
</html>