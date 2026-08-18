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

$sql = "SELECT
            leccion.id_leccion,
            leccion.titulo,
            leccion.descripcion,
            leccion.significado,
            leccion.orden,
            leccion.imagen,
            leccion.video,
            categoria.nombre AS nombre_categoria,
            modulo.nombre AS nombre_modulo
        FROM leccion
        INNER JOIN categoria
            ON leccion.id_categoria = categoria.id_categoria
        INNER JOIN modulo
            ON categoria.id_modulo = modulo.id_modulo
        ORDER BY
            modulo.id_modulo,
            categoria.id_categoria,
            leccion.orden";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$lecciones = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar lecciones</title>
</head>

<body>

    <h1>Gestionar lecciones</h1>

    <a href="../index.php">
        Volver al panel
    </a>

    <br><br>

    <a href="crear.php">
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
                            src="../../<?php echo htmlspecialchars($leccion['imagen']); ?>"
                            alt="<?php echo htmlspecialchars($leccion['titulo']); ?>"
                            width="100"
                        >

                    <?php } else { ?>

                        Sin imagen

                    <?php } ?>

                </td>

                <!-- VIDEO -->
                <td>

                    <?php if (!empty($leccion['video'])) { ?>

                        <video
                            width="180"
                            controls
                        >

                            <source
                                src="../../<?php echo htmlspecialchars($leccion['video']); ?>"
                            >

                            Tu navegador no puede reproducir este video.

                        </video>

                    <?php } else { ?>

                        Sin video

                    <?php } ?>

                </td>

                <td>

                    <a href="editar.php?id=<?php echo $leccion['id_leccion']; ?>">
                        Editar
                    </a>

                    |

                    <a href="eliminar.php?id=<?php echo $leccion['id_leccion']; ?>">
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>