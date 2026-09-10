<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar módulo</title>
</head>

<body>

    <h1>Editar módulo - MVC</h1>

    <form
        method="POST"
        action="/lessasv/controllers/ModuloController.php?accion=editar&id=<?php echo $modulo['id_modulo']; ?>"
    >

        <label>Nombre:</label>
        <br>

        <input
            type="text"
            name="nombre"
            value="<?php echo htmlspecialchars($modulo['nombre']); ?>"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"><?php
            echo htmlspecialchars($modulo['descripcion'] ?? '');
        ?></textarea>

        <br><br>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/ModuloController.php?accion=listar">
        Cancelar
    </a>

</body>

</html>