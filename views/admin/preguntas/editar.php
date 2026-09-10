<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar pregunta</title>
</head>

<body>

    <h1>Editar pregunta</h1>

    <p>
        Evaluación:
        <strong>
            <?php echo htmlspecialchars($evaluacion['titulo']); ?>
        </strong>
    </p>

    <a href="/lessasv/controllers/PreguntaController.php?accion=listar&id_evaluacion=<?php echo $idEvaluacion; ?>">
        Volver
    </a>

    <br><br>

    <form method="POST">

        <label>Pregunta:</label>

        <br>

        <textarea
            name="pregunta"
            rows="4"
            cols="50"
            required
        ><?php echo htmlspecialchars($preguntaActual['pregunta']); ?></textarea>

        <br><br>


        <label>Opción A:</label>

        <br>

        <input
            type="text"
            name="opcion_a"
            value="<?php echo htmlspecialchars($preguntaActual['opcion_a']); ?>"
            required
        >

        <br><br>


        <label>Opción B:</label>

        <br>

        <input
            type="text"
            name="opcion_b"
            value="<?php echo htmlspecialchars($preguntaActual['opcion_b']); ?>"
            required
        >

        <br><br>


        <label>Opción C:</label>

        <br>

        <input
            type="text"
            name="opcion_c"
            value="<?php echo htmlspecialchars($preguntaActual['opcion_c']); ?>"
            required
        >

        <br><br>


        <label>Opción D:</label>

        <br>

        <input
            type="text"
            name="opcion_d"
            value="<?php echo htmlspecialchars($preguntaActual['opcion_d']); ?>"
            required
        >

        <br><br>


        <label>Respuesta correcta:</label>

        <br>

        <select
            name="respuesta_correcta"
            required
        >

            <?php foreach (['A', 'B', 'C', 'D'] as $opcion) { ?>

                <option
                    value="<?php echo $opcion; ?>"
                    <?php
                    if ($preguntaActual['respuesta_correcta'] === $opcion) {
                        echo 'selected';
                    }
                    ?>
                >
                    <?php echo $opcion; ?>
                </option>

            <?php } ?>

        </select>

        <br><br>


        <button type="submit">
            Guardar cambios
        </button>

    </form>

</body>

</html>