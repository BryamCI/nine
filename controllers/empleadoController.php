<?php

require_once '../models/Empleado.php';
require_once '../dao/EmpleadoDAO.php';

class EmpleadoController {
    private $empleadoDAO;

    public function __construct() {
        $this->empleadoDAO = new EmpleadoDAO();
    }

    public function addEmpleado() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dni = $_POST['dni'];
            $apellidoPaterno = $_POST['apellidoPaterno'];
            $apellidoMaterno = $_POST['apellidoMaterno'];
            $nombre = $_POST['nombre'];
            $celular = $_POST['celular'];

            $empleado = new Empleado(null, $dni, $apellidoPaterno, $apellidoMaterno, $nombre, $celular);
            
            // Agregar el nuevo empleado en la base de datos
            $this->empleadoDAO->addEmpleado($empleado);
            
            header("Location: /phpmvc/empleados");
            exit;
        } else {
            echo "<script>console.log('Algo falló');</script>";
        }
    }
}

// Enrutamiento básico
if (isset($_GET['action']) && $_GET['action'] === 'addEmpleado') {
    $controller = new EmpleadoController();
    $controller->addEmpleado();
}
?>
