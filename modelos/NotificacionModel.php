<?php
class NotificacionModel {
    private $conn;

    public function __construct() {
        include '../includes/conexion.php';
        $this->conn = $conn;
    }

    public function enviarNotificacion($tarea_id) {
        // Obtener la tarea y la asignatura
        $sql_tarea = "SELECT * FROM tareas WHERE id = $tarea_id";
        $result_tarea = mysqli_query($this->conn, $sql_tarea);
        $tarea = mysqli_fetch_assoc($result_tarea);

        // Obtener estudiantes de la asignatura
        $asignatura_id = $tarea['asignatura_id'];
        $sql_estudiantes = "SELECT correo FROM estudiantes 
                            INNER JOIN estudiante_asignatura ON estudiantes.id = estudiante_asignatura.estudiante_id 
                            WHERE estudiante_asignatura.asignatura_id = $asignatura_id";
        $result_estudiantes = mysqli_query($this->conn, $sql_estudiantes);

        // Enviar correo a cada estudiante
        while ($estudiante = mysqli_fetch_assoc($result_estudiantes)) {
            $correo = $estudiante['correo'];
            $asunto = "Nueva tarea registrada";
            $mensaje = "Se ha registrado una nueva tarea en la asignatura: " . $tarea['nombre'] . "\n\nDescripción: " . $tarea['descripcion'];
            mail($correo, $asunto, $mensaje);
        }
    }
}
?>