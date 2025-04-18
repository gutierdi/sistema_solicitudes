<?php
session_start();
if (!isset($_SESSION["usuario_id"]) || $_SESSION["rol"] != "vendedor") {
    header("Location: ../login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Vendedor</title>
</head>
<body>
  <h2>Bienvenido vendedor, <?php echo $_SESSION["nombre"]; ?></h2>
  <p>Aquí podrás crear y ver tus solicitudes.</p>
  <a href="../logout.php">Cerrar sesión</a>
</body>
</html>
