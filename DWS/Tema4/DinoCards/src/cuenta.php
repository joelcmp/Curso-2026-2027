<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../src/index.php');
    exit;
}

require_once __DIR__ . '/../php/coleccionService.php';

$usuario_id = (int)$_SESSION['id'];
$cartas = [];
$error = '';

try {
    $resultado = obtenerTodasLasCartas($usuario_id);
    $cartas = $resultado['cartas'] ?? [];
} catch (Throwable $e) {
    $error = $e->getMessage();
}

$cartas_obtenidas = 0;
$total_cartas = count($cartas);

foreach ($cartas as $c) {
    if ((int)$c['tiene'] === 1) $cartas_obtenidas++;
}

$cartas_restantes = $total_cartas - $cartas_obtenidas;
$porcentaje = $total_cartas > 0 ? round(($cartas_obtenidas / $total_cartas) * 100) : 0;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinoCards | Mi cuenta</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/cuenta.css">
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
        <section id="cuenta-cabecera">
            <h2>Mi cuenta</h2>
            <p>Gestiona tu perfil y consulta tu progreso en DinoCards.</p>
        </section>

        <?php if (!empty($error)): ?>
            <p class="mensaje-error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <section id="cuenta-datos">
            <h3>Datos del usuario</h3>
            <div class="datos-grid">
                <div class="dato">
                    <span>Usuario</span>
                    <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>
                </div>
                <div class="dato">
                    <span>Email</span>
                    <strong><?= htmlspecialchars($_SESSION['email']) ?></strong>
                </div>
                <div class="dato">
                    <span>Fecha de registro</span>
                    <strong><?= htmlspecialchars($_SESSION['fecha_registro'] ?? 'No disponible') ?></strong>
                </div>
                <div class="dato">
                    <span>Última obtención</span>
                    <strong><?= htmlspecialchars($_SESSION['ultima_obtencion'] ?? 'Aún no has abierto ninguna carta') ?></strong>
                </div>
            </div>
        </section>

        <section id="cuenta-estadisticas">
            <h3>Estadísticas de colección</h3>
            <div class="stats-grid">
                <div class="stat">
                    <strong><?= $cartas_obtenidas ?></strong>
                    <span>Cartas obtenidas</span>
                </div>
                <div class="stat">
                    <strong><?= $cartas_restantes ?></strong>
                    <span>Cartas por conseguir</span>
                </div>
                <div class="stat">
                    <strong><?= $porcentaje ?>%</strong>
                    <span>Colección completada</span>
                </div>
            </div>

            <div class="barra-progreso">
                <div class="barra-relleno" style="width: <?= $porcentaje ?>%;"></div>
            </div>
        </section>

        <section id="cuenta-acciones">
            <h3>Acciones</h3>
            <div class="acciones-grid">
                <a href="../src/cartas.php" class="btn-accion">Ver mi colección</a>
                <a href="../php/logout.php" class="btn-accion btn-peligro">Cerrar sesión</a>
            </div>
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
                    <a href="../src/preguntasFrecuentes.php"><h3>Preguntas frecuentes</h3></a>
                    <a href="../src/sobreNosotros.php"><h3>Sobre nosotros</h3></a>
                    <a href="../src/noticias.php"><h3>Noticias</h3></a>
                    <a href="../src/trabajaConNosotros.php"><h3>Trabaja con nosotros</h3></a>
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