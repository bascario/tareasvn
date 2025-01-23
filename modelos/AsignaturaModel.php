<?php
class AsignaturaModel {
    private $conn;

    public function __construct() {
        include __DIR__ . '/../includes/conexion.php';
        $this->conn = $conn;
    }

    public function listarAsignaturas() {
        $sql = "SELECT * FROM asignaturas";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function registrarAsignatura($nombre) {
        $sql = "INSERT INTO asignaturas (nombre) VALUES ('$nombre')";
        return mysqli_query($this->conn, $sql);
    }
}
?>