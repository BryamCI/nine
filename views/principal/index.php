
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Nine Minimarket</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    
    <div class="bg-white w-1/5 h-screen flex flex-col items-center py-4 shadow-lg">
        <img src="logo.png" alt="Nine Minimarket Logo" class="w-24 h-24 mb-4">
        <div class="w-full flex flex-col items-center space-y-4">
            <a href="/phpmvc/cliente" class="bg-blue-200 w-4/5 py-2 rounded text-black font-bold text-center">CLIENTE</a>
            <a href="/phpmvc/producto" class="bg-green-200 w-4/5 py-2 rounded text-black font-bold text-center">PRODUCTO</a>
            <a href="/phpmvc/vender" class="bg-red-200 w-4/5 py-2 rounded text-black font-bold text-center">VENDER</a>
            <a href="/phpmvc/ventas" class="bg-purple-200 w-4/5 py-2 rounded text-black font-bold text-center">VENTAS</a>
        </div>
        <a href="/phpmvc/logout" class="mt-auto mb-4">
            <img src="close-icon-url.png" alt="Cerrar" class="w-12 h-12">
        </a>
    </div>
   
    <div class="flex-1 p-10">
        <div class="flex justify-end">
            <a href="/phpmvc/login" class="bg-gray-200 py-2 px-4 rounded text-black font-bold">INICIO SESIÓN</a>
        </div>
        <div class="text-center mt-10">
            <h1 class="text-4xl font-bold">BIENVENIDO!!</h1>
            <h2 class="text-3xl font-bold mt-4"></h2>
            <p class="text-2xl text-orange-600 mt-10">EMPIEZA UN NUEVO DÍA</p>
            <button class="bg-red-500 text-white py-2 px-4 rounded mt-4 hover:bg-red-600">VENDER</button>
        </div>
        <div class="flex justify-between mt-20">
            <span></span>
            <span></span>
        </div>
    </div>
</body>
</html>

<?php
// index.php

session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: ');
    exit();
}

// Aquí puedes colocar el contenido de tu página principal una vez que el usuario haya iniciado sesión
echo "Bienvenido, " . $_SESSION['username'] . "!";

?>