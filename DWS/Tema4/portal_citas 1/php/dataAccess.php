<?php
$host = '127.0.0.1';
$port = 3306;
$database = 'clinic_manager';
$username = 'root';
$password = '';

mysqli_report(MYSQLI_REPORT_OFF);
$connection = @new mysqli($host, $username, $password, $database, $port);

// --- DOCTORES ---
function PA_Add_doctor(string $name_doctor, string $surname_doctor)
{
    global $connection;
    $sql = 'CALL Add_doctor(?,?,@resultado)';
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ss', $name_doctor, $surname_doctor);
    $stmt->execute();
    $stmt->close();

    $resultado = $connection->query('SELECT @resultado AS resultado');
    $fila = $resultado->fetch_assoc();
    $resultado->free();
    return $fila['resultado'];
}

function PA_List_doctors()
{
    global $connection;
    $sql = 'CALL List_doctors()';
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $doctors = [];
    if ($stmt->field_count > 0) {
        $res = $stmt->get_result();
        while ($fila = $res->fetch_assoc()) {
            $doctor = [];
            $doctor['id_doctor'] = $fila['id_doctor'];
            $doctor['name_doctor'] = $fila['name_doctor'];
            $doctor['surname_doctor'] = $fila['surname_doctor'];
            $doctors[] = $doctor;
        }
        $res->free();
    }
    $stmt->close();
    return $doctors;
}

function PA_Get_doctor(int $id_doctor)
{
    global $connection;
    $sql = 'CALL Get_doctor(?)';
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('i', $id_doctor);
    $stmt->execute();

    $doctors = [];
    if ($stmt->field_count > 0) {
        $res = $stmt->get_result();
        while ($fila = $res->fetch_assoc()) {
            $doctor = [];
            $doctor['id_doctor'] = $fila['id_doctor'];
            $doctor['name_doctor'] = $fila['name_doctor'];
            $doctor['surname_doctor'] = $fila['surname_doctor'];
            $doctors[] = $doctor;
        }
        $res->free();
    }
    $stmt->close();
    return $doctors;
}

// --- CITAS ---
function PA_Add_appointment(string $patient_name, string $specialty, string $date_appointment, int $id_doctor)
{
    global $connection;
    $sql = 'CALL Add_appointment(?,?,?,?,@resultado)';
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('sssi', $patient_name, $specialty, $date_appointment, $id_doctor);
    $stmt->execute();
    $stmt->close();

    $resultado = $connection->query('SELECT @resultado AS resultado');
    $fila = $resultado->fetch_assoc();
    $resultado->free();
    return $fila['resultado'];
}

function PA_Modify_appointment(int $id_appointment, string $patient_name, string $specialty, string $date_appointment, int $id_doctor)
{
    global $connection;
    $sql = 'CALL Modify_appointment(?,?,?,?,?,@resultado)';
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('isssi', $id_appointment, $patient_name, $specialty, $date_appointment, $id_doctor);
    $stmt->execute();
    $stmt->close();

    $resultado = $connection->query('SELECT @resultado AS resultado');
    $fila = $resultado->fetch_assoc();
    $resultado->free();
    return $fila['resultado'];
}

function PA_List_appointments()
{
    global $connection;
    $sql = 'CALL List_appointments()';
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $appointments = [];
    if ($stmt->field_count > 0) {
        $res = $stmt->get_result();
        while ($fila = $res->fetch_assoc()) {
            $appointment = [];
            $appointment['id_appointment'] = $fila['id_appointment'];
            $appointment['patient_name'] = $fila['patient_name'];
            $appointment['specialty'] = $fila['specialty'];
            $appointment['date_appointment'] = $fila['date_appointment'];
            $appointment['id_doctor'] = $fila['id_doctor'];
            $appointments[] = $appointment;
        }
        $res->free();
    }
    $stmt->close();
    return $appointments;
}
?>