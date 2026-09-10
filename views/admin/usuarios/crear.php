<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear usuario</title>
</head>

<body>

    <h1>Crear usuario - MVC</h1>

    <form
        method="POST"
        action="/lessasv/controllers/UsuarioController.php?accion=crear"
    >

        <label>Nombre:</label>
        <br>
        <input type="text" name="nombre" required>

        <br><br>

        <label>Correo:</label>
        <br>
        <input type="email" name="correo" required>

        <br><br>

        <label>Contraseña:</label>
        <br>
        <input type="password" name="contrasena" required>

        <br><br>

        <label>Rol:</label>
        <br>

        <select name="rol" required>
            <option value="Estudiante">Estudiante</option>
            <option value="Administrador">Administrador</option>
        </select>

        <br><br>

        <button type="submit">
            Crear usuario
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/UsuarioController.php?accion=listar">
        Cancelar
    </a>

</body>

</html>