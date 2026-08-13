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

$sql = "SELECT * FROM categoria ORDER BY id_categoria";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$categorias = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar categorías</title>
</head>

<body>

    <h1>Gestionar categorías</h1>

    <a href="../index.php">Volver al panel</a>

    <br><br>

    <a href="crear.php">Agregar categoría</a>

    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
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
                    <?php echo $categoria['nombre']; ?>
                </td>

                <td>
                    <?php echo $categoria['descripcion']; ?>
                </td>

                <td>
                    <a href="editar.php?id=<?php echo $categoria['id_categoria']; ?>">
                        Editar
                    </a>

                    |

                    <a href="eliminar.php?id=<?php echo $categoria['id_categoria']; ?>">
                        Eliminar
                    </a>
                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>