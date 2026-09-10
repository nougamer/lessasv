<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar pareja</title>
</head>

<body>

    <h1>Agregar pareja</h1>

    <h2>
        <?php echo htmlspecialchars($juego['nombre']); ?>
    </h2>

    <a
        href="/lessasv/controllers/JuegoParejaController.php?accion=listar&id_juego=<?php echo $juego['id_juego']; ?>"
    >
        Volver
    </a>

    <br><br>

    <?php if (!empty($error)): ?>

        <p>
            <?php echo htmlspecialchars($error); ?>
        </p>

    <?php endif; ?>

    <form
        method="POST"
        enctype="multipart/form-data"
    >

        <label>
            Palabra o texto:
        </label>

        <br>

        <input
            type="text"
            name="texto"
            required
        >

        <br><br>


        <label>
            Imagen de la seña:
        </label>

        <br>

        <input
            type="file"
            name="imagen"
            accept="image/jpeg,image/png,image/webp"
            required
        >

        <br><br>

        <button type="submit">
            Guardar pareja
        </button>

    </form>

</body>

</html>