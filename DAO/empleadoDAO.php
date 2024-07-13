<?php
include("../config/conexion.php");
require_once '../models/Empleado.php';

class EmpleadoDAO {
    private $con;

    function __construct() {
        $this->con = (new Conexion())->getConnection();
    }

    // Método para agregar un empleado a la base de datos
    public function addEmpleado($empleado) {
        try {
            $query = "INSERT INTO empleado (dni, apellidoPaterno, apellidoMaterno, nombre, celular) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->con, $query);
            if (!$stmt) {
                throw new Exception('Error al preparar la consulta: ' . mysqli_error($this->con));
            }
            mysqli_stmt_bind_param($stmt, "sssss", 
                $empleado->getDni(), 
                $empleado->getApellidoPaterno(), 
                $empleado->getApellidoMaterno(), 
                $empleado->getNombre(), 
                $empleado->getCelular()
            );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } catch (Exception $e) {
            // Manejar la excepción
            echo "Error: " . $e->getMessage();
        }
    }

    // Método para obtener un empleado por su ID
    public function getEmpleadoById($id) {
        try {
            $query = "SELECT * FROM empleado WHERE idempleado = ?";
            $stmt = mysqli_prepare($this->con, $query);
            if (!$stmt) {
                throw new Exception('Error al preparar la consulta: ' . mysqli_error($this->con));
            }
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $empleado = null;
            if ($row = mysqli_fetch_assoc($result)) {
                $empleado = new Empleado(
                    $row['idempleado'], 
                    $row['dni'], 
                    $row['apellidoPaterno'], 
                    $row['apellidoMaterno'], 
                    $row['nombre'], 
                    $row['celular']
                );
            }
            mysqli_stmt_close($stmt);
            return $empleado;
        } catch (Exception $e) {
            // Manejar la excepción
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    // Método para obtener todos los empleados
    public function getEmpleados() {
        try {
            $query = "SELECT * FROM empleado";
            $result = mysqli_query($this->con, $query);
            if (!$result) {
                throw new Exception('Error en la consulta: ' . mysqli_error($this->con));
            }
            $empleados = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $empleados[] = new Empleado(
                    $row['idempleado'], 
                    $row['dni'], 
                    $row['apellidoPaterno'], 
                    $row['apellidoMaterno'], 
                    $row['nombre'], 
                    $row['celular']
                );
            }
            return $empleados;
        } catch (Exception $e) {
            // Manejar la excepción
            echo "Error: " . $e->getMessage();
            return array();
        }
    }
}
?>
