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

/* Obtener categorías */
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


/* Crear lección */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_categoria = $_POST['id_categoria'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $significado = $_POST['significado'];
    $orden = $_POST['orden'];

    /* Por defecto no hay archivos */
    $ruta_imagen = null;
    $ruta_video = null;


    /* =========================
       SUBIR IMAGEN
       ========================= */

    if (
        isset($_FILES['imagen']) &&
        $_FILES['imagen']['error'] == UPLOAD_ERR_OK
    ) {

        $nombre_imagen = time() . "_" . basename($_FILES['imagen']['name']);

        $destino_imagen =
            "../../assets/uploads/imagenes/" . $nombre_imagen;

        if (move_uploaded_file(
            $_FILES['imagen']['tmp_name'],
            $destino_imagen
        )) {

            $ruta_imagen =
                "assets/uploads/imagenes/" . $nombre_imagen;
        }
    }


    /* =========================
       SUBIR VIDEO
       ========================= */

    if (
        isset($_FILES['video']) &&
        $_FILES['video']['error'] == UPLOAD_ERR_OK
    ) {

        $nombre_video = time() . "_" . basename($_FILES['video']['name']);

        $destino_video =
            "../../assets/uploads/videos/" . $nombre_video;

        if (move_uploaded_file(
            $_FILES['video']['tmp_name'],
            $destino_video
        )) {

            $ruta_video =
                "assets/uploads/videos/" . $nombre_video;
        }
    }


    /* Guardar lección en PostgreSQL */

    $sql = "INSERT INTO leccion
            (
                id_categoria,
                titulo,
                descripcion,
                significado,
                imagen,
                video,
                orden
            )
            VALUES
            (
                :id_categoria,
                :titulo,
                :descripcion,
                :significado,
                :imagen,
                :video,
                :orden
            )";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':id_categoria', $id_categoria);
    $consulta->bindParam(':titulo', $titulo);
    $consulta->bindParam(':descripcion', $descripcion);
    $consulta->bindParam(':significado', $significado);
    $consulta->bindParam(':imagen', $ruta_imagen);
    $consulta->bindParam(':video', $ruta_video);
    $consulta->bindParam(':orden', $orden);

    $consulta->execute();

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar lección</title>
</head>

<body>

    <h1>Agregar lección</h1>

    <!-- IMPORTANTE: enctype permite enviar archivos -->
    <form method="POST" enctype="multipart/form-data">

        <label>Categoría:</label>
        <br>

        <select name="id_categoria" required>

            <?php foreach ($categorias as $categoria) { ?>

                <option value="<?php echo $categoria['id_categoria']; ?>">

                    <?php
                    echo $categoria['nombre_modulo']
                        . " - "
                        . $categoria['nombre_categoria'];
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
            required
        >

        <br><br>

        <label>Título:</label>
        <br>

        <input
            type="text"
            name="titulo"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"></textarea>

        <br><br>

        <label>Significado:</label>
        <br>

        <textarea name="significado"></textarea>

        <br><br>

        <label>Imagen:</label>
        <br>

        <input
            type="file"
            name="imagen"
            accept="image/jpeg,image/png,image/webp"
        >

        <br><br>

        <label>Video:</label>
        <br>

        <input
            type="file"
            name="video"
            accept="video/mp4,video/webm"
        >

        <br><br>

        <button type="submit">
            Crear lección
        </button>

    </form>

    <br>

    <a href="index.php">Cancelar</a>

</body>

</html>