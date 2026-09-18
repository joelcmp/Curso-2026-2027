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
        $_SESSION['numeros_intentados']=[];
        $_SESSION['intentos_restantes']=10;
        
    }  
    
    if (!empty($_POST)&& $_SESSION['intentos_restantes']) {
        $_SESSION['numero_intento']=$_POST['numero'];
        $_SESSION['numeros_intentados']=$_POST['numero'];

        if ($_SESSION['numero_intento']) {
            
        }

    }
       
    
?>
<br/>

</body>
</html>