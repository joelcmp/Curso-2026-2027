<?php

require_once __DIR__ . '/../src/AccesoDatos.php';


function registrarUsuario(string $usuario, string $email, string $password, string $confirmarPassword)
{

    if (empty($usuario)) {

        return -12;
    }
    if (empty($email)) {

        return -13;
    }
    if ($password !== $confirmarPassword) {

        return -14;
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
        return -15;
    }
    if (empty($password)) {
        return -16;
    }

    return  PA_Login(
        $usuario,
        $password
    );
}
