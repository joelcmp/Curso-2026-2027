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
    <title>DinoCards | Tu colección de cartas</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div id="header-principal">
            <a href="../src/index.php"><img src="../res/logo sin fondo.png" alt="Logo DinoCards"></a>
            <a href="../src/cartas.php">
                <h2>Cartas</h2>
            </a>
            <a href="../src/soporte.php">
                <h2>Soporte</h2>
            </a>
            <a href="../src/cuenta.php">
                <h2>Cuenta</h2>
            </a>
        </div>
    </header>

    <main>
        <div id="imagen-portada">
            <img src="../res/portadaprincipal.jpg" alt="Imagen portada principal">
        </div>
        <div id="login-registro">
            <div id="botones-tab">
                <button type="submit" id="boton-login">Inicio sesión</button>
                <button type="submit" id="boton-registro">Registrarse</button>
            </div>
            <div id="login">
                <form method="POST" action="">

                    <label for="usuario">Usuario o email</label>
                    <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($usuario) ?>" required>

                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required>

                    <button type="submit" name="action" value="login" onclick="return ;">Iniciar sesion</button>
                </form>
                <a href="">
                    <h4>¿Has olvidado la contraseña?</h4>
                </a>
                <a href="">
                    <h4>¿Has olvidado el usaurio?</h4>
                </a>
                <a href="">
                    <h4>No tengo cuenta</h4>
                </a>
            </div>

            <div id="registro">
                <form method="POST" action="">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>

                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($apellido) ?>" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

                    <label for="tienda">Tienda</label>
                    <input type="number" id="tienda" name="tienda" value="<?= htmlspecialchars($tienda) ?>" required>

                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($usuario) ?>" required>

                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                    <label for="confirmaContrasena">Confirmar Contraseña</label>
                    <input type="password" id="confirmaContrasena" name="confirmaContrasena" required>

                    <button type="submit" name="action" value="registrar" onclick="return ;">Registrar</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <div id="patrocinadores">
            
            <a href=""><img src="../res/patrocinadores/patro1.jpg" alt=""></a>
            <a href=""><img src="../res/patrocinadores/patro2.jpg" alt=""></a>
            <a href=""><img src="../res/patrocinadores/patro3.jpg" alt=""></a>
            <a href=""><img src="../res/patrocinadores/patro4.jpg" alt=""></a>
            <a href=""><img src="../res/patrocinadores/patro5.jpg" alt=""></a>
            <a href=""><img src="../res/patrocinadores/patro6.jpg" alt=""></a>
            <a href=""><img src="../res/patrocinadores/patro7.jpg" alt=""></a>
            <a href=""><img src="../res/patrocinadores/patro8.jpg" alt=""></a>
        </div>
        <div id="redes-sociales">
            <a href=""><img src="../res/rrss/icons8-facebook-48.png" alt=""></a>
            <a href=""><img src="../res/rrss/icons8-facebook-messenger-48.png" alt=""></a>
            <a href=""><img src="../res/rrss/icons8-instagram-48.png" alt=""></a>
            <a href=""><img src="../res/rrss/icons8-youtube-48.png" alt=""></a>
            <a href=""><img src="../res/rrss/icons8-tiktok-48.png" alt=""></a>
            <a href=""><img src="../res/rrss/icons8-reddit-48.png" alt=""></a>
        </div>
        <div id="zona-ayuda">
            <a href="../src/preguntasFrecuentes.php">
                <h3>Preguntas frecuentes</h3>
            </a>
            <a href="../src/sobreNosotros.php">
                <h3>Sobre nosotros</h3>
            </a>
            <a href="../src/noticias.php">
                <h3>Noticias</h3>
            </a>
            <a href="../src/trabajaConNosotros.php">
                <h3>Trabaja con nosotros</h3>
            </a>
        </div>
        <div id="newsletter">
            <h2>Suscribete a nuestra newsletter</h2>
            <form action="">
                <label for=""></label>
                <input type="text" name="Nombre" value="Nombre">
                <input type="text" name="email" value="Email">
                <input type="submit" value="Suscribirme!">
            </form>
        </div>
        <div id="ubicacion">
            <h3>Calle de los Robles, 27, 28805 Alcalá de Henares, Madrid </h3>
        </div>
    </footer>
    <script src="../script/script.js"></script>
</body>

</html>