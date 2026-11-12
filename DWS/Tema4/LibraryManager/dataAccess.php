<?php
$host = '127.0.0.1';
$port = 3306;
$database = 'library_manager';
$username = 'root';
$password = '';

mysqli_report(MYSQLI_REPORT_OFF);
$connection = @new mysqli($host, $username, $password, $database, $port);

// --- FUNCIONES DE ESCRITURA ---
function PA_Add_book(string $title, string $author) {
    global $connection;
    $stmt = $connection->prepare('CALL Add_book(?,?,@res)');
    $stmt->bind_param('ss', $title, $author);
    $stmt->execute();
    $stmt->close();
    return $connection->query('SELECT @res AS res')->fetch_assoc()['res'];
}

function PA_Modify_book(int $id_book, string $title, string $author) {
    global $connection;
    $stmt = $connection->prepare('CALL Modify_book(?,?,?,@res)');
    $stmt->bind_param('iss', $id_book, $title, $author);
    $stmt->execute();
    $stmt->close();
    return $connection->query('SELECT @res AS res')->fetch_assoc()['res'];
}

function PA_Delete_book(int $id_book) {
    global $connection;
    $stmt = $connection->prepare('CALL Delete_book(?,@res)');
    $stmt->bind_param('i', $id_book);
    $stmt->execute();
    $stmt->close();
    return $connection->query('SELECT @res AS res')->fetch_assoc()['res'];
}

function PA_Add_loan(string $borrower, string $loan_date, int $id_book) {
    global $connection;
    $stmt = $connection->prepare('CALL Add_loan(?,?,?,@res)');
    $stmt->bind_param('ssi', $borrower, $loan_date, $id_book);
    $stmt->execute();
    $stmt->close();
    return $connection->query('SELECT @res AS res')->fetch_assoc()['res'];
}

// --- FUNCIONES DE LECTURA ---
function PA_List_books() {
    global $connection;
    $stmt = $connection->prepare('CALL List_books()');
    $stmt->execute();
    $books = [];
    if ($stmt->field_count > 0) {
        $res = $stmt->get_result();
        while ($fila = $res->fetch_assoc()) {
            $books[] = $fila; // Mapeo directo
        }
        $res->free();
    }
    $stmt->close();
    return $books;
}

function PA_Get_book(int $id_book) {
    global $connection;
    $stmt = $connection->prepare('CALL Get_book(?)');
    $stmt->bind_param('i', $id_book);
    $stmt->execute();
    $books = [];
    if ($stmt->field_count > 0) {
        $res = $stmt->get_result();
        while ($fila = $res->fetch_assoc()) {
            $books[] = $fila;
        }
        $res->free();
    }
    $stmt->close();
    return $books;
}

function PA_List_loans() {
    global $connection;
    $stmt = $connection->prepare('CALL List_loans()');
    $stmt->execute();
    $loans = [];
    if ($stmt->field_count > 0) {
        $res = $stmt->get_result();
        while ($fila = $res->fetch_assoc()) {
            $loans[] = $fila; 
        }
        $res->free();
    }
    $stmt->close();
    return $loans;
}
?>