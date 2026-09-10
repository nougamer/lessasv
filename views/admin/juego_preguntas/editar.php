<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar contenido</title>
</head>

<body>

    <h1>
        Editar contenido
    </h1>

    <h2>
        <?php echo htmlspecialchars($juego['nombre']); ?>
    </h2>

    <p>
        Tipo:
        <strong>
            <?php echo htmlspecialchars($juego['tipo']); ?>
        </strong>
    </p>

    <a
        href="/lessasv/controllers/JuegoPreguntaController.php?accion=listar&id_juego=<?php echo $juego['id_juego']; ?>"
    >
        Volver
    </a>

    <br><br>

    <form
        method="POST"
        enctype="multipart/form-data"
    >

        <label>
            Pregunta o instrucción:
        </label>

        <br>

        <input
            type="text"
            name="pregunta"
            value="<?php echo htmlspecialchars($contenido['pregunta']); ?>"
            required
        >

        <br><br>


        <?php if (!empty($contenido['imagen'])): ?>

            <p>Imagen actual:</p>

            <img
                src="/lessasv/<?php echo htmlspecialchars($contenido['imagen']); ?>"
                alt="Imagen actual"
                width="150"
            >

            <br><br>

        <?php endif; ?>


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
            Si no seleccionas una imagen nueva,
            se conservará la actual.
        </p>


        <?php if ($juego['tipo'] !== 'completar'): ?>

            <label>Opción A:</label>
            <br>

            <input
                type="text"
                name="opcion_a"
                value="<?php echo htmlspecialchars($contenido['opcion_a'] ?? ''); ?>"
            >

            <br><br>


            <label>Opción B:</label>
            <br>

            <input
                type="text"
                name="opcion_b"
                value="<?php echo htmlspecialchars($contenido['opcion_b'] ?? ''); ?>"
            >

            <br><br>


            <label>Opción C:</label>
            <br>

            <input
                type="text"
                name="opcion_c"
                value="<?php echo htmlspecialchars($contenido['opcion_c'] ?? ''); ?>"
            >

            <br><br>


            <label>Opción D:</label>
            <br>

            <input
                type="text"
                name="opcion_d"
                value="<?php echo htmlspecialchars($contenido['opcion_d'] ?? ''); ?>"
            >

            <br><br>

        <?php endif; ?>


        <label>
            Respuesta correcta:
        </label>

        <br>


        <?php if ($juego['tipo'] === 'completar'): ?>

            <input
                type="text"
                name="respuesta_correcta"
                value="<?php echo htmlspecialchars($contenido['respuesta_correcta']); ?>"
                required
            >

        <?php else: ?>

            <select
                name="respuesta_correcta"
                required
            >

                <option
                    value="A"
                    <?php
                    if ($contenido['respuesta_correcta'] === 'A') {
                        echo 'selected';
                    }
                    ?>
                >
                    A
                </option>

                <option
                    value="B"
                    <?php
                    if ($contenido['respuesta_correcta'] === 'B') {
                        echo 'selected';
                    }
                    ?>
                >
                    B
                </option>

                <option
                    value="C"
                    <?php
                    if ($contenido['respuesta_correcta'] === 'C') {
                        echo 'selected';
                    }
                    ?>
                >
                    C
                </option>

                <option
                    value="D"
                    <?php
                    if ($contenido['respuesta_correcta'] === 'D') {
                        echo 'selected';
                    }
                    ?>
                >
                    D
                </option>

            </select>

        <?php endif; ?>

        <br><br>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

</body>

</html>