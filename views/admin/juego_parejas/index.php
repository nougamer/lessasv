<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Parejas del juego</title>
</head>

<body>

    <h1>
        Parejas del juego:
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
        href="/lessasv/controllers/JuegoParejaController.php?accion=crear&id_juego=<?php echo $juego['id_juego']; ?>"
    >
        Agregar pareja
    </a>

    <br><br>

    <?php if (empty($parejas)): ?>

        <p>
            Este juego todavía no tiene parejas.
        </p>

    <?php else: ?>

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Texto</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($parejas as $pareja): ?>

                    <tr>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $pareja['id_juego_pareja']
                            );
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $pareja['texto']
                            );
                            ?>
                        </td>

                        <td>

                            <img
                                src="/lessasv/<?php echo htmlspecialchars($pareja['imagen']); ?>"
                                alt="Imagen de la pareja"
                                width="120"
                            >

                        </td>

                        <td>

                            <a
                                href="/lessasv/controllers/JuegoParejaController.php?accion=editar&id=<?php echo $pareja['id_juego_pareja']; ?>"
                            >
                                Editar
                            </a>

                            |

                            <a
                                href="/lessasv/controllers/JuegoParejaController.php?accion=eliminar&id=<?php echo $pareja['id_juego_pareja']; ?>"
                                onclick="return confirm('¿Eliminar esta pareja?');"
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