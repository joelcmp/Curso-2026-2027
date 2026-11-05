<?php
// PASO A: Iniciar o reanudar la sesión (OBLIGATORIO al principio)
session_start();

// PASO B: Inicializar el array de citas 'lista_citas' en la sesión si no existe aún
if (!isset($_SESSION["lista_citas"])) {
    $_SESSION["lista_citas"] = [];
}

// PASO C: Comprobar si se ha solicitado borrar todas las citas
if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST["action"] ?? "") == "borrar_todas") {
    $_SESSION["lista_citas"] = [];
}

// PASO D: Si se recibe una nueva cita individual por $_POST, se procesa
if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST["action"] ?? "") == "reservar") {

    // 1. Capturamos los datos que viajan en el POST y validamos en servidor
    $paciente     = trim($_POST["paciente"] ?? "");
    $especialidad = trim($_POST["especialidad"] ?? "");
    $fecha_hora   = trim($_POST["fecha_hora"] ?? "");

    if ($paciente !== "" && $especialidad !== "" && $fecha_hora !== "") {

        $cita = [
            "paciente"     => $paciente,
            "especialidad" => $especialidad,
            "fecha_hora"   => $fecha_hora
        ];

        // Punto 1: comprobación de que no se asigna una nueva cita igual a una anterior
        $duplicada = false;

        foreach ($_SESSION["lista_citas"] as $cita_guardada) {
            if (
                $cita_guardada["paciente"]     === $cita["paciente"] &&
                $cita_guardada["especialidad"] === $cita["especialidad"] &&
                $cita_guardada["fecha_hora"]   === $cita["fecha_hora"]
            ) {
                $duplicada = true;
                break;
            }
        }

        // 2. Acumulamos la nueva cita dentro del array guardado en la SESIÓN
        if (!$duplicada) {
            $_SESSION["lista_citas"][] = $cita;
        }
    }
}

// Punto 4 NO corregido: mensaje siempre definido (tal como estaba)
$mensaje = "Su cita ha sido programada";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Centro Médico - Mis Citas</title>
</head>

<body>

    <h2>Gestión de Citas Médicas</h2>

    <?php if (isset($mensaje)): ?>
        <p style="color: green; font-weight: bold;"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <h3>Citas Registradas en esta Sesión (Total: <?php echo count($_SESSION['lista_citas']); ?>)</h3>

    <!-- PASO E: Renderizar la tabla si existen citas guardadas -->
    <?php if (!empty($_SESSION['lista_citas'])): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Especialidad</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['lista_citas'] as $cita): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cita["paciente"]); ?></td>
                        <td><?php echo htmlspecialchars($cita["especialidad"]); ?></td>
                        <td><?php echo htmlspecialchars($cita["fecha_hora"]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>

        <!-- Formulario para vaciar la sesión -->
        <form action="gestionar_citas.php" method="post">
            <input type="hidden" name="action" value="borrar_todas">
            <button type="submit">
                Cancelar todas las citas
            </button>
        </form>

    <?php else: ?>
        <p>No hay citas agendadas actualmente.</p>
    <?php endif; ?>

    <br>
    <hr>
    <a href="portal_citas.html">+ Pedir otra cita</a>

</body>

</html>