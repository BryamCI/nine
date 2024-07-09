<?php
$host = 'localhost'; // Cambia según tu configuración
$dbname = 'nine2'; // Nombre de la base de datos
$username = 'root'; // Cambia según tu configuración
$password = ''; // Cambia según tu configuración

$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn === false) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
