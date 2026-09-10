<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar preguntas</title>
</head>

<body>

    <h1>Preguntas de la evaluación</h1>

    <h2>
        <?php echo htmlspecialchars($evaluacion['titulo']); ?>
    </h2>

    <a href="/lessasv/controllers/EvaluacionController.php?accion=listar">
        Volver a evaluaciones
    </a>

    <br><br>

    <a href="/lessasv/controllers/PreguntaController.php?accion=crear&id_evaluacion=<?php echo $evaluacion['id_evaluacion']; ?>">
        Agregar pregunta
    </a>

    <br><br>

    <?php if (count($preguntas) > 0) { ?>

        <table border="1">

            <tr>
                <th>ID</th>
                <th>Pregunta</th>
                <th>Opción A</th>
                <th>Opción B</th>
                <th>Opción C</th>
                <th>Opción D</th>
                <th>Correcta</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($preguntas as $pregunta) { ?>

                <tr>

                    <td>
                        <?php echo $pregunta['id_pregunta']; ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($pregunta['pregunta']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($pregunta['opcion_a']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($pregunta['opcion_b']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($pregunta['opcion_c']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($pregunta['opcion_d']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($pregunta['respuesta_correcta']); ?>
                    </td>

                    <td>

                        <a href="/lessasv/controllers/PreguntaController.php?accion=editar&id=<?php echo $pregunta['id_pregunta']; ?>">
                            Editar
                        </a>

                        |

                        <a
                            href="/lessasv/controllers/PreguntaController.php?accion=eliminar&id=<?php echo $pregunta['id_pregunta']; ?>"
                            onclick="return confirm('¿Seguro que deseas eliminar esta pregunta?');"
                        >
                            Eliminar
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

    <?php } else { ?>

        <p>
            Esta evaluación todavía no tiene preguntas.
        </p>

    <?php } ?>

</body>

</html>