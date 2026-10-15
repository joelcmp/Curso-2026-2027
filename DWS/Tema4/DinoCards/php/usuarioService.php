<?php

require_once __DIR__ . '/../src/AccesoDatos.php';
require_once __DIR__ . '/../php/mensajes.php';

function registrarUsuario(string $usuario, string $email, string $password, string $confirmarPassword)
{
    global $mensajes;

    if (empty($usuario)) {

        return ['exito' => false, 'mensaje' => $mensajes['servicio'][-12]];
    }
    if (empty($email)) {

        return ['exito' => false, 'mensaje' => $mensajes['servicio'][-13]];
    }
    if ($password !== $confirmarPassword) {

        return ['exito' => false, 'mensaje' => $mensajes['servicio'][-14]];
    }

    $codigo = PA_Registrar($usuario, $email, $password);

    $exito = ((int)$codigo === 0);
    $mensaje = $mensajes['sp_registro'][$codigo] ?? 'Error desconocido en el registro.';

    return ['exito' => $exito, 'mensaje' => $mensaje];
}
function loginUsuario(string $usuario, string $password)
{
    global $mensajes;

    if (empty($usuario)) {
        return ['exito' => false, 'mensaje' => $mensajes['servicio'][-15]];
    }
    if (empty($password)) {
        return ['exito' => false, 'mensaje' => $mensajes['servicio'][-16]];
    }

    $codigo = PA_Login($usuario, $password);
    
    $exito = ((int)$codigo['resultado'] === 0);

    $mensaje = $mensajes['sp_login'][$codigo['resultado']] ?? 'Error desconocido en el login.';
    

    return ['exito' => $exito, 'mensaje' => $mensaje,'usuario'=>$codigo['usuario']];
}
