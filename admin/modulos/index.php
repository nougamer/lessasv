<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../login.php");
    exit();
}

if ($_SESSION['rol'] != 'Administrador') {
    header("Location: ../../login.php");
    exit();
}

require_once "../../config/conexion.php";

$sql = "SELECT * FROM modulo ORDER BY id_modulo";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$modulos = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar módulos</title>
</head>

<body>

    <h1>Gestionar módulos</h1>

    <a href="../index.php">Volver al panel</a>

    <br><br>

    <a href="crear.php">Agregar módulo</a>

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
                    <?php echo $modulo['nombre']; ?>
                </td>

                <td>
                    <?php echo $modulo['descripcion']; ?>
                </td>

                <td>

                    <a href="editar.php?id=<?php echo $modulo['id_modulo']; ?>">
                        Editar
                    </a>

                    |

                    <a href="eliminar.php?id=<?php echo $modulo['id_modulo']; ?>">
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>