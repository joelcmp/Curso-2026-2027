<?php
require_once __DIR__ . '/dataAccess.php';
session_start();

// 1. ALTA
if (isset($_POST['accion']) && $_POST['accion'] === 'alta_libro') {
    $res = PA_Add_book($_POST['title'], $_POST['author']);
    $mensaje = ($res == 0) ? "Libro dado de alta" : "Error: Revisa los campos";
}

// 2. PREPARAR EDICIÓN
if (isset($_POST['accion']) && $_POST['accion'] === 'editar_libro') {
    $_SESSION['libro_editando'] = (int)$_POST['id_book'];
}

// 3. GUARDAR MODIFICACIÓN
if (isset($_POST['accion']) && $_POST['accion'] === 'guardar_modificacion') {
    $res = PA_Modify_book($_SESSION['libro_editando'], $_POST['title'], $_POST['author']);
    if ($res == 0) {
        $mensaje = "Libro modificado";
        unset($_SESSION['libro_editando']);
    } else {
        $mensaje = "Error al modificar";
    }
}

// 4. BORRAR (¡Novedad!)
if (isset($_POST['accion']) && $_POST['accion'] === 'borrar_libro') {
    $res = PA_Delete_book((int)$_POST['id_book']);
    if ($res == 0) { $mensaje = "Libro eliminado del sistema"; }
}

// 5. SINCRONIZACIÓN
$_SESSION['lista_libros'] = [];
foreach (PA_List_books() as $lib) { $_SESSION['lista_libros'][] = $lib; }

$estaEditando = isset($_SESSION['libro_editando']);
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Libros</title></head>
<body>
    <h2>Gestor de Libros</h2>
    <?php if (isset($mensaje)): ?><p style="color:blue; font-weight:bold;"><?php echo $mensaje; ?></p><?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>ID</th><th>Título</th><th>Autor</th><th>Acciones</th></tr>
        <?php foreach ($_SESSION['lista_libros'] as $lib): ?>
        <tr>
            <td><?php echo $lib['id_book']; ?></td>
            <td><?php echo $lib['title']; ?></td>
            <td><?php echo $lib['author']; ?></td>
            <td>
                <!-- Botón Modificar -->
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="id_book" value="<?php echo $lib['id_book']; ?>">
                    <input type="hidden" name="accion" value="editar_libro">
                    <button type="submit">Modificar</button>
                </form>
                <!-- Botón Borrar -->
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="id_book" value="<?php echo $lib['id_book']; ?>">
                    <input type="hidden" name="accion" value="borrar_libro">
                    <button type="submit" onclick="return confirm('¿Seguro que quieres borrar este libro?');">Borrar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php if ($estaEditando): ?>
        <hr>
        <h3>Modificando Libro ID: <?php echo $_SESSION['libro_editando']; ?></h3>
        <form action="" method="post">
            <label>Título:</label><br>
            <input type="text" name="title" required><br><br>
            <label>Autor:</label><br>
            <input type="text" name="author" required><br><br>
            <input type="hidden" name="accion" value="guardar_modificacion">
            <button type="submit">Guardar Cambios</button>
        </form>
    <?php endif; ?>
    <hr><a href="../src/index.html">Volver al portal</a>
</body>
</html>