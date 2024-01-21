<?php
// Configuración de la base de datos (ejemplo con MySQL)
$servername = "localhost";
$username = "root";
$password = "Palamor_5";
$dbname = "jugadores";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si la conexión está activa
if (mysqli_ping($conn)) {
    echo "Conexión activa.<br>";
} else {
    echo "Conexión inactiva.";
}

// Obtener todos los jugadores
$sql = "SELECT * FROM jugadores";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los datos de los jugadores
    $jugadores = array();

    // Iterar sobre los resultados y agregar a array de jugadores
    while ($row = $result->fetch_assoc()) {
        $jugadores[] = $row;
    }

    // Devolver los jugadores en formato JSON
    echo json_encode($jugadores);
} else {
    // No se encontraron jugadores
    echo json_encode(array('mensaje' => 'No se encontraron jugadores.'));
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

