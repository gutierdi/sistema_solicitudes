<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id_usuario, username, rol FROM usuarios WHERE correo = ? AND password = ?");
    $stmt->bind_param("ss", $correo, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_usuario, $username, $rol);
        $stmt->fetch();
        $_SESSION["usuario_id"] = $id_usuario;
        $_SESSION["nombre"] = $username;
        $_SESSION["rol"] = $rol;

        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.html?error=1");
        exit();
    }

    $stmt->close();
}
?>
