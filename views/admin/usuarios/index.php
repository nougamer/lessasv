<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar usuarios</title>
</head>

<body>

    <h1>Gestionar usuarios - MVC</h1>

    <a href="/lessasv/controllers/DashboardController.php">
        Volver al panel
    </a>

    <br><br>

    <a href="/lessasv/controllers/UsuarioController.php?accion=crear">
        Agregar usuario
    </a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($usuarios as $usuario) { ?>

            <tr>

                <td><?php echo $usuario['id_usuario']; ?></td>

                <td>
                    <?php echo htmlspecialchars($usuario['nombre']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($usuario['correo']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($usuario['rol']); ?>
                </td>

                <td>

                    <a href="/lessasv/controllers/UsuarioController.php?accion=editar&id=<?php echo $usuario['id_usuario']; ?>">
                        Editar
                    </a>

                    |

                    <a href="/lessasv/controllers/UsuarioController.php?accion=restablecer&id=<?php echo $usuario['id_usuario']; ?>">
                        Restablecer contraseña
                    </a>

                    |

                    <a
                        href="/lessasv/controllers/UsuarioController.php?accion=eliminar&id=<?php echo $usuario['id_usuario']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar este usuario?');"
                    >
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>