<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nine Minimarket</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <div class="flex justify-end">
            <button class="text-red-600 text-2xl">&times;</button>
        </div>
        <div class="text-center mb-6">
            <img src="logo.png" alt="Nine Minimarket Logo" class="mx-auto w-24 h-24 mb-4">
            <h2 class="text-2xl font-bold">NINE MINIMARKET</h2>
        </div>
        <form action="nine/views/principal/index.php" method="POST">
            <div class="mb-4">
                <label for="usuario" class="block text-gray-700">Usuario</label>
                <input type="text" id="usuario" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Usuario">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="**********">
            </div>
            <?php
                    if (isset($_GET["fail"]) && $_GET["fail"] == "true") {
                        echo "
                        <p class='text-center text-[#ff0000] font-bold mb-2'>Credenciales incorrectas</p>
                        ";
                    }
                    ?>
                    <?php
                    if (isset($_GET["fail"]) && $_GET["fail"] == "true") {
                        echo "
                        <p class='text-center text-[#ff0000] font-bold mb-2'>Acceso no autorizado! Debe inicar sesion!</p>
                        ";
                    }
                    ?>
            <div>
                <input type="submit" class="w-full bg-blue-900 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700" value="Iniciar Sesión">
            </div>
        </form>
    </div>
</body>
</html>
