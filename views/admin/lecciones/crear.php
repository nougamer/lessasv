<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar lección</title>
</head>

<body>

    <h1>Agregar lección - MVC</h1>

    <form
        method="POST"
        action="/lessasv/controllers/LeccionController.php?accion=crear"
        enctype="multipart/form-data"
    >

        <label>Categoría:</label>
        <br>

        <select name="id_categoria" required>

            <?php foreach ($categorias as $categoria) { ?>

                <option value="<?php echo $categoria['id_categoria']; ?>">

                    <?php
                    echo htmlspecialchars(
                        $categoria['nombre_modulo']
                        . " - "
                        . $categoria['nombre_categoria']
                    );
                    ?>

                </option>

            <?php } ?>

        </select>

        <br><br>

        <label>Orden:</label>
        <br>

        <input
            type="number"
            name="orden"
            min="1"
            required
        >

        <br><br>

        <label>Título:</label>
        <br>

        <input
            type="text"
            name="titulo"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"></textarea>

        <br><br>

        <label>Significado:</label>
        <br>

        <textarea name="significado"></textarea>

        <br><br>

        <label>Imagen:</label>
        <br>

        <input
            type="file"
            name="imagen"
            accept="image/jpeg,image/png,image/webp"
        >

        <br><br>

        <label>Video:</label>
        <br>

        <input
            type="file"
            name="video"
            accept="video/mp4,video/webm"
        >

        <br><br>

        <button type="submit">
            Crear lección
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/LeccionController.php?accion=listar">
        Cancelar
    </a>

</body>

</html>