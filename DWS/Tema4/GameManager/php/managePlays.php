<?php
require_once __DIR__ . '/dataAccess.php';
session_start();

// 1. ALTA DE PARTIDA (Con validación doble)
if (isset($_POST['accion']) && $_POST['accion'] === 'alta_partida') {
    $id_game = (int)$_POST['id_game'];
    
    // Validación doble (El juego debe existir)
    $juegoExiste = PA_Get_game($id_game);
    
    if (count($juegoExiste) == 0) {
        $mensaje = "El videojuego no existe. Pruebe con otro ID.";
    } else {
        $res = PA_Add_play($_POST['player'], $id_game);
        $mensaje = ($res == 0) ? "Partida registrada con éxito" : "Error: Jugador vacío";
    }
}

// 2. PREPARAR EDICIÓN
if (isset($_POST['accion']) && $_POST['accion'] === 'editar_partida') {
    $_SESSION['partida_editando'] = (int)$_POST['id_play'];
}

// 3. GUARDAR MODIFICACIÓN
if (isset($_POST['accion']) && $_POST['accion'] === 'guardar_modificacion') {
    $res = PA_Modify_play($_SESSION['partida_editando'], $_POST['player'], (int)$_POST['id_game']);
    if ($res == 0) {
        $mensaje = "Partida modificada con éxito";
        unset($_SESSION['partida_editando']); // Cerramos la edición
    } else {
        $mensaje = "Error al modificar";
    }
}

// 4. SINCRONIZACIÓN
$_SESSION['lista_partidas'] = [];
foreach (PA_List_plays() as $p) { $_SESSION['lista_partidas'][] = $p; }

$estaEditando = isset($_SESSION['partida_editando']);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Partidas</title></head>
<body>
    <h2>Registro de Partidas</h2>
    <?php if (isset($mensaje)): ?><p style="color:blue; font-weight:bold;"><?php echo $mensaje; ?></p><?php endif; ?>

    <table border="1" cellpadding="8">
        <tr><th>ID</th><th>Jugador</th><th>ID Juego</th><th>Título del Juego (JOIN)</th><th>Acción</th></tr>
        <?php foreach ($_SESSION['lista_partidas'] as $p): ?>
        <tr>
            <td><?php echo $p['id_play']; ?></td>
            <td><?php echo $p['player']; ?></td>
            <td><?php echo $p['id_game']; ?></td>
            <td><?php echo $p['game_title']; ?></td> <!-- Dato del JOIN -->
            <td>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="id_play" value="<?php echo $p['id_play']; ?>">
                    <input type="hidden" name="accion" value="editar_partida">
                    <button type="submit">Modificar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- FORMULARIO DE EDICIÓN -->
    <?php if ($estaEditando): ?>
        <hr>
        <h3>Modificando Partida ID: <?php echo $_SESSION['partida_editando']; ?></h3>
        <form action="" method="post">
            <label>Jugador:</label><br>
            <input type="text" name="player" required><br><br>
            <label>ID Juego:</label><br>
            <input type="number" name="id_game" required><br><br>
            <input type="hidden" name="accion" value="guardar_modificacion">
            <button type="submit">Guardar Cambios</button>
        </form>
    <?php endif; ?>
    <hr><a href="../src/index.html">Volver al portal</a>
</body>
</html>