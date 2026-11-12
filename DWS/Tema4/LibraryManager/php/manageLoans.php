<?php
require_once __DIR__ . '/dataAccess.php';
session_start();

if (isset($_POST['accion']) && $_POST['accion'] === 'alta_prestamo') {
    $id_book = (int)$_POST['id_book'];
    
    // Validación doble (El libro debe existir)
    $libroExiste = PA_Get_book($id_book);
    
    if (count($libroExiste) == 0) {
        $mensaje = "El libro indicado no existe. Pruebe con otro ID.";
    } else {
        $res = PA_Add_loan($_POST['borrower'], $_POST['loan_date'], $id_book);
        $mensaje = ($res == 0) ? "Préstamo registrado con éxito" : "Error: Revisa los datos";
    }
}

$_SESSION['lista_prestamos'] = [];
foreach (PA_List_loans() as $pres) { $_SESSION['lista_prestamos'][] = $pres; }
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Préstamos</title></head>
<body>
    <h2>Préstamos Activos</h2>
    <?php if (isset($mensaje)): ?><p style="color:blue; font-weight:bold;"><?php echo $mensaje; ?></p><?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>ID</th><th>Lector</th><th>Fecha</th><th>ID Libro</th><th>Título del Libro (JOIN)</th></tr>
        <?php foreach ($_SESSION['lista_prestamos'] as $p): ?>
        <tr>
            <td><?php echo $p['id_loan']; ?></td>
            <td><?php echo $p['borrower']; ?></td>
            <td><?php echo $p['loan_date']; ?></td>
            <td><?php echo $p['id_book']; ?></td>
            <!-- ¡Aquí mostramos el JOIN! -->
            <td><?php echo $p['book_title']; ?></td> 
        </tr>
        <?php endforeach; ?>
    </table>
    <hr><a href="../src/index.html">Volver al portal</a>
</body>
</html>