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
    <link rel="stylesheet" href="../styles/noticias.css">


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


    <main class="pagina-noticias">
        <div id="noticias-intro">
            <h2>ÚLTIMAS NOTICIAS</h2>
            <p>Descubre las últimas novedades de nuestra colección, nuevas cartas, actualizaciones y futuras funcionalidades.</p>
        </div>

        <div class="noticias-grid">
            <article class="noticia-card">
                <img src="../res/fotosNoticias/noticia1.jpg" alt="Cartas preparadas para un combate">
                <div class="contenido">
                    <span class="categoria">PRÓXIMAMENTE</span>
                    <h3>Los combates están en camino</h3>
                    <p class="fecha">6 de octubre de 2026</p>
                    <p class="descripcion">Estamos trabajando en una nueva funcionalidad que permitirá utilizar las cartas de tu colección para enfrentarte a otros jugadores.</p>
                    <a href="noticias.php" class="leer-mas">Leer noticia →</a>
                </div>
            </article>

            <article class="noticia-card">
                <img src="../res/fotosNoticias/noticia2.jpg" alt="Nueva carta añadida a la colección">
                <div class="contenido">
                    <span class="categoria">ACTUALIZACIÓN</span>
                    <h3>Nuevas cartas disponibles</h3>
                    <p class="fecha">4 de octubre de 2026</p>
                    <p class="descripcion">Hemos añadido nuevas cartas a la colección. Entra cada 24 horas para descubrir cuál será tu próxima carta.</p>
                    <a href="noticias.php" class="leer-mas">Leer noticia →</a>
                </div>
            </article>

            <article class="noticia-card">
                <img src="../res/fotosNoticias/noticia3.jpg" alt="Colección de diferentes cartas">
                <div class="contenido">
                    <span class="categoria">COLECCIÓN</span>
                    <h3>Completa tu colección</h3>
                    <p class="fecha">1 de octubre de 2026</p>
                    <p class="descripcion">Descubre todas las cartas disponibles y comprueba cuáles has conseguido y cuáles todavía te faltan.</p>
                    <a href="noticias.php" class="leer-mas">Leer noticia →</a>
                </div>
            </article>

            <article class="noticia-card">
                <img src="../res/fotosNoticias/noticia4.jpg" alt="Apertura de una nueva carta">
                <div class="contenido">
                    <span class="categoria">FUNCIONAMIENTO</span>
                    <h3>Una nueva carta cada 24 horas</h3>
                    <p class="fecha">28 de septiembre de 2026</p>
                    <p class="descripcion">Recuerda que podrás conseguir una nueva carta cuando hayan pasado 24 horas desde tu última apertura.</p>
                    <a href="noticias.php" class="leer-mas">Leer noticia →</a>
                </div>
            </article>
        </div>
    </main>

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