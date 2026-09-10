<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Contenido del juego</title>
</head>

<body>

    <h1>
        Contenido del juego:
        <?php echo htmlspecialchars($juego['nombre']); ?>
    </h1>

    <p>
        Tipo:
        <strong>
            <?php echo htmlspecialchars($juego['tipo']); ?>
        </strong>
    </p>

    <a href="/lessasv/controllers/JuegoController.php?accion=listar">
        Volver a juegos
    </a>

    |

    <a
        href="/lessasv/controllers/JuegoPreguntaController.php?accion=crear&id_juego=<?php echo $juego['id_juego']; ?>"
    >
        Agregar contenido
    </a>

    <br><br>

    <?php if (empty($contenidos)): ?>

        <p>
            Este juego todavía no tiene contenido.
        </p>

    <?php else: ?>

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pregunta</th>
                    <th>Imagen</th>
                    <th>Respuesta correcta</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($contenidos as $contenido): ?>

                    <tr>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $contenido['id_juego_pregunta']
                            );
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $contenido['pregunta']
                            );
                            ?>
                        </td>

                        <td>

                            <?php if (!empty($contenido['imagen'])): ?>

                                <img
                                    src="/lessasv/<?php echo htmlspecialchars($contenido['imagen']); ?>"
                                    alt="Imagen del juego"
                                    width="120"
                                >

                            <?php else: ?>

                                Sin imagen

                            <?php endif; ?>

                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $contenido['respuesta_correcta']
                            );
                            ?>
                        </td>

                        <td>

                            <a
                                href="/lessasv/controllers/JuegoPreguntaController.php?accion=editar&id=<?php echo $contenido['id_juego_pregunta']; ?>"
                            >
                                Editar
                            </a>

                            |

                            <a
                                href="/lessasv/controllers/JuegoPreguntaController.php?accion=eliminar&id=<?php echo $contenido['id_juego_pregunta']; ?>"
                                onclick="return confirm('¿Eliminar este contenido?');"
                            >
                                Eliminar
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php endif; ?>

</body>

</html>