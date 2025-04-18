<?php
session_start();

// Si no ha iniciado sesión, redirige al login
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.html");
    exit();
}

// Redirige al panel correspondiente según el rol
switch ($_SESSION["rol"]) {
    case "vendedor":
        header("Location: vendedor/panel_vendedor.php");
        break;
    case "supervisor":
        header("Location: supervisor/panel_supervisor.php");
        break;
    case "gerente":
        header("Location: gerente/panel_gerente.php");
        break;
    default:
        echo "Rol desconocido.";
        exit();
}
?>
