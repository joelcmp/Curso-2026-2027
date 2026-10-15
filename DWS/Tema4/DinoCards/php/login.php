<?php


require_once __DIR__ . '/../php/usuarioService.php';




$usuario = $_POST['usuario'] ?? '';
$password = $_POST['contrasena'] ?? '';


try {
    $resultado = loginUsuario($usuario, $password);
    

    if ($resultado['exito']) {
        $_SESSION['id'] = $resultado['usuario']['id'];
        $_SESSION['username'] = $resultado['usuario']['username'];
        $_SESSION['email'] = $resultado['usuario']['email'];
        $_SESSION['fecha_registro'] = $resultado['usuario']['fecha_registro'];
        $_SESSION['ultima_obtencion'] = $resultado['usuario']['ultima_obtencion'];
    }
} catch (Throwable $exception) {
    $error = $exception->getMessage();
}
