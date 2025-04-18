<?php
session_start();
if (!isset($_SESSION["usuario_id"]) || $_SESSION["rol"] != "gerente") {
    header("Location: ../login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Gerente</title>
</head>
<body>
  <h2>Bienvenido gerente, <?php echo $_SESSION["nombre"]; ?></h2>
  <p>Aquí podrás aprobar o rechazar solicitudes.</p>
  <a href="../logout.php">Cerrar sesión</a>
</body>
</html>
