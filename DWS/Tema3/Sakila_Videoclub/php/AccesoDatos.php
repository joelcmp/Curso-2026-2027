<?php
$servidor = "localhost";
$usuario  = "root";
$password = "";
$bd       = "nombre_bd";

$conexion = new mysqli($servidor, $usuario, $password, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

echo "Conexión exitosa";
?>