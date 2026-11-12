<?php
$host = '127.0.0.1';
$port = 3306;
$database = 'game_manager';
$username = 'root';
$password = '';

mysqli_report(MYSQLI_REPORT_OFF);
$connection = @new mysqli($host, $username, $password, $database, $port);

// --- JUEGOS ---
function PA_Add_game(string $title) {
    global $connection;
    $stmt = $connection->prepare('CALL Add_game(?,@res)');
    $stmt->bind_param('s', $title);
    $stmt->execute();
    $stmt->close();
    return $connection->query('SELECT @res AS res')->fetch_assoc()['res'];
}

function PA_Modify_game(int $id_game, string $title) {
    global $connection;
    $stmt = $connection->prepare('CALL Modify_game(?,?,@res)');
    $stmt->bind_param('is', $id_game, $title);
    $stmt->execute();
    $stmt->close();
    return $connection->query('SELECT @res AS res')->fetch_assoc()['res'];
}

function PA_Delete_game(int $id_game) {
    global $connection;
    $stmt = $connection->prepare('CALL Delete_game(?,@res)');
    $stmt->bind_param('i', $id_game);
    $stmt->execute();
    $stmt->close();
    return $connection->query('SELECT @res AS res')->fetch_assoc()['res'];
}

function PA_List_games() {
    global $connection;
    $stmt = $connection->prepare('CALL List_games()');
    $stmt->execute();
    $games = [];
    if ($stmt->field_count > 0) {
        $res = $stmt->get_result();
        while ($fila = $res->fetch_assoc()) { $games[] = $fila; }
        $res->free();
    }
    $stmt->close();
    return $games;
}

function PA_Get_game(int $id_game) {
    global $connection;
    $stmt = $connection->prepare('CALL Get_game(?)');
    $stmt->bind_param('i', $id_game);
    $stmt->execute();
    $games = [];
    if ($stmt->field_count > 0) {
        $res = $stmt->get_result();
        while ($fila = $res->fetch_assoc()) { $games[] = $fila; }
        $res->free();
    }
    $stmt->close();
    return $games;
}

// --- PARTIDAS ---
function PA_Add_play(string $player, int $id_game) {
    global $connection;
    $stmt = $connection->prepare('CALL Add_play(?,?,@res)');
    $stmt->bind_param('si', $player, $id_game);
    $stmt->execute();
    $stmt->close();
    return $connection->query('SELECT @res AS res')->fetch_assoc()['res'];
}

function PA_Modify_play(int $id_play, string $player, int $id_game) {
    global $connection;
    $stmt = $connection->prepare('CALL Modify_play(?,?,?,@res)');
    $stmt->bind_param('isi', $id_play, $player, $id_game);
    $stmt->execute();
    $stmt->close();
    return $connection->query('SELECT @res AS res')->fetch_assoc()['res'];
}

function PA_List_plays() {
    global $connection;
    $stmt = $connection->prepare('CALL List_plays()');
    $stmt->execute();
    $plays = [];
    if ($stmt->field_count > 0) {
        $res = $stmt->get_result();
        while ($fila = $res->fetch_assoc()) { $plays[] = $fila; }
        $res->free();
    }
    $stmt->close();
    return $plays;
}
?>