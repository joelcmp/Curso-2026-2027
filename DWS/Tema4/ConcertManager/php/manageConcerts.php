<?php

require_once __DIR__ . '/AccesoDatos.php';

session_start();



if (isset($_POST['accion']) && $_POST['accion'] === 'alta_concierto') {
    $resultado = PA_Add_concert($_POST['name_band'], $_POST['date_concert'], (float)$_POST['price']);

    if ($resultado == -1) {
        $mensaje = "Nombre vacío";
    } else if ($resultado == -2) {
        $mensaje = "Fecha anterior a hoy";
    } else if ($resultado == -3) {
        $mensaje = "Precio negativo";
    } else {
        $mensaje = "Concierto insertado con éxito";
    }
}
$_SESSION['lista_concerts'] = [];
$concertsDeBD = PA_List_concert();
foreach ($concertsDeBD as $concert) {
    $_SESSION['lista_concerts'][] = $concert;
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Conciertos</title>
</head>

<body>

    <h2>Gestión de Conciertos</h2>

    <?php if (isset($mensaje)): ?>
        <p style="color: green; font-weight: bold;"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <h3>Lista de conciertos (Total: <?php echo count($_SESSION['lista_concerts']); ?>)</h3>

    <?php if (!empty($_SESSION['lista_concerts'])): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Banda</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['lista_concerts'] as $concert): ?>
                    <tr>
                        <td><?php echo $concert['id_concert']; ?></td>
                        <td><?php echo $concert['name_band']; ?></td>
                        <td><?php echo $concert['date_concert']; ?></td>
                        <td><?php echo $concert['price']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay conciertos registrados.</p>
    <?php endif; ?>

    <hr>
    <a href="../src/index.html">Volver al portal</a>

</body>

</html>