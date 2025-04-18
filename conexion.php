<?php
$host = "localhost";
$user = "root";
$password = ""; // En XAMPP por defecto está vacío
$db = "sistema_solicitudes";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>