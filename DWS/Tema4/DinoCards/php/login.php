<?php



require_once __DIR__ . '/../php/usuarioService.php';


$usuario = $_POST['usuario'] ?? '';
$password = $_POST['contrasena'] ?? '';

try {
    $resultado = loginUsuario($usuario, $password);
} catch (Throwable $exception) {
    $error = $exception->getMessage();
}
