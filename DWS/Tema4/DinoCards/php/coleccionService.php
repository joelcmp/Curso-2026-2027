<?php

require_once __DIR__ . '/../src/AccesoDatos.php';
require_once __DIR__ . '/../php/mensajes.php';

function obtenerColeccion(int $usuario_id)
{
    global $mensajes;

    $codigo = PA_ObtenerColeccion($usuario_id);

    $exito = ((int)$codigo['resultado'] === 0);
    $mensaje = $mensajes['sp_obtener_coleccion'][(int)$codigo['resultado']] ?? 'Error desconocido al obtener la colección.';

    return [
        'exito' => $exito,
        'mensaje' => $mensaje,
        'dinosaurios' => $codigo['dinosaurios']
    ];
}

function obtenerTodasLasCartas(int $usuario_id)
{
    global $mensajes;

    $codigo = PA_ObtenerTodasLasCartasConEstado($usuario_id);

    $exito = ((int)$codigo['resultado'] === 0);
    $mensaje = $mensajes['sp_obtener_coleccion'][(int)$codigo['resultado']] ?? 'Error desconocido al obtener las cartas.';

    return [
        'exito' => $exito,
        'mensaje' => $mensaje,
        'cartas' => $codigo['cartas']
    ];
}

function anadirCarta(int $usuario_id)
{
    global $mensajes;

    $codigo = PA_AnadirCarta($usuario_id);

    $exito = ((int)$codigo === 0);
    $mensaje = $mensajes['sp_anadir_carta'][(int)$codigo] ?? 'Error desconocido al añadir la carta.';

    return [
        'exito' => $exito,
        'mensaje' => $mensaje
    ];
}