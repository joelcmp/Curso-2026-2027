    <?php

    $host = '127.0.0.1';
    $port = 3306;
    $database = 'dinocards';
    $username = 'JoelcmpDB';
    $password = 'Mbappedictador';

    mysqli_report(MYSQLI_REPORT_OFF);
    $connection = @new mysqli($host, $username, $password, $database, $port);


    function PA_Login(string $usuario, string $contrasena)
    {
        global $connection;

        if ($connection->connect_errno) {
            throw new RuntimeException('Error de conexión: ' . $connection->connect_error);
        }
        $sql = 'CALL Login(?,?,@resultado)';
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
        }
        $contrasenaHash = md5($contrasena);
        $stmt->bind_param('ss', $usuario, $contrasenaHash);

        if (!$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException('Error al ejecutar el procedimiento: ' . $error);
        }

        $filas = $stmt->get_result();
        $usuario_datos = null;
        if ($filas) {
            $usuario_datos = $filas->fetch_assoc();
        }


        while ($stmt->more_results()) {
            $stmt->next_result();
        }
        $stmt->close();

        $resultado = $connection->query('SELECT @resultado AS resultado ');

        if (!$resultado) {
            throw new RuntimeException('Error al recuperar el paramatro OUT: ' . $connection->error);
        }

        $fila = $resultado->fetch_assoc();
        $resultado->free();
        return [
            'resultado' => $fila['resultado'],
            'usuario' => $usuario_datos
        ];
    }


    function PA_Registrar(string $usuario, string $email, string $contrasena)
    {
        global $connection;
        if ($connection->connect_errno) {
            throw new RuntimeException('Error de conexión: ' . $connection->connect_error);
        }

        $sql = 'CALL Registro(?, ?, ?, @resultado)';
        $stmt = $connection->prepare($sql);

        if (!$stmt) {
            throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
        }
        $contrasenaHash = md5($contrasena);
        $stmt->bind_param('sss',  $usuario, $email, $contrasenaHash);

        if (!$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException('Error al ejecutar el procedimiento: ' . $error);
        }

        while ($stmt->more_results()) {
            $stmt->next_result();
        }

        $stmt->close();

        $resultado = $connection->query('SELECT @resultado AS resultado');

        if (!$resultado) {
            throw new RuntimeException('Error al recuperar el parámetro OUT: ' . $connection->error);
        }

        $fila = $resultado->fetch_assoc();
        $resultado->free();

        return $fila['resultado'];
    }

    function PA_AnadirCarta(int $id)
    {
        global $connection;

        if ($connection->connect_errno) {
            throw new RuntimeException('Error de conexión: ' . $connection->connect_error);
        }
        $sql = 'CALL AnadirNuevaCartaAColeccion(?, @resultado)';
        $stmt = $connection->prepare($sql);

        if (!$stmt) {
            throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
        }
        $stmt->bind_param('i', $id);

        if (!$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException('Error al ejecutar el procedimiento: ' . $error);
        }

        $stmt->close();

        $resultado = $connection->query('SELECT @resultado AS resultado');

        if (!$resultado) {
            throw new RuntimeException('Error al recuperar el parámetro OUT: ' . $connection->error);
        }

        $fila = $resultado->fetch_assoc();
        $resultado->free();

        return $fila['resultado'];
    }

    function PA_ObtenerColeccion(int $id)
    {
        global $connection;

        if ($connection->connect_errno) {
            throw new RuntimeException('Error de conexión: ' . $connection->connect_error);
        }
        $sql = 'CALL ObtenerColeccion(?,@resultado)';
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
        }
        $stmt->bind_param('i', $id);
        if (!$stmt->execute()) {
            $error = $stmt->error;

            throw new RuntimeException('Error al ejecutar el procedimiento' . $error);
        }
        $filas = $stmt->get_result();
        $dinosaurios = [];
        while ($d = $filas->fetch_assoc()) {
            $dinosaurios[] = $d;
        }

        $stmt->close();

        $resultado = $connection->query('SELECT @resultado AS resultado');
        $fila = $resultado->fetch_assoc();
        $resultado->free();
        $codigo = $fila['resultado'];

        return [
            'resultado' => $codigo,
            'dinosaurios' => $dinosaurios
        ];
    }

    function PA_ObtenerTodasLasCartasConEstado(int $usuario_id)
    {
        global $connection;

        if ($connection->connect_errno) {
            throw new RuntimeException('Error de conexión: ' . $connection->connect_error);
        }

        $sql = 'CALL ObtenerTodasLasCartasConEstado(?, @resultado)';
        $stmt = $connection->prepare($sql);

        if (!$stmt) {
            throw new RuntimeException('Error al preparar el procedimiento: ' . $connection->error);
        }

        $stmt->bind_param('i', $usuario_id);

        if (!$stmt->execute()) {
            $error = $stmt->error;
            $stmt->close();
            throw new RuntimeException('Error al ejecutar el procedimiento: ' . $error);
        }

        $filas = $stmt->get_result();
        $cartas = [];
        while ($c = $filas->fetch_assoc()) {
            $cartas[] = $c;
        }

        while ($stmt->more_results()) {
            $stmt->next_result();
        }
        $stmt->close();

        $resultado = $connection->query('SELECT @resultado AS resultado');

        if (!$resultado) {
            throw new RuntimeException('Error al recuperar el parámetro OUT: ' . $connection->error);
        }

        $fila = $resultado->fetch_assoc();
        $resultado->free();

        return [
            'resultado' => $fila['resultado'],
            'cartas' => $cartas
        ];
    }
