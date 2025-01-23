<?php
include '../modelos/AsignaturaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['registrar'])) {
        $nombre = $_POST['nombre'];

        $asignaturaModel = new AsignaturaModel();
        $asignaturaModel->registrarAsignatura($nombre);

        header('Location: ../vistas/asignaturas/listar.php');
    }
}
?>