<?php
class TareaModel {
    private $conn;

    public function __construct() {
        include __DIR__ . '/../includes/conexion.php';
        $this->conn = $conn;
    }

    public function listarTareas() {
        $sql = "SELECT tareas.*, asignaturas.nombre AS asignatura_nombre 
                FROM tareas 
                LEFT JOIN asignaturas ON tareas.asignatura_id = asignaturas.id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function registrarTarea($nombre, $descripcion, $asignatura_id) {
        $sql = "INSERT INTO tareas (nombre, descripcion, asignatura_id) VALUES ('$nombre', '$descripcion', '$asignatura_id')";
        return mysqli_query($this->conn, $sql);
    }

    public function eliminarTarea($id) {
        $sql = "DELETE FROM tareas WHERE id = $id";
        return mysqli_query($this->conn, $sql);
    }
}
?>