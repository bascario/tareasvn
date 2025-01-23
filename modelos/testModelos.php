<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'modelos/TareaModel.php';
include 'modelos/EstudianteModel.php';
include 'modelos/AsignaturaModel.php';

// Probar TareaModel
$tareaModel = new TareaModel();
$tareas = $tareaModel->listarTareas();
print_r($tareas);

// Probar EstudianteModel
$estudianteModel = new EstudianteModel();
$estudiantes = $estudianteModel->listarEstudiantes();
print_r($estudiantes);

// Probar AsignaturaModel
$asignaturaModel = new AsignaturaModel();
$asignaturas = $asignaturaModel->listarAsignaturas();
print_r($asignaturas);
?>