<?php

session_start();


/* =========================
   VALIDAR SESIÓN
   ========================= */

if (!isset($_SESSION['id_usuario'])) {

    header(
        "Location: /lessasv/controllers/AuthController.php?accion=login"
    );

    exit();
}


/* =========================
   VALIDAR ADMIN
   ========================= */

if ($_SESSION['rol'] !== 'Administrador') {

    header(
        "Location: /lessasv/estudiante/index.php"
    );

    exit();
}


/* =========================
   CARGAR ARCHIVOS
   ========================= */

require_once __DIR__ . "/../config/conexion.php";

require_once __DIR__ . "/../models/Evaluacion.php";

require_once __DIR__ . "/../models/Modulo.php";


$modeloEvaluacion =
    new Evaluacion($conexion);

$modeloModulo =
    new Modulo($conexion);


/* =========================
   ACCIÓN
   ========================= */

$accion =
    $_GET['accion'] ?? 'listar';


/* =========================
   LISTAR
   ========================= */

if ($accion === 'listar') {

    $evaluaciones =
        $modeloEvaluacion->listar();

    require_once __DIR__ .
        "/../views/admin/evaluaciones/index.php";

    exit();
}


/* =========================
   CREAR
   ========================= */

if ($accion === 'crear') {

    $modulos =
        $modeloModulo->obtenerTodos();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $idModulo =
            $_POST['id_modulo'] ?? '';

        $titulo =
            trim($_POST['titulo'] ?? '');

        $descripcion =
            trim($_POST['descripcion'] ?? '');


        if (
            $idModulo !== '' &&
            $titulo !== ''
        ) {

            $modeloEvaluacion->crear(
                $idModulo,
                $titulo,
                $descripcion
            );


            header(
                "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
            );

            exit();
        }
    }


    require_once __DIR__ .
        "/../views/admin/evaluaciones/crear.php";

    exit();
}


/* =========================
   EDITAR
   ========================= */

if ($accion === 'editar') {

    $id =
        $_GET['id'] ?? null;


    if (!$id) {

        header(
            "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
        );

        exit();
    }


    $evaluacion =
        $modeloEvaluacion->obtenerPorId($id);

    $modulos =
        $modeloModulo->obtenerTodos();


    if (!$evaluacion) {

        header(
            "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
        );

        exit();
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $idModulo =
            $_POST['id_modulo'] ?? '';

        $titulo =
            trim($_POST['titulo'] ?? '');

        $descripcion =
            trim($_POST['descripcion'] ?? '');


        if (
            $idModulo !== '' &&
            $titulo !== ''
        ) {

            $modeloEvaluacion->editar(
                $id,
                $idModulo,
                $titulo,
                $descripcion
            );


            header(
                "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
            );

            exit();
        }
    }


    require_once __DIR__ .
        "/../views/admin/evaluaciones/editar.php";

    exit();
}


/* =========================
   ELIMINAR
   ========================= */

if ($accion === 'eliminar') {

    $id =
        $_GET['id'] ?? null;


    if ($id) {

        $modeloEvaluacion->eliminar($id);
    }


    header(
        "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
    );

    exit();
}


/* =========================
   ACCIÓN INVÁLIDA
   ========================= */

header(
    "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
);

exit();