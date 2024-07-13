<?php
require_once 'models/usuario.php';
require_once 'DAO/usuarioDAO.php';

class LoginController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UsuarioDAO();
    }

    public function index()
    {
        require_once 'views/login/index.php';
    }

    public function submit()
    {
        /*echo "
        <script>
        console.log('Si estamos aqui');
        </script>
        ";
        echo "Request method: " . $_SERVER['REQUEST_METHOD'];*/
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $user = $this->userDAO->getByUsuario($usuario);
            if ($usuario != null && password_verify($password, $user->getPassword())) {
                session_start();
                $_SESSION['username'] = $usuario;
                header("Location:  /nine/wiews/principal/index.php");
                exit;
            } else {
                header('Location: /nine?fail=true');
            }
        } else {
            echo "
            <script>
            console.log('algo fallo');
            </script>
            ";
        }
    }
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /nine');
        exit;
    }
}
