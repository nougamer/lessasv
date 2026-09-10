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

$modeloJuego =
    new Juego($conexion);

$accion =
    $_GET['accion'] ?? 'listar';


if ($accion === 'listar') {

    $juegos =
        $modeloJuego->listar();

    require_once __DIR__ .
        "/../views/admin/juegos/index.php";

    exit();
}


if ($accion === 'crear') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre =
            trim($_POST['nombre'] ?? '');

        $descripcion =
            trim($_POST['descripcion'] ?? '');

        $tipo =
            trim($_POST['tipo'] ?? '');

        if (
            $nombre !== '' &&
            in_array(
                $tipo,
                [
                    'seleccion',
                    'identificar',
                    'completar',
                    'relacionar'
                ],
                true
            )
        ) {

            $modeloJuego->crear(
                $nombre,
                $descripcion,
                $tipo
            );

            header(
                "Location: /lessasv/controllers/JuegoController.php?accion=listar"
            );

            exit();
        }
    }

    require_once __DIR__ .
        "/../views/admin/juegos/crear.php";

    exit();
}


if ($accion === 'editar') {

    $id =
        $_GET['id'] ?? null;

    if (!$id) {

        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );

        exit();
    }

    $juego =
        $modeloJuego->obtenerPorId($id);

    if (!$juego) {

        header(
            "Location: /lessasv/controllers/JuegoController.php?accion=listar"
        );

        exit();
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre =
            trim($_POST['nombre'] ?? '');

        $descripcion =
            trim($_POST['descripcion'] ?? '');

        $tipo =
            trim($_POST['tipo'] ?? '');

        if (
            $nombre !== '' &&
            in_array(
                $tipo,
                [
                    'seleccion',
                    'identificar',
                    'completar',
                    'relacionar'
                ],
                true
            )
        ) {

            $modeloJuego->editar(
                $id,
                $nombre,
                $descripcion,
                $tipo
            );

            header(
                "Location: /lessasv/controllers/JuegoController.php?accion=listar"
            );

            exit();
        }
    }

    require_once __DIR__ .
        "/../views/admin/juegos/editar.php";

    exit();
}


if ($accion === 'eliminar') {

    $id =
        $_GET['id'] ?? null;

    if ($id) {
        $modeloJuego->eliminar($id);
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