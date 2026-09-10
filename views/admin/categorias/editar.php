<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar categoría</title>
</head>

<body>

    <h1>Editar categoría - MVC</h1>

    <form
        method="POST"
        action="/lessasv/controllers/CategoriaController.php?accion=editar&id=<?php echo $categoria['id_categoria']; ?>"
    >

        <label>Módulo:</label>
        <br>

        <select name="id_modulo" required>

            <?php foreach ($modulos as $modulo) { ?>

                <option
                    value="<?php echo $modulo['id_modulo']; ?>"

                    <?php
                    if ($modulo['id_modulo'] == $categoria['id_modulo']) {
                        echo 'selected';
                    }
                    ?>
                >

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
            value="<?php echo htmlspecialchars($categoria['nombre']); ?>"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"><?php
            echo htmlspecialchars($categoria['descripcion'] ?? '');
        ?></textarea>

        <br><br>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/CategoriaController.php?accion=listar">
        Cancelar
    </a>

</body>

</html>