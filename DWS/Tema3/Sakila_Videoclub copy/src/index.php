<?php

$nombre = '';
$apellido = '';
$email = '';
$tienda = '';
$usuario = '';
$resultado = null;
$error = null;
$contrasena = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['action'] === 'registrar') {
        require_once __DIR__ . '/../php/registro.php';
    } else if ($_POST['action'] === 'login') {
        require_once __DIR__ . '/../php/login.php';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo Sakila | Film</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
        <body>
    <header>
        <h1>Catálogo Sakila</h1>
        <a href=""><img src="../res/logo web.jpg" alt="Logo Sakila"></a>
    </header>

    <main>
        <div id="login" class="form-card">
            <h2>Iniciar sesión</h2>
            <form method="POST" action="">
                <label for="usuario">Usuario o email:</label>
                <input type="text" id="usuario" name="usuario" required>

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>

                <button type="submit" name="action" value="login">Iniciar sesión</button>
            </form>
        </div>

        <div id="registro" class="form-card">
            <h2>Registro</h2>
            <form method="POST" action="">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="tienda">Tienda:</label>
                <input type="number" id="tienda" name="tienda" required>

                <label for="usuario_reg">Usuario:</label>
                <input type="text" id="usuario_reg" name="usuario" required>

                <label for="contrasena_reg">Contraseña:</label>
                <input type="password" id="contrasena_reg" name="contrasena" required>

                <label for="confirmaContrasena">Confirmar contraseña:</label>
                <input type="password" id="confirmaContrasena" name="confirmaContrasena" required>

                <button type="submit" name="action" value="registrar">Registrar</button>
            </form>
        </div>
    </main>
</body>    
</body>

</html>