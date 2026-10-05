<?php
require_once __DIR__ . '/../src/AccesoDatos.php';

$usuario = trim($_POST['usuario'] ?? '');
$contrasena = $_POST['contrasena'] ?? '';

if (empty($usuario) || empty($contrasena)) {
    $error = 'El usuario o la contraseña no son validos';
} else {
    try {
        $resultado = PA_Login(
            $usuario,
            $contrasena
        );
    } catch (Throwable $exception) {
        $error = $exception->getMessage();
    }
}

?>