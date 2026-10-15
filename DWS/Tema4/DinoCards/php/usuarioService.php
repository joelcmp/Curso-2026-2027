<?php

require_once __DIR__ . '/../src/AccesoDatos.php';
require_once __DIR__ . '/../php/mensajes.php';

function registrarUsuario(string $usuario, string $email, string $password, string $confirmarPassword)
{

    if (empty($usuario)) {

        return ['exito' => false, 'mensaje' => $mensajes['servicio'][-12]];
    }
    if (empty($email)) {

        return ['exito' => false,'mensaje'=> $mensajes['servicio'][-13]];
    }
    if ($password !== $confirmarPassword) {

        return ['exito' => false,'mensaje'=> $mensajes['servicio'][-14]];
    }

    return PA_Registrar(
        $usuario,
        $email,
        $password
    );
}
function loginUsuario(string $usuario, string $password)
{

    if (empty($usuario)) {
        return ['exito' => false,'mensaje'=> $mensajes['servicio'][-15]];
    }
    if (empty($password)) {
        return ['exito' => false,'mensaje'=> $mensajes['servicio'][-16]];
    }

    return  PA_Login(
        $usuario,
        $password
    );
}
