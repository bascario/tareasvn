<?php
// Habilitar la visualización de errores (solo para desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el modelo de tareas
include __DIR__ . '/../modelos/TareaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['registrar'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $asignatura_id = $_POST['asignatura_id'];

        $tareaModel = new TareaModel();
        $tareaModel->registrarTarea($nombre, $descripcion, $asignatura_id);

        header('Location: ../index.php');
    } elseif (isset($_POST['eliminar'])) {
        $id = $_POST['id'];

        $tareaModel = new TareaModel();
        $tareaModel->eliminarTarea($id);

        header('Location: ../index.php');
    }
}
?>