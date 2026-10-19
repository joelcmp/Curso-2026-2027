<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../src/index.php');
    exit;
}

require_once __DIR__ . '/../php/coleccionService.php';

$usuario_id = (int)$_SESSION['id'];
$mensaje_apertura = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'abrir') {
    try {
        require_once __DIR__ . '/../php/reglaColeccion.php';
        if (isset($resultado_abrir)) {
            $mensaje_apertura = $resultado_abrir['mensaje'];
            if ($resultado_abrir['exito']) {
                $_SESSION['ultima_obtencion'] = date('Y-m-d H:i:s');
            }
        }
    } catch (Throwable $e) {
        $error = $e->getMessage();
    }
}

try {
    $resultado = obtenerTodasLasCartas($usuario_id);
    $cartas = $resultado['cartas'] ?? [];
} catch (Throwable $e) {
    $cartas = [];
    $error = $e->getMessage();
}

$cartas_obtenidas = 0;
foreach ($cartas as $c) {
    if ((int)$c['tiene'] === 1) $cartas_obtenidas++;
}
$total_cartas = count($cartas);

$ultima = $_SESSION['ultima_obtencion'] ?? null;
$puede_abrir = true;
$tiempo_restante = 0;

if (!empty($ultima)) {
    $timestamp_ultima = strtotime($ultima);
    $segundos_pasados = time() - $timestamp_ultima;
    $segundos_24h = 5;
    if ($segundos_pasados < $segundos_24h) {
        $puede_abrir = false;
        $tiempo_restante = $segundos_24h - $segundos_pasados;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinoCards | Mi colección</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/coleccion.css">
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
        <section id="cartas-cabecera">
            <h2>Mi colección</h2>
            <p class="contador"><?= $cartas_obtenidas ?> / <?= $total_cartas ?> cartas coleccionadas</p>

            <?php if (!empty($mensaje_apertura)): ?>
                <p class="mensaje-apertura"><?= htmlspecialchars($mensaje_apertura) ?></p>
            <?php endif; ?>

            <?php if (!empty($error)): ?>
                <p class="mensaje-apertura error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <div id="panel-apertura">
                <?php if ($puede_abrir): ?>
                    <form method="POST" action="">
                        <button type="submit" name="action" value="abrir" id="btn-abrir">Abrir carta</button>
                    </form>
                <?php else: ?>
                    <p>Próxima carta disponible en:</p>
                    <p id="contador-tiempo" data-segundos="<?= $tiempo_restante ?>">--:--:--</p>
                <?php endif; ?>
            </div>
        </section>

        <section id="cartas-grid">
            <?php foreach ($cartas as $carta): ?>
                <?php
                $tiene = (int)$carta['tiene'] === 1;
                $clase = $tiene ? 'carta tiene' : 'carta no-tiene';
                $img = !empty($carta['image_url']) ? $carta['image_url'] : '../res/cartas/' . $carta['id'] . '.jpg';
                ?>
                <article class="<?= $clase ?>"
                    data-id="<?= $carta['id'] ?>"
                    data-nombre="<?= htmlspecialchars($carta['nombre']) ?>"
                    data-especie="<?= htmlspecialchars($carta['especie']) ?>"
                    data-periodo="<?= htmlspecialchars($carta['periodo']) ?>"
                    data-altura="<?= $carta['altura'] ?>"
                    data-largo="<?= $carta['largo'] ?>"
                    data-peso="<?= $carta['peso'] ?>"
                    data-hp="<?= $carta['hp'] ?>"
                    data-vigor="<?= $carta['vigor'] ?>"
                    data-ataque="<?= $carta['ataque'] ?>"
                    data-defensa="<?= $carta['defensa'] ?>"
                    data-agilidad="<?= $carta['agilidad'] ?>"
                    data-img="<?= htmlspecialchars($img) ?>">
                    <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($carta['nombre']) ?>">
                    <h3><?= htmlspecialchars($carta['nombre']) ?></h3>
                </article>
            <?php endforeach; ?>
        </section>
    </main>

    <div id="modal-carta" class="oculto">
        <div id="modal-contenido">
            <button type="button" id="cerrar-modal">×</button>
            <img id="modal-img" src="" alt="">
            <h2 id="modal-nombre"></h2>
            <p id="modal-especie"></p>
            <p id="modal-periodo"></p>
            <div id="modal-stats">
                <div><span>HP</span><strong id="modal-hp"></strong></div>
                <div><span>Vigor</span><strong id="modal-vigor"></strong></div>
                <div><span>Ataque</span><strong id="modal-ataque"></strong></div>
                <div><span>Defensa</span><strong id="modal-defensa"></strong></div>
                <div><span>Agilidad</span><strong id="modal-agilidad"></strong></div>
                <div><span>Altura</span><strong id="modal-altura"></strong></div>
                <div><span>Largo</span><strong id="modal-largo"></strong></div>
                <div><span>Peso</span><strong id="modal-peso"></strong></div>
            </div>
        </div>
    </div>

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

    <script src="../script/coleccion.js"></script>
</body>

</html>