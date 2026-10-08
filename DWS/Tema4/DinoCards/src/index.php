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
    <nav>
        <header>
        <div id="header-principal">
            <a href="../src/index.php"><img src="../res/logo sin fondo.png" alt="Logo DinoCards"></a>
            <a href="../src/cartas.php">
                <h2>Colección</h2>
            </a>
            <a href="../src/soporte.php">
                <h2>Soporte</h2>
            </a>
            <a href="../src/cuenta.php">
                <h2>Cuenta</h2>
            </a>
        </div>
    </header>
    </nav>

    <main>
        <div id="imagen-portada">
            <img src="../res/portadaprincipal.jpg" alt="Imagen portada principal">
        </div>
        <div id="login-registro">
            <div id="botones-tab">
                <button type="button" id="boton-login">Inicio sesión</button>
                <button type="button" id="boton-registro">Registrarse</button>
            </div>
            <div id="login">
                <form method="POST" action="">

                    <label for="usuario">Usuario o email</label>
                    <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($usuario) ?>" required>

                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" required>

                    <button type="submit" name="action" value="login">Iniciar sesion</button>
                </form>
                <button type="button" class="enlace-texto" >¿Has olvidado la contraseña?</button>
                <button type="button" class="enlace-texto" >¿Has olvidado el usuario?</button>
                <button type="button" class="enlace-texto" >No tengo cuenta</button>
            </div>

            <div id="registro">
                <form method="POST" action="">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>

                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($apellido) ?>" required>

                    <label for="email-registro">Email</label>
                    <input type="email" id="email" name="email-registro" value="<?= htmlspecialchars($email) ?>" required>

                    <label for="usuario-registro">Usuario</label>
                    <input type="text" id="usuario" name="usuario-registro" value="<?= htmlspecialchars($usuario) ?>" required>

                    <label for="contrasena-registro">Contraseña</label>
                    <input type="password" id="contrasena-registro" name="contrasena" required>
                    <label for="confirmaContrasena">Confirmar Contraseña</label>
                    <input type="password" id="confirmaContrasena" name="confirmaContrasena" required>

                    <button type="submit" name="action" value="registrar">Registrar</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <div id="patrocinadores">
            <a href="index.php"><img src="../res/patrocinadores/patro1.jpg" alt="patrocinador1"></a>
            <a href="index.php"><img src="../res/patrocinadores/patro2.jpg" alt="patrocinador2"></a>
            <a href="index.php"><img src="../res/patrocinadores/patro3.jpg" alt="patrocinador3"></a>
            <a href="index.php"><img src="../res/patrocinadores/patro4.jpg" alt="patrocinador4"></a>
            <a href="index.php"><img src="../res/patrocinadores/patro5.jpg" alt="patrocinador5"></a>
            <a href="index.php"><img src="../res/patrocinadores/patro6.jpg" alt="patrocinador6"></a>
            <a href="index.php"><img src="../res/patrocinadores/patro7.jpg" alt="patrocinador7"></a>
            <a href="index.php"><img src="../res/patrocinadores/patro8.jpg" alt="patrocinador8"></a>
        </div>
        <div id="redes-sociales">
            <a href="index.php"><img src="../res/rrss/icons8-facebook-48.png" alt="Facebook"></a>
            <a href="index.php"><img src="../res/rrss/icons8-facebook-messenger-48.png" alt="Messenger"></a>
            <a href="index.php"><img src="../res/rrss/icons8-instagram-48.png" alt="Instagram"></a>
            <a href="index.php"><img src="../res/rrss/icons8-youtube-48.png" alt="Youtube"></a>
            <a href="index.php"><img src="../res/rrss/icons8-tiktok-48.png" alt="Tiktok"></a>
            <a href="index.php"><img src="../res/rrss/icons8-reddit-48.png" alt="Reddit"></a>
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
                <input type="text" name="Nombre" placeholder="Nombre" >
                <input type="text" name="email" placeholder="Email" >
                <div id="enviar-newsletter">
                    <input type="submit" value="Suscribirme!">
                </div>
            </form>
        </div>
        <div id="ubicacion">
            <h3>Calle de los Robles, 27, 28805 Alcalá de Henares, Madrid </h3>
        </div>
    </footer>
    <script src="../script/script.js"></script>
</body>

</html>