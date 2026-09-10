<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LESSA SV - Iniciar sesión</title>
</head>

<body>

    <h1>Iniciar sesión - MVC</h1>

    <?php if (isset($error)) { ?>

        <p>
            <?php echo htmlspecialchars($error); ?>
        </p>

    <?php } ?>

    <form
        method="POST"
        action="/lessasv/controllers/AuthController.php?accion=login"
    >

        <label>Correo:</label>
        <br>

        <input
            type="email"
            name="correo"
            required
        >

        <br><br>

        <label>Contraseña:</label>
        <br>

        <input
            type="password"
            name="contrasena"
            required
        >

        <br><br>

        <button type="submit">
            Iniciar sesión
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/AuthController.php?accion=registro">
        Crear cuenta
    </a>

    <br><br>

    <!-- Después conectaremos aquí la recuperación por token -->
    <a href="/lessasv/controllers/AuthController.php?accion=solicitar-recuperacion">
    ¿Olvidaste tu contraseña?
</a>

</body>

</html>