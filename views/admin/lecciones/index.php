<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar lecciones</title>
</head>

<body>

    <h1>Gestionar lecciones - MVC</h1>

    <a href="/lessasv/controllers/DashboardController.php">
        Volver al panel
    </a>

    <br><br>

    <a href="/lessasv/controllers/LeccionController.php?accion=crear">
        Agregar lección
    </a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Módulo</th>
            <th>Categoría</th>
            <th>Orden</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Significado</th>
            <th>Imagen</th>
            <th>Video</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($lecciones as $leccion) { ?>

            <tr>

                <td>
                    <?php echo $leccion['id_leccion']; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($leccion['nombre_modulo']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($leccion['nombre_categoria']); ?>
                </td>

                <td>
                    <?php echo $leccion['orden']; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($leccion['titulo']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($leccion['descripcion'] ?? ''); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($leccion['significado'] ?? ''); ?>
                </td>

                <!-- IMAGEN -->
                <td>

                    <?php if (!empty($leccion['imagen'])) { ?>

                        <img
                            src="/lessasv/<?php echo htmlspecialchars($leccion['imagen']); ?>"
                            width="100"
                            alt="Imagen de la lección"
                        >

                    <?php } else { ?>

                        Sin imagen

                    <?php } ?>

                </td>

                <!-- VIDEO -->
                <td>

                    <?php if (!empty($leccion['video'])) { ?>

                        <video width="180" controls>

                            <source
                                src="/lessasv/<?php echo htmlspecialchars($leccion['video']); ?>"
                            >

                            Tu navegador no puede reproducir este video.

                        </video>

                    <?php } else { ?>

                        Sin video

                    <?php } ?>

                </td>

                <!-- ACCIONES -->
                <td>

                    <a
                        href="/lessasv/controllers/LeccionController.php?accion=editar&id=<?php echo $leccion['id_leccion']; ?>"
                    >
                        Editar
                    </a>

                    |

                    <a
                        href="/lessasv/controllers/LeccionController.php?accion=eliminar&id=<?php echo $leccion['id_leccion']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar esta lección?');"
                    >
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>