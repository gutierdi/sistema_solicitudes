<?php
session_start();
if (!isset($_SESSION["usuario_id"]) || $_SESSION["rol"] != "supervisor") {
    header("Location: ../login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Supervisor</title>
</head>
<body>
  <h2>Bienvenido supervisor, <?php echo $_SESSION["nombre"]; ?></h2>
  <p>Aquí podrás revisar solicitudes de tus vendedores.</p>
  <a href="../logout.php">Cerrar sesión</a>
</body>
</html>
