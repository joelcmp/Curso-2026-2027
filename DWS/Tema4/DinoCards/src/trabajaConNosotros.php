<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinoCards | Tu colección de cartas</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <header>
        <div id="header-principal">
            <a href="../src/index.php"><img src="../res/Logo DinoCards.png" alt="Logo DinoCards"></a>
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
        <div>
            <section>
                <h2>Trabaja con nosotros</h2>
                <p> ¿Te gustan los dinosaurios, las cartas y el mundo digital? Únete a nuestro equipo y ayúdanos a hacer crecer el proyecto. </p>
            </section>
            <section>
                <h2>Buscamos nuevos talentos</h2>
                <article>
                    <h3>Desarrollo web</h3>
                    <p> Personas con conocimientos de HTML, CSS, JavaScript, PHP y bases de datos. </p>
                </article>
                <article>
                    <h3>Diseño e ilustración</h3>
                    <p> Personas creativas para diseñar la página y crear las ilustraciones de nuestras cartas. </p>
                </article>
                <article>
                    <h3>Creación de contenido</h3>
                    <p> Personas interesadas en crear noticias y contenido para nuestra comunidad. </p>
                </article>
            </section>
            <section>
                <h2>Envía tu candidatura</h2>
                <form action="#" method="post">
                    <div> <label for="nombre-candidatura">Nombre</label> <input type="text" id="nombre-candidatura" name="nombre" required> </div>
                    <div> <label for="email-candidatura">Correo electrónico</label> <input type="email" id="email-candidatura" name="email" required> </div>
                    <div> <label for="puesto">Puesto</label> <select id="puesto-candidatura" name="puesto" required>
                            <option value="">Selecciona un puesto</option>
                            <option value="desarrollo">Desarrollo web</option>
                            <option value="diseno">Diseño e ilustración</option>
                            <option value="contenido">Creación de contenido</option>
                        </select> </div>
                    <div> <label for="mensaje">Mensaje</label> <textarea id="mensaje" name="mensaje" rows="5" required></textarea> </div>
                    <button type="submit">Enviar candidatura</button>
                </form>
            </section>
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
</body>

</html>