<?php
require_once __DIR__ . '/dataAccess.php';
session_start();

if (isset($_POST['accion']) && $_POST['accion'] === 'alta_juego') {
    $res = PA_Add_game($_POST['title']);
    $mensaje = ($res == 0) ? "Juego insertado" : "Error: Título vacío";
}

if (isset($_POST['accion']) && $_POST['accion'] === 'editar_juego') {
    $_SESSION['juego_editando'] = (int)$_POST['id_game'];
}

if (isset($_POST['accion']) && $_POST['accion'] === 'guardar_modificacion') {
    $res = PA_Modify_game($_SESSION['juego_editando'], $_POST['title']);
    if ($res == 0) {
        $mensaje = "Juego modificado con éxito";
        unset($_SESSION['juego_editando']);
    }
}

if (isset($_POST['accion']) && $_POST['accion'] === 'borrar_juego') {
    $res = PA_Delete_game((int)$_POST['id_game']);
    if ($res == 0) { $mensaje = "Juego eliminado"; }
}

$_SESSION['lista_juegos'] = [];
foreach (PA_List_games() as $j) { $_SESSION['lista_juegos'][] = $j; }

$estaEditando = isset($_SESSION['juego_editando']);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Juegos</title></head>
<body>
    <h2>Gestor de Videojuegos</h2>
    <?php if (isset($mensaje)): ?><p style="color:blue; font-weight:bold;"><?php echo $mensaje; ?></p><?php endif; ?>

    <table border="1" cellpadding="8">
        <tr><th>ID</th><th>Título</th><th>Acciones</th></tr>
        <?php foreach ($_SESSION['lista_juegos'] as $j): ?>
        <tr>
            <td><?php echo $j['id_game']; ?></td>
            <td><?php echo $j['title']; ?></td>
            <td>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="id_game" value="<?php echo $j['id_game']; ?>">
                    <input type="hidden" name="accion" value="editar_juego">
                    <button type="submit">Modificar</button>
                </form>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="id_game" value="<?php echo $j['id_game']; ?>">
                    <input type="hidden" name="accion" value="borrar_juego">
                    <button type="submit" onclick="return confirm('¿Seguro?');">Borrar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php if ($estaEditando): ?>
        <hr>
        <h3>Modificando Juego ID: <?php echo $_SESSION['juego_editando']; ?></h3>
        <form action="" method="post">
            <label>Nuevo Título:</label><br>
            <input type="text" name="title" required><br><br>
            <input type="hidden" name="accion" value="guardar_modificacion">
            <button type="submit">Guardar Cambios</button>
        </form>
    <?php endif; ?>
    <hr><a href="../src/index.html">Volver al portal</a>
</body>
</html>