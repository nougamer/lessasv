<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear pregunta</title>
</head>

<body>

    <h1>Crear pregunta</h1>

    <p>
        Evaluación:
        <strong>
            <?php echo htmlspecialchars($evaluacion['titulo']); ?>
        </strong>
    </p>

    <a href="/lessasv/controllers/PreguntaController.php?accion=listar&id_evaluacion=<?php echo $evaluacion['id_evaluacion']; ?>">
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
        ></textarea>

        <br><br>


        <label>Opción A:</label>

        <br>

        <input
            type="text"
            name="opcion_a"
            required
        >

        <br><br>


        <label>Opción B:</label>

        <br>

        <input
            type="text"
            name="opcion_b"
            required
        >

        <br><br>


        <label>Opción C:</label>

        <br>

        <input
            type="text"
            name="opcion_c"
            required
        >

        <br><br>


        <label>Opción D:</label>

        <br>

        <input
            type="text"
            name="opcion_d"
            required
        >

        <br><br>


        <label>Respuesta correcta:</label>

        <br>

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

        <br><br>


        <button type="submit">
            Guardar pregunta
        </button>

    </form>

</body>

</html>