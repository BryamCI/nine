<?php
// index.php

session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: views/login.php');
    exit();
}

// Aquí puedes colocar el contenido de tu página principal una vez que el usuario haya iniciado sesión
echo "Bienvenido, " . $_SESSION['username'] . "!";

?>
