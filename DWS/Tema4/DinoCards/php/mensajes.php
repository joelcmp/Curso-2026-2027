<?php


$mensajes = [
    'servicio' => [
        -12 => 'El nombre de usuario no puede estar vacío.',
        -13 => 'El correo electrónico no puede estar vacío.',
        -14 => 'Las contraseñas no coinciden.',
        -15 => 'El usuario o email no puede estar vacío.',
        -16 => 'La contraseña no puede estar vacía.',
    ],

    'sp_registro' => [
        0   => 'Usuario registrado correctamente.',
        -1  => 'El usuario, email o contraseña no pueden estar vacíos.',
        -2  => 'El usuario o el email ya están registrados.',
        -99 => 'Error interno de la base de datos.',
    ],

    'sp_login' => [
        0   => 'Inicio de sesión correcto.',
        -1  => 'El email o la contraseña no pueden estar vacíos.',
        -3  => 'Credenciales incorrectas.',
        -99 => 'Error interno de la base de datos.',
    ],

    'sp_anadir_carta' => [
        0   => 'Carta añadida a tu colección correctamente.',
        -8  => 'El usuario no existe.',
        -9  => 'Ya has obtenido una carta en las últimas 24 horas.',
        -99 => 'Error interno de la base de datos.',
    ],

    'sp_obtener_coleccion' => [
        0   => 'Colección obtenida correctamente.',
        -10 => 'El usuario no existe.',
        -99 => 'Error interno de la base de datos.',
    ],
];


?>