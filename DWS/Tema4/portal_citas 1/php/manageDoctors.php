<?php
require_once __DIR__ . '/dataAccess.php';
session_start();

if (isset($_POST['accion']) && $_POST['accion'] === 'alta_doctor') {
    $resultado = PA_Add_doctor($_POST['name_doctor'], $_POST['surname_doctor']);

    if ($resultado == -1)      { $mensaje = "El nombre está vacío"; }
    else if ($resultado == -2) { $mensaje = "Los apellidos están vacíos"; }
    else                       { $mensaje = "Doctor insertado con éxito"; }
}

$_SESSION['lista_doctores'] = [];
$doctoresBD = PA_List_doctors();
foreach ($doctoresBD as $doc) {
    $_SESSION['lista_doctores'][] = $doc;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Doctores</title></head>
<body>
    <h2>Cuadro Médico</h2>
    <?php if (isset($mensaje)): ?>
        <p style="color: green; font-weight: bold;"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <h3>Doctores disponibles (Total: <?php echo count($_SESSION['lista_doctores']); ?>)</h3>
    <?php if (!empty($_SESSION['lista_doctores'])): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr><th>ID</th><th>Nombre</th><th>Apellidos</th></tr>
            <?php foreach ($_SESSION['lista_doctores'] as $doc): ?>
                <tr>
                    <td><?php echo $doc['id_doctor']; ?></td>
                    <td><?php echo $doc['name_doctor']; ?></td>
                    <td><?php echo $doc['surname_doctor']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No hay doctores.</p>
    <?php endif; ?>
    <hr><a href="../src/index.html">Volver al portal</a>
</body>
</html>