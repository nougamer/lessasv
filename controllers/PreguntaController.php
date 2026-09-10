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
require_once __DIR__ . "/../models/Pregunta.php";
require_once __DIR__ . "/../models/Evaluacion.php";

$modeloPregunta =
    new Pregunta($conexion);

$modeloEvaluacion =
    new Evaluacion($conexion);

$accion =
    $_GET['accion'] ?? 'listar';


if ($accion === 'listar') {

    $idEvaluacion =
        $_GET['id_evaluacion'] ?? null;

    if (!$idEvaluacion) {
        header(
            "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
        );
        exit();
    }

    $evaluacion =
        $modeloEvaluacion->obtenerPorId($idEvaluacion);

    if (!$evaluacion) {
        header(
            "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
        );
        exit();
    }

    $preguntas =
        $modeloPregunta->listarPorEvaluacion(
            $idEvaluacion
        );

    require_once __DIR__ .
        "/../views/admin/preguntas/index.php";

    exit();
}


if ($accion === 'crear') {

    $idEvaluacion =
        $_GET['id_evaluacion'] ?? null;

    if (!$idEvaluacion) {
        header(
            "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
        );
        exit();
    }

    $evaluacion =
        $modeloEvaluacion->obtenerPorId($idEvaluacion);

    if (!$evaluacion) {
        header(
            "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
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
            strtoupper(
                trim($_POST['respuesta_correcta'] ?? '')
            );

        if (
            $pregunta !== '' &&
            $opcionA !== '' &&
            $opcionB !== '' &&
            $opcionC !== '' &&
            $opcionD !== '' &&
            in_array(
                $respuestaCorrecta,
                ['A', 'B', 'C', 'D'],
                true
            )
        ) {

            $modeloPregunta->crear(
                $idEvaluacion,
                $pregunta,
                $opcionA,
                $opcionB,
                $opcionC,
                $opcionD,
                $respuestaCorrecta
            );

            header(
                "Location: /lessasv/controllers/PreguntaController.php?accion=listar&id_evaluacion=" .
                urlencode($idEvaluacion)
            );

            exit();
        }
    }

    require_once __DIR__ .
        "/../views/admin/preguntas/crear.php";

    exit();
}


if ($accion === 'editar') {

    $id =
        $_GET['id'] ?? null;

    if (!$id) {
        header(
            "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
        );
        exit();
    }

    $preguntaActual =
        $modeloPregunta->obtenerPorId($id);

    if (!$preguntaActual) {
        header(
            "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
        );
        exit();
    }

    $idEvaluacion =
        $preguntaActual['id_evaluacion'];

    $evaluacion =
        $modeloEvaluacion->obtenerPorId(
            $idEvaluacion
        );

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
            strtoupper(
                trim($_POST['respuesta_correcta'] ?? '')
            );

        if (
            $pregunta !== '' &&
            $opcionA !== '' &&
            $opcionB !== '' &&
            $opcionC !== '' &&
            $opcionD !== '' &&
            in_array(
                $respuestaCorrecta,
                ['A', 'B', 'C', 'D'],
                true
            )
        ) {

            $modeloPregunta->editar(
                $id,
                $pregunta,
                $opcionA,
                $opcionB,
                $opcionC,
                $opcionD,
                $respuestaCorrecta
            );

            header(
                "Location: /lessasv/controllers/PreguntaController.php?accion=listar&id_evaluacion=" .
                urlencode($idEvaluacion)
            );

            exit();
        }
    }

    require_once __DIR__ .
        "/../views/admin/preguntas/editar.php";

    exit();
}


if ($accion === 'eliminar') {

    $id =
        $_GET['id'] ?? null;

    if ($id) {

        $preguntaActual =
            $modeloPregunta->obtenerPorId($id);

        if ($preguntaActual) {

            $idEvaluacion =
                $preguntaActual['id_evaluacion'];

            $modeloPregunta->eliminar($id);

            header(
                "Location: /lessasv/controllers/PreguntaController.php?accion=listar&id_evaluacion=" .
                urlencode($idEvaluacion)
            );

            exit();
        }
    }

    header(
        "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
    );

    exit();
}


header(
    "Location: /lessasv/controllers/EvaluacionController.php?accion=listar"
);

exit();