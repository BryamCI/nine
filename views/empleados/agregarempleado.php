<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-5 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-5 text-center">Agregar Empleado</h2>
            <form action="/nine/controllers/empleadoController.php?action=addEmpleado" method="POST">
                <div class="mb-4">
                    <label for="dni" class="block text-gray-700 font-bold mb-2">DNI:</label>
                    <input type="text" id="dni" name="dni" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="apellidoPaterno" class="block text-gray-700 font-bold mb-2">Apellido Paterno:</label>
                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="apellidoMaterno" class="block text-gray-700 font-bold mb-2">Apellido Materno:</label>
                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="celular" class="block text-gray-700 font-bold mb-2">Celular:</label>
                    <input type="text" id="celular" name="celular" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Agregar</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
