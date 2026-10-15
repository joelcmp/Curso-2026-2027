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
    <link rel="stylesheet" href="../styles/trabajaConNosotros.css">
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
                <?php if (isset($_SESSION['id'])): ?>
                    <a href="../php/logout.php" class="btn-cuenta">Cerrar sesión</a>
                <?php else: ?>
                    <a href="../src/cuenta.php" class="btn-cuenta">Cuenta</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main>
        <section id="trabaja-intro">
        <h2>Trabaja con nosotros</h2>
        <p>¿Te gustan los dinosaurios, las cartas y el mundo digital? Únete a nuestro equipo y ayúdanos a hacer crecer el proyecto.</p>
    </section>

    <section id="trabaja-puestos">
        <h2>Buscamos nuevos talentos</h2>
        <div class="grid">
            <article>
                <h3>Desarrollo web</h3>
                <p>Personas con conocimientos de HTML, CSS, JavaScript, PHP y bases de datos.</p>
            </article>
            <article>
                <h3>Diseño e ilustración</h3>
                <p>Personas creativas para diseñar la página y crear las ilustraciones de nuestras cartas.</p>
            </article>
            <article>
                <h3>Creación de contenido</h3>
                <p>Personas interesadas en crear noticias y contenido para nuestra comunidad.</p>
            </article>
        </div>
    </section>

    <section id="trabaja-formulario">
        <h2>Envía tu candidatura</h2>
        <form action="#" method="post">
            <div>
                <label for="nombre-candidatura">Nombre</label>
                <input type="text" id="nombre-candidatura" name="nombre" required>
            </div>
            <div>
                <label for="email-candidatura">Correo electrónico</label>
                <input type="email" id="email-candidatura" name="email" required>
            </div>
            <div>
                <label for="puesto-candidatura">Puesto</label>
                <select id="puesto-candidatura" name="puesto" required>
                    <option value="">Selecciona un puesto</option>
                    <option value="desarrollo">Desarrollo web</option>
                    <option value="diseno">Diseño e ilustración</option>
                    <option value="contenido">Creación de contenido</option>
                </select>
            </div>
            <div>
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
            </div>
            <button type="submit">Enviar candidatura</button>
        </form>
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