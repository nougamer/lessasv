<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar módulos</title>
</head>

<body>

    <h1>Gestionar módulos - MVC</h1>

    <a href="/lessasv/controllers/DashboardController.php">
        Volver al panel
    </a>

    <br><br>

    <a href="/lessasv/controllers/ModuloController.php?accion=crear">
        Agregar módulo
    </a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($modulos as $modulo) { ?>

            <tr>

                <td>
                    <?php echo $modulo['id_modulo']; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($modulo['nombre']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($modulo['descripcion'] ?? ''); ?>
                </td>

                <td>

                    <a
                        href="/lessasv/controllers/ModuloController.php?accion=editar&id=<?php echo $modulo['id_modulo']; ?>"
                    >
                        Editar
                    </a>

                    |

                    <a
                        href="/lessasv/controllers/ModuloController.php?accion=eliminar&id=<?php echo $modulo['id_modulo']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar este módulo?');"
                    >
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>