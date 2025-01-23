<?php
// Incluir los modelos necesarios
include __DIR__ . '/../../modelos/TareaModel.php';
include __DIR__ . '/../../modelos/AsignaturaModel.php';

// Crear instancias de los modelos
$tareaModel = new TareaModel();
$asignaturaModel = new AsignaturaModel();

// Obtener la lista de tareas y asignaturas
$tareas = $tareaModel->listarTareas();
$asignaturas = $asignaturaModel->listarAsignaturas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    <div class="container mt-4">
        <h1 class="my-4">Lista de Tareas</h1>

        <!-- Tabla de tareas -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Asignatura</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($tareas)): ?>
                    <?php foreach ($tareas as $tarea): ?>
                        <tr>
                            <td><?= htmlspecialchars($tarea['nombre']) ?></td>
                            <td><?= htmlspecialchars($tarea['descripcion']) ?></td>
                            <td><?= htmlspecialchars($tarea['asignatura_nombre'] ?? 'Sin asignatura') ?></td>
                            <td>
                                <form action="../../controladores/TareaController.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $tarea['id'] ?>">
                                    <button type="submit" name="eliminar" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay tareas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Formulario para registrar tareas -->
        <h2 class="my-4">Registrar Nueva Tarea</h2>
        <form action="../../controladores/TareaController.php" method="POST" class="mb-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" name="descripcion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="asignatura_id" class="form-label">Asignatura:</label>
                <select name="asignatura_id" class="form-control" required>
                    <option value="">Seleccione una asignatura</option>
                    <?php foreach ($asignaturas as $asignatura): ?>
                        <option value="<?= $asignatura['id'] ?>"><?= htmlspecialchars($asignatura['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>