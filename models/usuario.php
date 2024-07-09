<?php
// models/Usuario.php

class Usuario {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Función para obtener un usuario por su nombre de usuario
    public function getByUsername($username) {
        $query = "SELECT * FROM usuario WHERE nombre = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
