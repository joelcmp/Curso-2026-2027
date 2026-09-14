<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivinar numero</title>
</head>
<body>
    <h2>Prueba un número</h2>

    <form method="post" action=>
        <label for="nombre">Número:</label>
        <input type="text" id="nombre" name="numero" required><br><br>

        <input type="submit" value="Probar">
    </form>

<?php
    $numero_secreto=random_int;
    $numero_intento=$_POST['numero'];
    $numero_intentados=range(1,10);
    $intentos_restantes=10;

    while ($numero_intento != $numero_secreto && $intentos_restantes>0) {
        echo "Sigue intentandolo, te quedan "."$intentos_restantes"." intentos"
    }

    if ($intentos_restantes===0) {
        echo "Has superado el numero de intentos"
    }else{
        
        echo "Correcto!"; 
    }

    


?>
<br/>

</body>
</html>