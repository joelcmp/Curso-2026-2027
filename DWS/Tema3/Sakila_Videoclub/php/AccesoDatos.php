<?php

$host = '127.0.0.1';
$port = 3306;
$database = 'sakila';
$username = 'JoelcmpDB';
$password = 'Mbappedictador';

mysqli_report(MYSQLI_REPORT_OFF);
$connection = @new mysqli($host, $username, $password, $database, $port);

$error = '';
$films = [];
$totalFilms = 0;
$averageRating = 0;
$averageLength = 0;
$totalAlquileres = 0;

if ($error === '') {
        $alquileresResult = $connection->query("CALL TotalAlquileres()");
 
        if ($alquileresResult) {
 
            $alquileres = $alquileresResult->fetch_assoc();
            $totalAlquileres = (int) $alquileres['total_aquileres'];
            $alquileresResult->free();

        } else {
 
            $error = 'No se pudo ejecutar el procedimiento TotalAlquileres: '
                . $connection->error;
 
        }
    }


$connection->close();
