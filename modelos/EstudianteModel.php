<?php
class EstudianteModel {
    private $conn;

    public function __construct() {
        include __DIR__ . '/../includes/conexion.php';
        $this->conn = $conn;
    }

    public function listarEstudiantes() {
        $sql = "SELECT * FROM estudiantes";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function registrarEstudiante($nombre, $correo) {
        $sql = "INSERT INTO estudiantes (nombre, correo) VALUES ('$nombre', '$correo')";
        return mysqli_query($this->conn, $sql);
    }
}
?>