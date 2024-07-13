<?php

require_once '../models/Usuario.php';
require_once '../dao/UsuarioDAO.php';

class UsuarioController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UsuarioDAO();
    }

    public function index()
    {
        $titulo = "Usuarios";
        
        $usuarios = $this->userDAO->getUsuarios();

        $dataUsuarios = array();
        foreach ($usuarios as $usuario) {
            $nombreRol = ($usuario->getRol()) ? $usuario->getRol()->getNombre() : 'Sin rol';
            
            $dataUsuarios[] = array(
                'id' => $usuario->getId(),
                'nombre' => $usuario->getNombre(),
                'estado' => $usuario->getEstado(),
                'rol' => $nombreRol
            );
        }

        require_once 'views/usuarios/index.php';
    }

    public function agregar()
    {
        // Obtener lista de empleados
        $empleados = $this->userDAO->getEmpleados();

        require_once 'views/usuarios/UsuarioAgregar.php';
    }

    public function addUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $rolNombre = $_POST['rol'];
            $idEmpleado = $_POST['idEmpleado']; // Obtener ID del empleado seleccionado
            
            $this->userDAO->addUsuario($usuario, $password, $rolNombre, $idEmpleado);
            
            header("Location: /phpmvc/usuarios");
        } else {
            echo "<script>console.log('Algo falló');</script>";
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $user = $this->userDAO->getByUsuario($usuario);
            if ($user && password_verify($password, $user["password"])) {
                session_start();
                $_SESSION['username'] = $usuario;
                header("Location: /phpmvc/home/");
                exit;
            } else {
                header('Location: /phpmvc?fail=true');
            }
        } else {
            echo "<script>console.log('Algo falló');</script>";
        }
    }

    public function buscar()
    {
        // Lógica para buscar usuarios
        require_once 'views/usuarios/UsuarioBuscar.php';
    }

    public function eliminar()
    {
        // Lógica para eliminar usuarios
        require_once 'views/usuarios/UsuarioEliminar.php';
    }
}

// Manejar la acción addUsuario si se llama directamente
if (isset($_GET['action']) && $_GET['action'] === 'addUsuario') {
    $controller = new UsuarioController();
    $controller->addUsuario();
}

?>
