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
    echo "Conexión activa.";
} else {
    echo "Conexión inactiva.";
}

// Obtener todos los jugadores
$sql = "SELECT * FROM jugadores";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Construir la tabla HTML
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Equipo</th><th>Posición</th><th>Categoría</th><th>Edad</th></tr>";

    // Iterar sobre los resultados y agregar filas a la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['equipo'] . "</td>";
        echo "<td>" . $row['posicion'] . "</td>";
        echo "<td>" . $row['categoria'] . "</td>";
        echo "<td>" . $row['edad'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    // No se encontraron jugadores
    echo "No se encontraron jugadores.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

