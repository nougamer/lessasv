<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header(
        "Location: /lessasv/controllers/AuthController.php?accion=login"
    );
    exit();
}

if ($_SESSION['rol'] !== 'Administrador') {
    header(
        "Location: /lessasv/estudiante/index.php"
    );
    exit();
}

require_once __DIR__ . "/../config/conexion.php";
require_once __DIR__ . "/../models/Juego.php";
require_once __DIR__ . "/../models/JuegoPareja.php";

$modeloJuego =
    new Juego($conexion);

$modeloPareja =
    new JuegoPareja($conexion);

$accion =
    $_GET['accion'] ?? 'listar';


function guardarImagenPareja()
{
    if (
        !isset($_FILES['imagen']) ||
        $_FILES['imagen']['error'] === UPLOAD_ERR_NO_FILE
    ) {
        return null;
    }

    if ($_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $permitidas = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'
    ];

    $finfo =
        new finfo(FILEINFO_MIME_TYPE);

    $mime =
        $finfo->file(
            $_FILES['imagen']['tmp_name']
        );

    if (!isset($permitidas[$mime])) {
        return null;
    }

    $directorio =
        __DIR__ .
        "/../assets/uploads/juegos/";

    if (!is_dir($directorio)) {
        mkdir(
            $directorio,
            0775,
            true
        );
    }

    $nombre =
        bin2hex(random_bytes(16)) .
        "." .
        $permitidas[$mime];

    $destino =
        $directorio . $nombre;

    if (
        !move_uploaded_file(
            $_FILES['imagen']['tmp_name'],
            $destino
        )
    ) {
        return null;
    }

    return "assets/uploads/juegos/" .
        $nombre;
}


/* LISTAR */

if ($accion === 'listar') {

    $idJuego =
        $_GET['id_juego'] ?? null;

    if (!$idJuego) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    $juego =
        $modeloJuego->obtenerPorId($idJuego);

    if (
        !$juego ||
        $juego['tipo'] !== 'relacionar'
    ) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    $parejas =
        $modeloPareja->listarPorJuego(
            $idJuego
        );

    require_once __DIR__ .
        "/../views/admin/juego_parejas/index.php";

    exit();
}


/* CREAR */

if ($accion === 'crear') {

    $idJuego =
        $_GET['id_juego'] ?? null;

    if (!$idJuego) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    $juego =
        $modeloJuego->obtenerPorId($idJuego);

    if (
        !$juego ||
        $juego['tipo'] !== 'relacionar'
    ) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $texto =
            trim($_POST['texto'] ?? '');

        $imagen =
            guardarImagenPareja();

        if ($texto === '') {
            $error =
                'Debes escribir el texto de la pareja.';
        } elseif ($imagen === null) {
            $error =
                'Debes seleccionar una imagen JPG, PNG o WEBP válida.';
        } else {

            $modeloPareja->crear(
                $idJuego,
                $texto,
                $imagen
            );

            header(
                "Location: /lessasv/controllers/JuegoParejaController.php?accion=listar&id_juego=" .
                urlencode($idJuego)
            );

            exit();
        }
    }

    require_once __DIR__ .
        "/../views/admin/juego_parejas/crear.php";

    exit();
}


/* EDITAR */

if ($accion === 'editar') {

    $id =
        $_GET['id'] ?? null;

    if (!$id) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    $pareja =
        $modeloPareja->obtenerPorId($id);

    if (!$pareja) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    $idJuego =
        $pareja['id_juego'];

    $juego =
        $modeloJuego->obtenerPorId($idJuego);

    if (
        !$juego ||
        $juego['tipo'] !== 'relacionar'
    ) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $texto =
            trim($_POST['texto'] ?? '');

        if ($texto === '') {

            $error =
                'Debes escribir el texto de la pareja.';

        } else {

            $imagenNueva =
                guardarImagenPareja();

            $imagen =
                $imagenNueva ??
                $pareja['imagen'];

            $modeloPareja->editar(
                $id,
                $texto,
                $imagen
            );

            header(
                "Location: /lessasv/controllers/JuegoParejaController.php?accion=listar&id_juego=" .
                urlencode($idJuego)
            );

            exit();
        }
    }

    require_once __DIR__ .
        "/../views/admin/juego_parejas/editar.php";

    exit();
}


/* ELIMINAR */

if ($accion === 'eliminar') {

    $id =
        $_GET['id'] ?? null;

    if ($id) {

        $pareja =
            $modeloPareja->obtenerPorId($id);

        if ($pareja) {

            $idJuego =
                $pareja['id_juego'];

            $modeloPareja->eliminar($id);

            header(
                "Location: /lessasv/controllers/JuegoParejaController.php?accion=listar&id_juego=" .
                urlencode($idJuego)
            );

            exit();
        }
    }

    header(
        "Location: /lessasv/controllers/JuegoController.php?accion=listar"
    );

    exit();
}


header(
    "Location: /lessasv/controllers/JuegoController.php?accion=listar"
);

exit();