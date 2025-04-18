<?php
header('Content-Type: application/json');

// Conexión a la base de datos (ajusta con tus datos reales)
$host = 'localhost';
$usuario = 'tu_usuario';
$contrasena = 'tu_contraseña';
$base_datos = 'nombre_de_tu_base_de_datos';

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);
if ($conn->connect_error) {
    die(json_encode([]));
}

$term = isset($_GET['term']) ? $conn->real_escape_string($_GET['term']) : '';

if (strlen($term) < 2) {
    echo json_encode([]);
    exit;
}

// Ajusta el nombre de tu tabla y columnas según tu base de datos
$sql = "SELECT codigo_identificacion, razon_social, direccion, ciudad, telefono, correo_cliente, persona_contacto 
        FROM clientes 
        WHERE codigo_identificacion LIKE '%$term%' OR razon_social LIKE '%$term%' 
        LIMIT 10";

$resultado = $conn->query($sql);

$sugerencias = [];

while ($fila = $resultado->fetch_assoc()) {
    $sugerencias[] = [
        'label' => $fila['codigo_identificacion'] . ' - ' . $fila['razon_social'],
        'data' => $fila
    ];
}

echo json_encode($sugerencias);
$conn->close();
?>
