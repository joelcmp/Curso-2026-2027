<?php


require_once __DIR__ . '/../php/usuarioService.php';

$usuario = $_POST['usuario-registro'] ?? '';
$email = $_POST['email-registro'] ?? '';
$password = $_POST['contrasena'] ?? '';
$confirmarPassword = $_POST['confirmaContrasena'] ?? '';

try {
    $resultado = registrarUsuario($usuario, $email, $password, $confirmarPassword);
} catch (Throwable $exception) {
    $error = $exception->getMessage();
}

?>