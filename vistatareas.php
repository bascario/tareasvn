<?php
// Habilitar la visualización de errores (solo para desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Redirigir a la vista de tareas
header('Location: vistas/tareas/listar.php');
exit;
?>