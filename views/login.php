<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p style="color: red;">Usuario o contraseña incorrectos.</p>
        <?php endif; ?>
        <form action="../controllers/LoginController.php" method="post">
            <label for="username">Usuario:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="Iniciar sesión">
        </form>
    </div>
</body>
</html>


