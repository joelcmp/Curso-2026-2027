<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinoCards | Tu colección de cartas</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/sobreNosotros.css">
</head>

<body>
    <header id="header-principal">
        <div class="header-container">
            <a href="../src/index.php" class="logo">
                <img src="../res/logo sin fondo.png" alt="Logo DinoCards">
            </a>
            <nav class="nav-links">
                <a href="../src/index.php">Inicio</a>
                <a href="../src/coleccion.php">Colección</a>
                <a href="../src/noticias.php">Noticias</a>
                <a href="../src/soporte.php">Soporte</a>
                <a href="../src/cuenta.php" class="btn-cuenta">Cuenta</a>
                <?php if (isset($_SESSION['id'])): ?>
                    <a href="../php/logout.php" class="btn-cuenta btn-logout">Cerrar sesión</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main>
        <section id="sobre-intro">
            <h2>¿Qué es DinoCards?</h2>
            <p>DinoCards es una plataforma de colección de cartas de dinosaurios creada para todos los amantes de estas criaturas y de los juegos de cartas coleccionables.</p>
            <p>Cada 24 horas podrás descubrir una nueva carta aleatoria y ampliar poco a poco tu colección.</p>
        </section>

        <section id="sobre-coleccion">
            <h2>Nuestra colección</h2>
            <p>En DinoCards encontrarás diferentes especies de dinosaurios, cada una representada en una carta única. Nuestro objetivo es que puedas descubrir nuevas especies y completar tu colección.</p>
            <div class="grid">
                <article>
                    <h3>Descubre</h3>
                    <p>Consigue nuevas cartas y descubre diferentes dinosaurios.</p>
                </article>
                <article>
                    <h3>Colecciona</h3>
                    <p>Guarda tus cartas y completa tu colección.</p>
                </article>
                <article>
                    <h3>Próximamente</h3>
                    <p>En el futuro podrás utilizar tus cartas para enfrentarte a otros jugadores en combates.</p>
                </article>
            </div>
        </section>

        <section class="bloque-texto">
            <h2>Nuestra misión</h2>
            <p>Queremos crear una experiencia sencilla y divertida para descubrir, coleccionar y disfrutar de cartas de dinosaurios, mientras seguimos incorporando nuevas especies y funcionalidades a DinoCards.</p>
        </section>

        <section class="bloque-texto">
            <h2>El futuro de DinoCards</h2>
            <p>DinoCards seguirá creciendo con nuevas cartas, nuevas funcionalidades y diferentes formas de utilizar tu colección. Los combates entre jugadores serán una de las próximas novedades del proyecto.</p>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <h3>Patrocinadores</h3>
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
            </div>

            <div class="footer-col">
                <h3>Síguenos</h3>
                <div id="redes-sociales">
                    <a href="index.php"><img src="../res/rrss/icons8-facebook-48.png" alt="Facebook"></a>
                    <a href="index.php"><img src="../res/rrss/icons8-facebook-messenger-48.png" alt="Messenger"></a>
                    <a href="index.php"><img src="../res/rrss/icons8-instagram-48.png" alt="Instagram"></a>
                    <a href="index.php"><img src="../res/rrss/icons8-youtube-48.png" alt="Youtube"></a>
                    <a href="index.php"><img src="../res/rrss/icons8-tiktok-48.png" alt="Tiktok"></a>
                    <a href="index.php"><img src="../res/rrss/icons8-reddit-48.png" alt="Reddit"></a>
                </div>
            </div>

            <div class="footer-col">
                <h3>Enlaces</h3>
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
            </div>

            <div class="footer-col">
                <div id="newsletter">
                    <h2>Suscribete a nuestra newsletter</h2>
                    <form action="">
                        <input type="text" name="Nombre" placeholder="Nombre">
                        <input type="text" name="email" placeholder="Email">
                        <div id="enviar-newsletter">
                            <input type="submit" value="Suscribirme!">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="ubicacion">
            <h3>Calle de los Robles, 27, 28805 Alcalá de Henares, Madrid </h3>
        </div>
    </footer>
</body>

</html>