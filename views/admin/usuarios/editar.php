<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar usuario</title>
</head>

<body>

    <h1>Editar usuario - MVC</h1>

    <form
        method="POST"
        action="/lessasv/controllers/UsuarioController.php?accion=editar&id=<?php echo $usuario['id_usuario']; ?>"
    >

        <label>Nombre:</label>
        <br>

        <input
            type="text"
            name="nombre"
            value="<?php echo htmlspecialchars($usuario['nombre']); ?>"
            required
        >

        <br><br>

        <label>Correo:</label>
        <br>

        <input
            type="email"
            name="correo"
            value="<?php echo htmlspecialchars($usuario['correo']); ?>"
            required
        >

        <br><br>

        <label>Rol:</label>
        <br>

        <select name="rol" required>

            <option
                value="Estudiante"
                <?php if ($usuario['rol'] == 'Estudiante') echo 'selected'; ?>
            >
                Estudiante
            </option>

            <option
                value="Administrador"
                <?php if ($usuario['rol'] == 'Administrador') echo 'selected'; ?>
            >
                Administrador
            </option>

        </select>

        <br><br>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/UsuarioController.php?accion=listar">
        Cancelar
    </a>

</body>

</html>