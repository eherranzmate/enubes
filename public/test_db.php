<?php
// Configuración de conexión
$hostname = 'localhost';
$username = 'root';
$password = ''; 
$database = 'enubes';
$port = 3306;
$socket = '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock'; 

// Conexión
$mysqli = new mysqli($hostname, $username, $password, $database, $port, $socket);

// Verificar conexión
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    echo "Connected successfully<br>";
}


$query = "SELECT username, password FROM users";

// Ejecutar la consulta
if ($result = $mysqli->query($query)) {
    // Comprobar si hay resultados
    if ($result->num_rows > 0) {
        // Iterar sobre los resultados y mostrar nombres de usuarios
        while ($row = $result->fetch_assoc()) {
            echo "Nombre: " . $row['username'] . "<br>";
            echo "Contraseña: " . $row['password'] . "<br>";
        }
    } else {
        echo "No se encontraron usuarios.";
    }

    // Liberar el resultado
    $result->free();
} else {
    echo "Error al ejecutar la consulta: " . $mysqli->error;
}

// Cerrar la conexión
$mysqli->close();

?>
