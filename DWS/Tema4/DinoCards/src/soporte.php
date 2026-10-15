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
    <link rel="stylesheet" href="../styles/soporte.css">
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
        
         <section id="soporte-intro">
        <h2>¿En qué podemos ayudarte?</h2>
        <p>Si tienes algún problema con tu colección, necesitas ayuda con tu cuenta o tienes alguna duda sobre el funcionamiento de la página, estamos aquí para ayudarte.</p>
    </section>

    <section id="soporte-opciones">
        <h2>¿Con qué necesitas ayuda?</h2>
        <div class="grid">
            <article>
                <h3>Problemas con mi cuenta</h3>
                <p>¿Tienes problemas para iniciar sesión o acceder a tu cuenta?</p>
            </article>
            <article>
                <h3>Problemas con las cartas</h3>
                <p>¿Has tenido algún problema al abrir o conseguir una carta?</p>
            </article>
            <article>
                <h3>Mi colección</h3>
                <p>Si tienes algún problema con las cartas de tu colección, ponte en contacto con nosotros.</p>
            </article>
            <article>
                <h3>Otro problema</h3>
                <p>Si tu problema no aparece aquí, puedes explicárnoslo mediante el formulario de contacto.</p>
            </article>
        </div>
    </section>

    <section id="soporte-contacto">
        <h2>Contacta con soporte</h2>
        <form action="#" method="post">
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="motivo">Motivo de la consulta</label>
                <select id="motivo" name="motivo" required>
                    <option value="">Selecciona un motivo</option>
                    <option value="cuenta">Problema con mi cuenta</option>
                    <option value="cartas">Problema con las cartas</option>
                    <option value="coleccion">Problema con mi colección</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
            <div>
                <label for="mensaje">Describe tu problema</label>
                <textarea id="mensaje" name="mensaje" rows="6" placeholder="Cuéntanos qué ha ocurrido..." required></textarea>
            </div>
            <button type="submit">Enviar consulta</button>
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