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
        <header >
            <div id="logo-nombre">
            <a href=""><img src="../res/logo sakila.png" alt=""></a>    
            <h1>Catálogo Sakila</h1>
            </div>
            <div id="portal-empleado">
                <a href="#">Portal del Empleado</a>
            </div>    
        </header>

        <?php if ($error !== null): ?>
            <p class="error">Error: <?= $error ?></p>
        <?php elseif ($resultado !== null): ?>
            <p>Registro realizado correctamente.</p>
            <p>Resultado: <?= $resultado ?></p>
        <?php endif; ?>
    

    <div id="panel-control">
            <form action="">
                <button type="button" id="panel-login">Iniciar sesión</button>
                <button type="button" id="panel-registro" >Registrarse</button>
            </form>
    </div>    
    <div id="login">
        
        <form method="POST" action="">

            <label for="usuario">Usuario o email:</label>
            <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($usuario) ?>" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <button type="submit" name="action" value="login" onclick="return ;">Iniciar sesion</button>
        </form>
    </div>    

    <div id="registro">
        <form method="POST" action="">
            <label for="nombre-registro">Nombre:</label>
            <input type="text" id="nombre-registro" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($apellido) ?>" required>

            <label for="email-registro">Email:</label>
            <input type="email" id="email-registro" name="email" value="<?= htmlspecialchars($email) ?>" required>

            <label for="tienda">Tienda:</label>
            <input type="number" id="tienda" name="tienda" value="<?= htmlspecialchars($tienda) ?>" required>

            <label for="usuario-registro">Usuario:</label>
            <input type="text" id="usuario-registro" name="usuario" value="<?= htmlspecialchars($usuario) ?>" required>

            <label for="contrasena-registro">Contraseña:</label>
            <input type="password" id="contrasena-registro" name="contrasena" required>
            <label for="confirmaContrasena">Confirmar Contraseña:</label>
            <input type="password" id="confirmaContrasena" name="confirmaContrasena" required>

            <button type="submit" name="action" value="registrar" onclick="return ;">Registrar</button>
        </form>
    </div>
    <script src="../script/script.js"></script>    
</body>

</html>