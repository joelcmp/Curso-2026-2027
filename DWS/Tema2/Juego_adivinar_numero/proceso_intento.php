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
    session_start();
    if (!isset($_SESSION['numero_secreto'])) {
        $_SESSION['numero_secreto']=random_int(1,100);
        $_SESSION['numeros_intentados']=range(1,10);
        $_SESSION['numero_intento']=$_POST['numero'];
        $_SESSION['intentos_restantes']=10;
    }
            echo $_SESSION['numero_secreto'];
        
        if (!empty($_SESSION['numero_intento'])) {
            if ($_SESSION['intentos_restantes']>0) {
                 if ($_SESSION['numero_intento']==$_SESSION['numero_secreto']) {
                    echo "Correcto! <br>";
                 }else{
                    $_SESSION['intentos_restantes']--;
                    echo "Sigue intentadolo, te quedan ".$_SESSION['intentos_restantes']." intentos <br>";
                    if ($_SESSION['numero_intento']>$_SESSION['numero_secreto']) {
                        echo "Te has pasado";
                    } else {
                        echo "Te has queado corto";
                    }
                    
                 }
            }
        }
        
    
?>
<br/>

</body>
</html>