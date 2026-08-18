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

$id = $_GET['id'];


/* =========================
   BUSCAR LECCIÓN
   ========================= */

$sql = "SELECT * FROM leccion
        WHERE id_leccion = :id";

$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();

$leccion = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$leccion) {
    echo "Lección no encontrada.";
    exit();
}


/* =========================
   OBTENER CATEGORÍAS
   ========================= */

$sql = "SELECT
            categoria.id_categoria,
            categoria.nombre AS nombre_categoria,
            modulo.nombre AS nombre_modulo
        FROM categoria
        INNER JOIN modulo
            ON categoria.id_modulo = modulo.id_modulo
        ORDER BY modulo.id_modulo, categoria.id_categoria";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$categorias = $consulta->fetchAll(PDO::FETCH_ASSOC);


/* =========================
   GUARDAR CAMBIOS
   ========================= */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_categoria = $_POST['id_categoria'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $significado = $_POST['significado'];
    $orden = $_POST['orden'];

    /*
        Por defecto conservamos los archivos actuales.
        Solo cambian si el administrador sube uno nuevo.
    */
    $ruta_imagen = $leccion['imagen'];
    $ruta_video = $leccion['video'];


    /* =========================
       REEMPLAZAR IMAGEN
       ========================= */

    if (
        isset($_FILES['imagen']) &&
        $_FILES['imagen']['error'] == UPLOAD_ERR_OK
    ) {

        $nombre_imagen =
            time() . "_" . basename($_FILES['imagen']['name']);

        $destino_imagen =
            __DIR__ . "/../../assets/uploads/imagenes/" . $nombre_imagen;

        if (
            move_uploaded_file(
                $_FILES['imagen']['tmp_name'],
                $destino_imagen
            )
        ) {

            /*
                Si la lección ya tenía imagen,
                borramos el archivo viejo.
            */
            if (!empty($leccion['imagen'])) {

                $imagen_anterior =
                    __DIR__ . "/../../" . $leccion['imagen'];

                if (file_exists($imagen_anterior)) {
                    unlink($imagen_anterior);
                }
            }

            /*
                Guardamos la nueva ruta que irá
                a PostgreSQL.
            */
            $ruta_imagen =
                "assets/uploads/imagenes/" . $nombre_imagen;
        }
    }


    /* =========================
       REEMPLAZAR VIDEO
       ========================= */

    if (
        isset($_FILES['video']) &&
        $_FILES['video']['error'] == UPLOAD_ERR_OK
    ) {

        $nombre_video =
            time() . "_" . basename($_FILES['video']['name']);

        $destino_video =
            __DIR__ . "/../../assets/uploads/videos/" . $nombre_video;

        if (
            move_uploaded_file(
                $_FILES['video']['tmp_name'],
                $destino_video
            )
        ) {

            /*
                Si la lección ya tenía video,
                borramos el archivo viejo.
            */
            if (!empty($leccion['video'])) {

                $video_anterior =
                    __DIR__ . "/../../" . $leccion['video'];

                if (file_exists($video_anterior)) {
                    unlink($video_anterior);
                }
            }

            $ruta_video =
                "assets/uploads/videos/" . $nombre_video;
        }
    }


    /* =========================
       ACTUALIZAR POSTGRESQL
       ========================= */

    $sql = "UPDATE leccion
            SET id_categoria = :id_categoria,
                titulo = :titulo,
                descripcion = :descripcion,
                significado = :significado,
                imagen = :imagen,
                video = :video,
                orden = :orden
            WHERE id_leccion = :id";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':id_categoria', $id_categoria);
    $consulta->bindParam(':titulo', $titulo);
    $consulta->bindParam(':descripcion', $descripcion);
    $consulta->bindParam(':significado', $significado);
    $consulta->bindParam(':imagen', $ruta_imagen);
    $consulta->bindParam(':video', $ruta_video);
    $consulta->bindParam(':orden', $orden);
    $consulta->bindParam(':id', $id);

    $consulta->execute();

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar lección</title>
</head>

<body>

    <h1>Editar lección</h1>

    <form method="POST" enctype="multipart/form-data">

        <label>Categoría:</label>
        <br>

        <select name="id_categoria" required>

            <?php foreach ($categorias as $categoria) { ?>

                <option
                    value="<?php echo $categoria['id_categoria']; ?>"

                    <?php
                    if ($categoria['id_categoria'] == $leccion['id_categoria']) {
                        echo 'selected';
                    }
                    ?>
                >

                    <?php
                    echo htmlspecialchars(
                        $categoria['nombre_modulo']
                        . " - "
                        . $categoria['nombre_categoria']
                    );
                    ?>

                </option>

            <?php } ?>

        </select>

        <br><br>

        <label>Orden:</label>
        <br>

        <input
            type="number"
            name="orden"
            min="1"
            value="<?php echo $leccion['orden']; ?>"
            required
        >

        <br><br>

        <label>Título:</label>
        <br>

        <input
            type="text"
            name="titulo"
            value="<?php echo htmlspecialchars($leccion['titulo']); ?>"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"><?php
            echo htmlspecialchars($leccion['descripcion'] ?? '');
        ?></textarea>

        <br><br>

        <label>Significado:</label>
        <br>

        <textarea name="significado"><?php
            echo htmlspecialchars($leccion['significado'] ?? '');
        ?></textarea>

        <br><br>


        <!-- IMAGEN ACTUAL -->

        <label>Imagen actual:</label>
        <br>

        <?php if (!empty($leccion['imagen'])) { ?>

            <img
                src="../../<?php echo htmlspecialchars($leccion['imagen']); ?>"
                width="120"
                alt="Imagen de la lección"
            >

        <?php } else { ?>

            <p>Sin imagen.</p>

        <?php } ?>

        <br>

        <label>Nueva imagen:</label>
        <br>

        <input
            type="file"
            name="imagen"
            accept="image/jpeg,image/png,image/webp"
        >

        <br><br>


        <!-- VIDEO ACTUAL -->

        <label>Video actual:</label>
        <br>

        <?php if (!empty($leccion['video'])) { ?>

            <video width="220" controls>

                <source
                    src="../../<?php echo htmlspecialchars($leccion['video']); ?>"
                >

                Tu navegador no puede reproducir este video.

            </video>

        <?php } else { ?>

            <p>Sin video.</p>

        <?php } ?>

        <br>

        <label>Nuevo video:</label>
        <br>

        <input
            type="file"
            name="video"
            accept="video/mp4,video/webm"
        >

        <br><br>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

    <br>

    <a href="index.php">
        Cancelar
    </a>

</body>

</html>