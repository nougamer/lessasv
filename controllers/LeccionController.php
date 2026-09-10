<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: /lessasv/controllers/AuthController.php?accion=login");
    exit();
}

if ($_SESSION['rol'] != 'Administrador') {
    header("Location: /lessasv/controllers/AuthController.php?accion=login");
    exit();
}

require_once __DIR__ . "/../config/conexion.php";
require_once __DIR__ . "/../models/Leccion.php";
require_once __DIR__ . "/../models/Categoria.php";

$modeloLeccion = new Leccion($conexion);
$modeloCategoria = new Categoria($conexion);

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {

    case 'listar':

        $lecciones = $modeloLeccion->obtenerTodas();

        require_once __DIR__ .
            "/../views/admin/lecciones/index.php";

        break;


    case 'crear':

        $categorias = $modeloCategoria->obtenerTodas();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id_categoria = $_POST['id_categoria'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $significado = $_POST['significado'];
            $orden = $_POST['orden'];

            $ruta_imagen = null;
            $ruta_video = null;

            if (
                isset($_FILES['imagen']) &&
                $_FILES['imagen']['error'] == UPLOAD_ERR_OK
            ) {

                $nombre_imagen =
                    time() . "_" . basename($_FILES['imagen']['name']);

                $destino_imagen =
                    __DIR__ . "/../assets/uploads/imagenes/" . $nombre_imagen;

                if (
                    move_uploaded_file(
                        $_FILES['imagen']['tmp_name'],
                        $destino_imagen
                    )
                ) {
                    $ruta_imagen =
                        "assets/uploads/imagenes/" . $nombre_imagen;
                }
            }

            if (
                isset($_FILES['video']) &&
                $_FILES['video']['error'] == UPLOAD_ERR_OK
            ) {

                $nombre_video =
                    time() . "_" . basename($_FILES['video']['name']);

                $destino_video =
                    __DIR__ . "/../assets/uploads/videos/" . $nombre_video;

                if (
                    move_uploaded_file(
                        $_FILES['video']['tmp_name'],
                        $destino_video
                    )
                ) {
                    $ruta_video =
                        "assets/uploads/videos/" . $nombre_video;
                }
            }

            $modeloLeccion->crear(
                $id_categoria,
                $titulo,
                $descripcion,
                $significado,
                $ruta_imagen,
                $ruta_video,
                $orden
            );

            header(
                "Location: LeccionController.php?accion=listar"
            );
            exit();
        }

        require_once __DIR__ .
            "/../views/admin/lecciones/crear.php";

        break;


    case 'editar':

        if (!isset($_GET['id'])) {
            echo "ID no especificado.";
            exit();
        }

        $id = $_GET['id'];

        $leccion = $modeloLeccion->obtenerPorId($id);

        if (!$leccion) {
            echo "Lección no encontrada.";
            exit();
        }

        $categorias = $modeloCategoria->obtenerTodas();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id_categoria = $_POST['id_categoria'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $significado = $_POST['significado'];
            $orden = $_POST['orden'];

            $ruta_imagen = $leccion['imagen'];
            $ruta_video = $leccion['video'];

            if (
                isset($_FILES['imagen']) &&
                $_FILES['imagen']['error'] == UPLOAD_ERR_OK
            ) {

                $nombre_imagen =
                    time() . "_" . basename($_FILES['imagen']['name']);

                $destino_imagen =
                    __DIR__ . "/../assets/uploads/imagenes/" . $nombre_imagen;

                if (
                    move_uploaded_file(
                        $_FILES['imagen']['tmp_name'],
                        $destino_imagen
                    )
                ) {

                    if (!empty($leccion['imagen'])) {

                        $imagen_anterior =
                            __DIR__ . "/../" . $leccion['imagen'];

                        if (file_exists($imagen_anterior)) {
                            unlink($imagen_anterior);
                        }
                    }

                    $ruta_imagen =
                        "assets/uploads/imagenes/" . $nombre_imagen;
                }
            }

            if (
                isset($_FILES['video']) &&
                $_FILES['video']['error'] == UPLOAD_ERR_OK
            ) {

                $nombre_video =
                    time() . "_" . basename($_FILES['video']['name']);

                $destino_video =
                    __DIR__ . "/../assets/uploads/videos/" . $nombre_video;

                if (
                    move_uploaded_file(
                        $_FILES['video']['tmp_name'],
                        $destino_video
                    )
                ) {

                    if (!empty($leccion['video'])) {

                        $video_anterior =
                            __DIR__ . "/../" . $leccion['video'];

                        if (file_exists($video_anterior)) {
                            unlink($video_anterior);
                        }
                    }

                    $ruta_video =
                        "assets/uploads/videos/" . $nombre_video;
                }
            }

            $modeloLeccion->editar(
                $id,
                $id_categoria,
                $titulo,
                $descripcion,
                $significado,
                $ruta_imagen,
                $ruta_video,
                $orden
            );

            header(
                "Location: LeccionController.php?accion=listar"
            );
            exit();
        }

        require_once __DIR__ .
            "/../views/admin/lecciones/editar.php";

        break;


    case 'eliminar':

        if (!isset($_GET['id'])) {
            echo "ID no especificado.";
            exit();
        }

        $id = $_GET['id'];

        $leccion = $modeloLeccion->obtenerPorId($id);

        if (!$leccion) {
            echo "Lección no encontrada.";
            exit();
        }

        if (!empty($leccion['imagen'])) {

            $ruta_imagen =
                __DIR__ . "/../" . $leccion['imagen'];

            if (file_exists($ruta_imagen)) {
                unlink($ruta_imagen);
            }
        }

        if (!empty($leccion['video'])) {

            $ruta_video =
                __DIR__ . "/../" . $leccion['video'];

            if (file_exists($ruta_video)) {
                unlink($ruta_video);
            }
        }

        $modeloLeccion->eliminar($id);

        header(
            "Location: LeccionController.php?accion=listar"
        );
        exit();


    default:

        echo "Acción no válida.";

        break;
}