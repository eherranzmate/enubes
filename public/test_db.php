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
    echo "Connected successfully";
}
?>
