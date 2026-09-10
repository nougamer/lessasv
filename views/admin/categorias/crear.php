<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear categoría</title>
</head>

<body>

    <h1>Crear categoría - MVC</h1>

    <form
        method="POST"
        action="/lessasv/controllers/CategoriaController.php?accion=crear"
    >

        <label>Módulo:</label>
        <br>

        <select name="id_modulo" required>

            <?php foreach ($modulos as $modulo) { ?>

                <option value="<?php echo $modulo['id_modulo']; ?>">

                    <?php echo htmlspecialchars($modulo['nombre']); ?>

                </option>

            <?php } ?>

        </select>

        <br><br>

        <label>Nombre:</label>
        <br>

        <input
            type="text"
            name="nombre"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"></textarea>

        <br><br>

        <button type="submit">
            Crear categoría
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/CategoriaController.php?accion=listar">
        Cancelar
    </a>

</body>

</html>