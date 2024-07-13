<?php

require_once '../config/conexion.php';
require_once '../models/Usuario.php';
require_once '../models/RolUsuario.php';

class UsuarioDAO
{
    private $con;

    public function __construct()
    {
        $this->con = (new Conexion())->getConnection();
    }

    public function getUsuarios()
    {
        try {
            $query = "SELECT u.idUsuario, u.nombre, u.password, u.estado, r.idrolUsuario, r.nombreRol 
                      FROM usuario u 
                      LEFT JOIN rolusuario r ON u.idrolUsuario = r.idrolUsuario";
            $result = mysqli_query($this->con, $query);
            if (!$result) {
                throw new Exception('Error en la consulta: ' . mysqli_error($this->con));
            }
            $usuarios = array();
            while ($row = mysqli_fetch_assoc($result)) {
                // Crear un objeto RolUsuario
                $rolUsuario = new RolUsuario($row['idrolUsuario'], $row['nombreRol']);
                
                // Crear un objeto Usuario
                $usuario = new Usuario($row['idUsuario'], $row['nombre'], $row['password'], $row['estado']);
                $usuario->setRol($rolUsuario); // Asignar el objeto RolUsuario al Usuario
                
                $usuarios[] = $usuario;
            }
            mysqli_free_result($result);
            return $usuarios;
        } catch (mysqli_sql_exception $e) {
            // Logear el error o manejarlo de otra forma
            return null;
        } catch (Exception $e) {
            // Logear el error o manejarlo de otra forma
            return null;
        }
    }

    public function getByUsuario($usuario)
    {
        try {
            $query = "SELECT * FROM usuario WHERE nombre = ?";
            $stmt = mysqli_prepare($this->con, $query);
            if (!$stmt) {
                throw new Exception('Error al preparar la consulta: ' . mysqli_error($this->con));
            }
            mysqli_stmt_bind_param($stmt, "s", $usuario);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $usuarioBuscado = null;
            if ($row = mysqli_fetch_assoc($result)) {
                $usuarioBuscado = new Usuario($row['idusuario'], $row['nombre'], $row['password'], $row['estado']);
            }
            mysqli_stmt_close($stmt);
            return $usuarioBuscado;
        } catch (Exception $e) {
            // Manejar la excepción
            return null;
        }
    }

    public function addUsuario($usuario, $password, $rolNombre, $idEmpleado)
    {
        try {
            // Obtener el ID del rol a partir del nombre
            $queryRol = "SELECT idrolUsuario FROM rolusuario WHERE nombreRol = ?";
            $stmtRol = mysqli_prepare($this->con, $queryRol);
            mysqli_stmt_bind_param($stmtRol, "s", $rolNombre);
            mysqli_stmt_execute($stmtRol);
            $resultRol = mysqli_stmt_get_result($stmtRol);
            $rowRol = mysqli_fetch_assoc($resultRol);
            $idRol = $rowRol['idrolUsuario'];
            mysqli_stmt_close($stmtRol);

            // Insertar el nuevo usuario en la base de datos
            $query = "INSERT INTO usuario (nombre, password, idrolUsuario, idEmpleado) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->con, $query);
            if (!$stmt) {
                throw new Exception('Error al preparar la consulta: ' . mysqli_error($this->con));
            }
            mysqli_stmt_bind_param($stmt, "ssii", $usuario, $password, $idRol, $idEmpleado);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } catch (Exception $e) {
            
        }
    }

    public function getEmpleados()
    {
        try {
            $query = "SELECT id_empleado, nombre_empleado FROM empleados";
            $result = mysqli_query($this->con, $query);
            if (!$result) {
                throw new Exception('Error en la consulta: ' . mysqli_error($this->con));
            }
            $empleados = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $empleados[] = array(
                    'id' => $row['id_empleado'],
                    'nombre' => $row['nombre_empleado']
                );
            }
            mysqli_free_result($result);
            return $empleados;
        } catch (Exception $e) {
        
            return array();
        }
    }
    public function getRoles()
    {
    try {
        $query = "SELECT id_rol, nombre_rol FROM roles";
        $result = mysqli_query($this->con, $query);
        if (!$result) {
            throw new Exception('Error en la consulta: ' . mysqli_error($this->con));
        }
        $roles = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $roles[] = array(
                'id' => $row['id_rol'],
                'nombre' => $row['nombre_rol']
            );
        }
        mysqli_free_result($result);
        return $roles;
    } catch (Exception $e) {
        
        return array(); 
    }
    }
}
?>
