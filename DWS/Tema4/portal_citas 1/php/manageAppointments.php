<?php
require_once __DIR__ . '/dataAccess.php';
session_start();

// 1. PROCESAR ALTA
if (isset($_POST['accion']) && $_POST['accion'] === 'alta_cita') {
    $id_doctor = (int)$_POST['id_doctor'];

    // Validación doble en PHP (igual que el profesor)
    $doctorExiste = PA_Get_doctor($id_doctor);

    if (count($doctorExiste) == 0) {
        $mensaje = "Doctor no encontrado. Pruebe otro ID.";
    } else {
        $resultado = PA_Add_appointment($_POST['patient_name'], $_POST['specialty'], $_POST['date_appointment'], $id_doctor);
        if ($resultado == -1) {
            $mensaje = "Paciente vacío";
        } else if ($resultado == -2) {
            $mensaje = "Especialidad vacía";
        } else if ($resultado == -3) {
            $mensaje = "Fecha vacía";
        } else if ($resultado == -4) {
            $mensaje = "La fecha debe ser futura";
        } else {
            $mensaje = "Cita reservada con éxito";
        }
    }
}

// 2. PREPARAR MODO EDICIÓN
if (isset($_POST['accion']) && $_POST['accion'] === 'editar_cita') {
    $_SESSION['cita_editando'] = (int)$_POST['id_appointment'];
}

// 3. PROCESAR MODIFICACIÓN
if (isset($_POST['accion']) && $_POST['accion'] === 'guardar_modificacion') {
    $resultado = PA_Modify_appointment(
        $_SESSION['cita_editando'],
        $_POST['patient_name'],
        $_POST['specialty'],
        $_POST['date_appointment'],
        (int)$_POST['id_doctor']
    );

    if ($resultado == 0) {
        $mensaje = "Cita modificada correctamente";
        unset($_SESSION['cita_editando']); // Salimos del modo edición
    } else {
        $mensaje = "Error al modificar (revisa los datos)";
    }
}

// 4. SINCRONIZAR LISTA
$_SESSION['lista_citas'] = [];
$citasBD = PA_List_appointments();
foreach ($citasBD as $cita) {
    $_SESSION['lista_citas'][] = $cita;
}

// Variable para saber si mostramos el formulario de edición
$estaEditando = isset($_SESSION['cita_editando']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Citas</title>
</head>

<body>
    <h2>Gestión de Citas</h2>
    <?php if (isset($mensaje)): ?>
        <p style="color: blue; font-weight: bold;"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <h3>Citas Registradas (Total: <?php echo count($_SESSION['lista_citas']); ?>)</h3>
    <?php if (!empty($_SESSION['lista_citas'])): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Especialidad</th>
                <th>Fecha y Hora</th>
                <th>ID Doctor</th>
                <th>Acción</th>
            </tr>
            <?php foreach ($_SESSION['lista_citas'] as $cita): ?>
                <tr>
                    <td><?php echo $cita['id_appointment']; ?></td>
                    <td><?php echo $cita['patient_name']; ?></td>
                    <td><?php echo $cita['specialty']; ?></td>
                    <td><?php echo $cita['date_appointment']; ?></td>
                    <td><?php echo $cita['id_doctor']; ?></td>
                    <td>
                        <!-- Botón para activar el modo edición -->
                        <form action="" method="post" style="margin:0;">
                            <input type="hidden" name="id_appointment" value="<?php echo $cita['id_appointment']; ?>">
                            <input type="hidden" name="accion" value="editar_cita">
                            <button type="submit">Modificar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No hay citas.</p>
    <?php endif; ?>

    <!-- FORMULARIO DE EDICIÓN (Solo aparece si estamos editando) -->
    <?php if ($estaEditando): ?>
        <hr>
        <h3>Modificando la cita ID: <?php echo $_SESSION['cita_editando']; ?></h3>
        <form action="" method="post">
            <label>Nombre Paciente:</label><br>
            <input type="text" name="patient_name" required><br><br>

            <label>Especialidad:</label><br>
            <select name="specialty">
                <option value="Medicina General">Medicina General</option>
                <option value="Pediatría">Pediatría</option>
                <option value="Dermatología">Dermatología</option>
                <option value="Traumatología">Traumatología</option>
            </select><br><br>

            <label>Fecha y Hora:</label><br>
            <input type="datetime-local" name="date_appointment" required><br><br>

            <label>ID Doctor:</label><br>
            <input type="number" name="id_doctor" required><br><br>

            <input type="hidden" name="accion" value="guardar_modificacion">
            <button type="submit">Guardar Cambios</button>
        </form>
    <?php endif; ?>

    <hr><a href="../src/index.html">Volver al portal</a>
</body>

</html>