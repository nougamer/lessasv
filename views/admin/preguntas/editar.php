<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar lección</title>
</head>

<body>

    <h1>Editar lección - MVC</h1>

    <form
        method="POST"
        action="/lessasv/controllers/LeccionController.php?accion=editar&id=<?php echo $leccion['id_leccion']; ?>"
        enctype="multipart/form-data"
    >

        <label>Categoría:</label>
        <br>

        <select name="id_categoria" required>

            <?php foreach ($categorias as $categoria) { ?>

                <option
                    value="<?php echo $categoria['id_categoria']; ?>"

                    <?php
                    if ($categoria['id_categoria'] == $leccion['id_categoria']) {
                        echo 'selected';
                    }
                    ?>
                >

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
            value="<?php echo $leccion['orden']; ?>"
            required
        >

        <br><br>

        <label>Título:</label>
        <br>

        <input
            type="text"
            name="titulo"
            value="<?php echo htmlspecialchars($leccion['titulo']); ?>"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"><?php
            echo htmlspecialchars($leccion['descripcion'] ?? '');
        ?></textarea>

        <br><br>

        <label>Significado:</label>
        <br>

        <textarea name="significado"><?php
            echo htmlspecialchars($leccion['significado'] ?? '');
        ?></textarea>

        <br><br>

        <label>Imagen actual:</label>
        <br>

        <?php if (!empty($leccion['imagen'])) { ?>

            <img
                src="/lessasv/<?php echo htmlspecialchars($leccion['imagen']); ?>"
                width="120"
                alt="Imagen de la lección"
            >

        <?php } else { ?>

            <p>Sin imagen.</p>

        <?php } ?>

        <label>Nueva imagen:</label>
        <br>

        <input
            type="file"
            name="imagen"
            accept="image/jpeg,image/png,image/webp"
        >

        <br><br>

        <label>Video actual:</label>
        <br>

        <?php if (!empty($leccion['video'])) { ?>

            <video width="220" controls>

                <source
                    src="/lessasv/<?php echo htmlspecialchars($leccion['video']); ?>"
                >

                Tu navegador no puede reproducir este video.

            </video>

        <?php } else { ?>

            <p>Sin video.</p>

        <?php } ?>

        <label>Nuevo video:</label>
        <br>

        <input
            type="file"
            name="video"
            accept="video/mp4,video/webm"
        >

        <br><br>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/LeccionController.php?accion=listar">
        Cancelar
    </a>

</body>

</html>