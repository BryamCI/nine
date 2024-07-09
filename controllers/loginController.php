<?php
// controllers/LoginController.php

session_start();

require_once '../config/database.php';
require_once '../models/Usuario.php';

$usuarioModel = new Usuario($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales
    $usuario = $usuarioModel->getByUsername($username);
    if ($usuario && $password === $usuario['password']) {
        // Inicio de sesión exitoso
        $_SESSION['username'] = $username;
        // Redirigir a la página principal o a donde sea necesario
        header('Location: ../index.php');
        exit();
    } else {
        // Credenciales incorrectas, redirigir de vuelta al formulario de inicio de sesión con mensaje de error
        header('Location: ../views/login.php?error=1');
        exit();
    }
} else {
    // Manejo de métodos HTTP no permitidos
    header('HTTP/1.1 405 Method Not Allowed');
    exit();
}
?>
