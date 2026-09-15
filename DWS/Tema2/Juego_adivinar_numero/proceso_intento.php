<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivinar numero</title>
</head>
<body>
    <h2>Adivinar el número</h2>

    <form method="post" action=>
        <label for="nombre">Número:</label>
        <input type="text" id="nombre" name="numero" required><br><br>

        <input type="submit" value="Probar">
    </form>
<?php
    $numero_secreto=random_int(1,100);
    $numero_intento=$_POST['numero'];
    $numero_intentados=range(1,10);
    $intentos_restantes=10;

    while ($numero_intento != $numero_secreto || $intentos_restantes>0) {
        $intentos_restantes--;
        echo "Sigue intentandolo, te quedan "."$intentos_restantes"." intentos";

        if ($numero_intento>$numero_secreto) {
            echo "Te has pasado";
        }else {
            echo "Te has quedado corto";
        }
    }

    if ($intentos_restantes===0) {
        echo "Has superado el numero de intentos";
    }else{
        
        echo "Correcto!"; 
    }

    


?>
<br/>

</body>
</html>