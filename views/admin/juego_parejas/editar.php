<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar pareja</title>
</head>

<body>

    <h1>Editar pareja</h1>

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
            value="<?php echo htmlspecialchars($pareja['texto']); ?>"
            required
        >

        <br><br>


        <p>Imagen actual:</p>

        <img
            src="/lessasv/<?php echo htmlspecialchars($pareja['imagen']); ?>"
            alt="Imagen actual"
            width="150"
        >

        <br><br>


        <label>
            Cambiar imagen:
        </label>

        <br>

        <input
            type="file"
            name="imagen"
            accept="image/jpeg,image/png,image/webp"
        >

        <p>
            Si no seleccionas otra imagen,
            se conservará la actual.
        </p>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

</body>

</html>