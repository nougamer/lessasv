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
require_once __DIR__ . "/../models/JuegoPregunta.php";

$modeloJuego =
    new Juego($conexion);

$modeloContenido =
    new JuegoPregunta($conexion);

$accion =
    $_GET['accion'] ?? 'listar';


function guardarImagenJuego()
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

    if (!$juego) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    $contenidos =
        $modeloContenido->listarPorJuego(
            $idJuego
        );

    require_once __DIR__ .
        "/../views/admin/juego_preguntas/index.php";

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

    if (!$juego) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $pregunta =
            trim($_POST['pregunta'] ?? '');

        $opcionA =
            trim($_POST['opcion_a'] ?? '');

        $opcionB =
            trim($_POST['opcion_b'] ?? '');

        $opcionC =
            trim($_POST['opcion_c'] ?? '');

        $opcionD =
            trim($_POST['opcion_d'] ?? '');

        $respuestaCorrecta =
            trim(
                $_POST['respuesta_correcta'] ?? ''
            );

        if (
            $pregunta !== '' &&
            $respuestaCorrecta !== ''
        ) {

            $imagen =
                guardarImagenJuego();

            $modeloContenido->crear(
                $idJuego,
                $pregunta,
                $opcionA !== '' ? $opcionA : null,
                $opcionB !== '' ? $opcionB : null,
                $opcionC !== '' ? $opcionC : null,
                $opcionD !== '' ? $opcionD : null,
                $respuestaCorrecta,
                $imagen
            );

            header(
                "Location: /lessasv/controllers/JuegoPreguntaController.php?accion=listar&id_juego=" .
                urlencode($idJuego)
            );

            exit();
        }
    }

    require_once __DIR__ .
        "/../views/admin/juego_preguntas/crear.php";

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

    $contenido =
        $modeloContenido->obtenerPorId($id);

    if (!$contenido) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    $idJuego =
        $contenido['id_juego'];

    $juego =
        $modeloJuego->obtenerPorId($idJuego);

    if (!$juego) {
        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $pregunta =
            trim($_POST['pregunta'] ?? '');

        $opcionA =
            trim($_POST['opcion_a'] ?? '');

        $opcionB =
            trim($_POST['opcion_b'] ?? '');

        $opcionC =
            trim($_POST['opcion_c'] ?? '');

        $opcionD =
            trim($_POST['opcion_d'] ?? '');

        $respuestaCorrecta =
            trim(
                $_POST['respuesta_correcta'] ?? ''
            );

        if (
            $pregunta !== '' &&
            $respuestaCorrecta !== ''
        ) {

            $imagenNueva =
                guardarImagenJuego();

            $imagen =
                $imagenNueva ??
                $contenido['imagen'];

            $modeloContenido->editar(
                $id,
                $pregunta,
                $opcionA !== '' ? $opcionA : null,
                $opcionB !== '' ? $opcionB : null,
                $opcionC !== '' ? $opcionC : null,
                $opcionD !== '' ? $opcionD : null,
                $respuestaCorrecta,
                $imagen
            );

            header(
                "Location: /lessasv/controllers/JuegoPreguntaController.php?accion=listar&id_juego=" .
                urlencode($idJuego)
            );

            exit();
        }
    }

    require_once __DIR__ .
        "/../views/admin/juego_preguntas/editar.php";

    exit();
}


/* ELIMINAR */

if ($accion === 'eliminar') {

    $id =
        $_GET['id'] ?? null;

    if ($id) {

        $contenido =
            $modeloContenido->obtenerPorId($id);

        if ($contenido) {

            $idJuego =
                $contenido['id_juego'];

            $modeloContenido->eliminar($id);

            header(
                "Location: /lessasv/controllers/JuegoPreguntaController.php?accion=listar&id_juego=" .
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