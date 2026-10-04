<?php
require_once __DIR__ . '/../src/AccesoDatos.php';


$nombre = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$email = trim($_POST['email'] ?? '');
$tienda = filter_var($_POST['tienda'] ?? null, FILTER_VALIDATE_INT);
$usuario = trim($_POST['usuario'] ?? '');
$contrasena = $_POST['contrasena'] ?? '';

if ($tienda === false || $tienda === null) {
    $error = 'El número de tienda no es válido.';
} else {
    try {
        $resultado = PA_Registrar(
            $nombre,
            $apellido,
            $email,
            $tienda,
            $usuario,
            $contrasena
        );
    } catch (Throwable $exception) {
        $error = $exception->getMessage();
    }
}
