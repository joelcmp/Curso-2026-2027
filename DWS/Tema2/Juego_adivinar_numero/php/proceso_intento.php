<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivinar numero</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <h2>Adivinar el número</h2>

    <form method="post" action=>
        <label for="nombre">Número:</label>
        <input type="text" id="nombre" name="numero" ><br><br>

        <input type="submit" value="Probar">
        <input type="submit" value="Reiniciar juego" name="reinicio">
    </form>
<?php
    session_start();
    if (isset($_POST['reinicio'])) {
        session_destroy();
        $_SESSION=[];
    }
    if (!isset($_SESSION['numero_secreto'])) {
        $_SESSION['numero_secreto']=random_int(1,100);
        $_SESSION['numeros_intentados']=[];
        $_SESSION['intentos_restantes']=10;
        
    }  
    
    if (!empty($_POST)&& $_SESSION['intentos_restantes']>0 && !isset($_POST['reinicio'])) {
        $_SESSION['numero_intento']=$_POST['numero'];
        

        if ($_SESSION['numero_intento']==$_SESSION['numero_secreto']) {
            echo "<br>Correcto, lo has adivinado!!<br>";
        }else{
            $_SESSION['intentos_restantes']--;
            array_push($_SESSION['numeros_intentados'],$_POST['numero']);
           if ($_SESSION['intentos_restantes']>0) {
                 
            if ($_SESSION['numero_intento']>$_SESSION['numero_secreto']) {
                echo "Te has pasado <br>";
            } else {
                echo "Te has quedado corto <br>";
                
            }
            echo "Te quedan ".$_SESSION['intentos_restantes']." intentos<br>";
           }else{
                echo "Te has quedado sin intentos<br>";
           }
            
            
        }
        echo "<br><br> Numero intentados => ";
        foreach ($_SESSION['numeros_intentados'] as $numero) {
            echo $numero." ";
        }

    }elseif ($_SESSION['intentos_restantes']==0) {
                        echo "Te has quedado sin intentos<br>";
            }
    
?>
<br/>

</body>
</html>