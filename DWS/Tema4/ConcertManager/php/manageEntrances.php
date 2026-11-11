<?php

require_once __DIR__ . '/AccesoDatos.php';

session_start();


if (isset($_POST['accion']) && $_POST['accion'] === 'alta_entrada') {
    $resultado = PA_Register_entrance($_POST['adquisition_date'], (int)$_POST['id_concert']);

    if ($resultado == -1) {
        $mensaje = "Datos incompletos (fecha o id de concierto vacíos)";
    } else if ($resultado == -2) {
        $mensaje = "El concierto indicado no existe";
    } else {
        $mensaje = "Entrada registrada con éxito";
    }
}

$_SESSION['lista_entrances'] = [];
$entrancesDeBD = PA_List_entrance();
foreach ($entrancesDeBD as $entrance) {
    $_SESSION['lista_entrances'][] = $entrance;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Entradas</title>
</head>

<body>

    <h2>Gestión de Entradas</h2>

    <?php if (isset($mensaje)): ?>
        <p style="color: green; font-weight: bold;"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <h3>Lista de entradas (Total: <?php echo count($_SESSION['lista_entrances']); ?>)</h3>

    <?php if (!empty($_SESSION['lista_entrances'])): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Id Entrada</th>
                    <th>Fecha Adquisición</th>
                    <th>Id Concierto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['lista_entrances'] as $entrance): ?>
                    <tr>
                        <td><?php echo $entrance['id_entrance']; ?></td>
                        <td><?php echo $entrance['adquisition_date']; ?></td>
                        <td><?php echo $entrance['id_concert']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay entradas registradas.</p>
    <?php endif; ?>

    <hr>
    <a href="../src/index.html">Volver al portal</a>

</body>

</html>