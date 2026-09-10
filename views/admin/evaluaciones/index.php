<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar evaluaciones</title>
</head>

<body>

    <h1>Gestionar evaluaciones - MVC</h1>

    <a href="/lessasv/controllers/DashboardController.php">
        Volver al panel
    </a>

    <br><br>

    <a href="/lessasv/controllers/EvaluacionController.php?accion=crear">
        Agregar evaluación
    </a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Módulo</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($evaluaciones as $evaluacion) { ?>

            <tr>

                <td>
                    <?php echo $evaluacion['id_evaluacion']; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($evaluacion['nombre_modulo']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($evaluacion['titulo']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($evaluacion['descripcion'] ?? ''); ?>
                </td>

                <td>

                    <a
                        href="/lessasv/controllers/PreguntaController.php?accion=listar&id_evaluacion=<?php echo $evaluacion['id_evaluacion']; ?>"
                    >
                        Gestionar preguntas
                    </a>

                    |

                    <a
                        href="/lessasv/controllers/EvaluacionController.php?accion=editar&id=<?php echo $evaluacion['id_evaluacion']; ?>"
                    >
                        Editar
                    </a>

                    |

                    <a
                        href="/lessasv/controllers/EvaluacionController.php?accion=eliminar&id=<?php echo $evaluacion['id_evaluacion']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar esta evaluación?');"
                    >
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>