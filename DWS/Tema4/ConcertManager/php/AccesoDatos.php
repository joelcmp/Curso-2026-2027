<?php


$host = '127.0.0.1';
$port = 3306;
$database = 'concert_manager';
$username = 'root';
$password = '';

mysqli_report(MYSQLI_REPORT_OFF);
$connection = @new mysqli($host, $username, $password, $database, $port);


function PA_Add_concert(string $name_band, string $date_concert, float $price)
{
    global $connection;


    $sql = 'CALL Add_concert(?,?,?,@resultado)';
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
    }

    $stmt->bind_param('ssd', $name_band, $date_concert, $price);

    if (!$stmt->execute()) {
        $error = $stmt->error;
        $stmt->close();
        throw new RuntimeException('Error al ejecutar el procedimiento: ' . $error);
    }


    $stmt->close();

    $resultado = $connection->query('SELECT @resultado AS resultado ');

    if (!$resultado) {
        throw new RuntimeException('Error al recuperar el parametro OUT: ' . $connection->error);
    }

    $fila = $resultado->fetch_assoc();
    $resultado->free();
    return $fila['resultado'];
}


function PA_Register_entrance(string $adquisition_date, int $id_concert)
{
    global $connection;


    $sql = 'CALL Register_entrance(?,?,@resultado)';
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
    }
    $stmt->bind_param('si', $adquisition_date, $id_concert);

    if (!$stmt->execute()) {
        $error = $stmt->error;
        $stmt->close();
        throw new RuntimeException('Error al ejecutar el procedimiento: ' . $error);
    }

    $stmt->close();

    $resultado = $connection->query('SELECT @resultado AS resultado ');

    if (!$resultado) {
        throw new RuntimeException('Error al recuperar el parametro OUT: ' . $connection->error);
    }

    $fila = $resultado->fetch_assoc();
    $resultado->free();
    return $fila['resultado'];
}

function PA_List_concert()
{
    global $connection;


    $sql = 'CALL List_concert()';
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
    }

    if (!$stmt->execute()) {
        $error = $stmt->error;
        $stmt->close();
        throw new RuntimeException('Error al ejecutar el procedimiento: ' . $error);
    }

    if ($stmt->field_count > 0) {
        $resultadoSelect = $stmt->get_result();
        if ($resultadoSelect) {
            $concerts = [];
            while ($fila = $resultadoSelect->fetch_assoc()) {
                $concert = [];
                $concert['id_concert'] = $fila['id_concert'];
                $concert['name_band'] = $fila['name_band'];
                $concert['date_concert'] = $fila['date_concert'];
                $concert['price'] = $fila['price'];
                $concerts[] = $concert;
            }
            $resultadoSelect->free();
        }
    }

    $stmt->close();

    return $concerts;
}


function PA_List_entrance()
{
    global $connection;


    $sql = 'CALL List_entrance()';
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
    }

    if (!$stmt->execute()) {
        $error = $stmt->error;
        $stmt->close();
        throw new RuntimeException('Error al ejecutar el procedimiento: ' . $error);
    }

    if ($stmt->field_count > 0) {
        $resultadoSelect = $stmt->get_result();
        if ($resultadoSelect) {
            $entrances = [];
            while ($fila = $resultadoSelect->fetch_assoc()) {
                $entrance = [];
                $entrance['id_entrance'] = $fila['id_entrance'];
                $entrance['adquisition_date'] = $fila['adquisition_date'];
                $entrance['id_concert'] = $fila['id_concert'];
                $entrances[] = $entrance;
            }
            $resultadoSelect->free();
        }
    }

    $stmt->close();

    return $entrances;
}


function PA_Get_concert(int $id_concert)
{
    global $connection;


    $sql = 'CALL Get_concert(?)';
    $stmt = $connection->prepare($sql);
    if (!$stmt) {
        throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
    }

    $stmt->bind_param('i', $id_concert);

    if (!$stmt->execute()) {
        $error = $stmt->error;
        $stmt->close();
        throw new RuntimeException('Error al ejecutar el procedimiento: ' . $error);
    }

    if ($stmt->field_count > 0) {
        $resultadoSelect = $stmt->get_result();
        if ($resultadoSelect) {
            $concerts = [];
            while ($fila = $resultadoSelect->fetch_assoc()) {
                $concert = [];
                $concert['id_concert'] = $fila['id_concert'];
                $concert['name_band'] = $fila['name_band'];
                $concert['date_concert'] = $fila['date_concert'];
                $concert['price'] = $fila['price'];
                $concerts[] = $concert;
            }
            $resultadoSelect->free();
        }
    }

    $stmt->close();

    return $concerts;
}

