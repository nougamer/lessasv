<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar categorías</title>
</head>

<body>

    <h1>Gestionar categorías - MVC</h1>

    <a href="/lessasv/controllers/DashboardController.php">
        Volver al panel
    </a>

    <br><br>

    <a href="/lessasv/controllers/CategoriaController.php?accion=crear">
        Agregar categoría
    </a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Módulo</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($categorias as $categoria) { ?>

            <tr>

                <td>
                    <?php echo $categoria['id_categoria']; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($categoria['nombre_modulo']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($categoria['nombre_categoria']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($categoria['descripcion'] ?? ''); ?>
                </td>

                <td>

                    <a
                        href="/lessasv/controllers/CategoriaController.php?accion=editar&id=<?php echo $categoria['id_categoria']; ?>"
                    >
                        Editar
                    </a>

                    |

                    <a
                        href="/lessasv/controllers/CategoriaController.php?accion=eliminar&id=<?php echo $categoria['id_categoria']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar esta categoría?');"
                    >
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>