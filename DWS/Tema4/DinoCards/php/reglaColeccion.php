<?php

require_once __DIR__ . '/../php/coleccionService.php';

$usuario_id = $_SESSION['id'] ?? null;
$resultado_abrir = null;
$error = null;

if ($usuario_id === null) {
    $error = 'Debes iniciar sesión para abrir una carta.';
} else {
    try {
        $resultado_abrir = anadirCarta((int)$usuario_id);
    } catch (Throwable $exception) {
        $error = $exception->getMessage();
    }
}
