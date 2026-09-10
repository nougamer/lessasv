<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar contenido</title>
</head>

<body>

    <h1>
        Agregar contenido
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

    <?php if ($juego['tipo'] === 'seleccion'): ?>

        <p>
            Escribe una pregunta, cuatro opciones y la letra
            de la respuesta correcta.
        </p>

    <?php elseif ($juego['tipo'] === 'identificar'): ?>

        <p>
            Sube una imagen de una seña y escribe cuatro
            posibles significados.
        </p>

    <?php elseif ($juego['tipo'] === 'completar'): ?>

        <p>
            Escribe la palabra incompleta y luego la respuesta correcta.
            Las opciones pueden quedar vacías.
        </p>

    <?php elseif ($juego['tipo'] === 'relacionar'): ?>

        <p>
            Escribe la seña o concepto que el estudiante debe
            relacionar y sus posibles respuestas.
        </p>

    <?php endif; ?>

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
            required
        >

        <br><br>


        <label>
            Imagen:
        </label>

        <br>

        <input
            type="file"
            name="imagen"
            accept="image/jpeg,image/png,image/webp"
        >

        <br><br>


        <?php if ($juego['tipo'] !== 'completar'): ?>

            <label>Opción A:</label>
            <br>
            <input
                type="text"
                name="opcion_a"
            >

            <br><br>

            <label>Opción B:</label>
            <br>
            <input
                type="text"
                name="opcion_b"
            >

            <br><br>

            <label>Opción C:</label>
            <br>
            <input
                type="text"
                name="opcion_c"
            >

            <br><br>

            <label>Opción D:</label>
            <br>
            <input
                type="text"
                name="opcion_d"
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
                placeholder="Ejemplo: O"
                required
            >

        <?php else: ?>

            <select
                name="respuesta_correcta"
                required
            >

                <option value="">
                    Selecciona la respuesta
                </option>

                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>

            </select>

        <?php endif; ?>

        <br><br>

        <button type="submit">
            Guardar contenido
        </button>

    </form>

</body>

</html>