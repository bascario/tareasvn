<?php
include '../modelos/EstudianteModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['registrar'])) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];

        $estudianteModel = new EstudianteModel();
        $estudianteModel->registrarEstudiante($nombre, $correo);

        header('Location: ../vistas/estudiantes/listar.php');
    }
}
?>