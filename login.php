<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LESSA SV - Iniciar Sesión</title>
</head>
<body>

    <h2>Iniciar Sesión</h2>

    <form action="validar.php" method="POST">

        <label>Correo:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br><br>

        <button type="submit">Ingresar</button>

    </form>

</body>
</html>