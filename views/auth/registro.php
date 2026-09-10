<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LESSA SV - Registro</title>
</head>

<body>

    <h1>Crear cuenta - MVC</h1>

    <form
        method="POST"
        action="/lessasv/controllers/AuthController.php?accion=registro"
    >

        <label>Nombre:</label>
        <br>

        <input
            type="text"
            name="nombre"
            required
        >

        <br><br>

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
            Registrarse
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/AuthController.php?accion=login">
        Ya tengo una cuenta
    </a>

</body>

</html>