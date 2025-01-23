<?php
// Habilitar la visualización de errores (solo para desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el modelo de asignaturas
include __DIR__ . '/../../modelos/AsignaturaModel.php';

// Crear una instancia del modelo de asignaturas
$asignaturaModel = new AsignaturaModel();

// Obtener la lista de asignaturas
$asignaturas = $asignaturaModel->listarAsignaturas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asignaturas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../../index.php">Registro de Tareas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../estudiantes/listar.php">Estudiantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../asignaturas/listar.php">Asignaturas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <h1 class="my-4">Lista de Asignaturas</h1>

        <!-- Tabla de asignaturas -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($asignaturas)): ?>
                    <?php foreach ($asignaturas as $asignatura): ?>
                        <tr>
                            <td><?= htmlspecialchars($asignatura['nombre']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="1" class="text-center">No hay asignaturas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Formulario para registrar asignaturas -->
        <h2 class="my-4">Registrar Nueva Asignatura</h2>
        <form action="../../controladores/AsignaturaController.php" method="POST" class="mb-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>