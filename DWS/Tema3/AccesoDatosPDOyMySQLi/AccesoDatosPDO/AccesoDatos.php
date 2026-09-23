<?php

$host = '127.0.0.1';
$port = 3306;
$database = 'sakila';
$username = 'guilleDB';
$password = '1234';

$connection = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);

$error = '';
$totalAlquileres = 0;

try {
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $connection->exec('SET @totalAlquileres = 0');
    $callStatement = $connection->query('CALL TotalAlquileres(@totalAlquileres)');
    $callStatement->closeCursor();

    $result = $connection->query('SELECT @totalAlquileres AS total_alquileres');
    $totalAlquileres = (int) $result->fetchColumn();
} catch (PDOException $e) {
    $error = 'No se pudo obtener el total de alquileres: ' . $e->getMessage();
}