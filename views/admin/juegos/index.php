<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar juegos</title>
</head>

<body>

    <h1>Gestionar juegos</h1>

    <a href="/lessasv/controllers/DashboardController.php">
        Volver al panel
    </a>

    <br><br>

    <a href="/lessasv/controllers/JuegoController.php?accion=crear">
        Agregar juego
    </a>

    <br><br>

    <?php if (count($juegos) > 0) { ?>

        <table border="1">

            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($juegos as $juego) { ?>

                <tr>

                    <td>
                        <?php echo $juego['id_juego']; ?>
                    </td>

                    <td>
                        <?php
                        echo htmlspecialchars(
                            $juego['nombre']
                        );
                        ?>
                    </td>

                    <td>
                        <?php
                        echo htmlspecialchars(
                            $juego['descripcion'] ?? ''
                        );
                        ?>
                    </td>

                    <td>
                        <?php
                        echo htmlspecialchars(
                            $juego['tipo']
                        );
                        ?>
                    </td>

                    <td>

                        <?php if ($juego['tipo'] === 'relacionar') { ?>

                            <a
                                href="/lessasv/controllers/JuegoParejaController.php?accion=listar&id_juego=<?php echo $juego['id_juego']; ?>"
                            >
                                Gestionar contenido
                            </a>

                        <?php } else { ?>

                            <a
                                href="/lessasv/controllers/JuegoPreguntaController.php?accion=listar&id_juego=<?php echo $juego['id_juego']; ?>"
                            >
                                Gestionar contenido
                            </a>

                        <?php } ?>

                        |

                        <a
                            href="/lessasv/controllers/JuegoController.php?accion=editar&id=<?php echo $juego['id_juego']; ?>"
                        >
                            Editar
                        </a>

                        |

                        <a
                            href="/lessasv/controllers/JuegoController.php?accion=eliminar&id=<?php echo $juego['id_juego']; ?>"
                            onclick="return confirm('¿Seguro que deseas eliminar este juego?');"
                        >
                            Eliminar
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

    <?php } else { ?>

        <p>
            Todavía no existen juegos.
        </p>

    <?php } ?>

</body>

</html>