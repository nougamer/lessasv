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
   VALIDAR ROL ADMIN
   ========================= */

if ($_SESSION['rol'] !== 'Administrador') {

    header(
        "Location: /lessasv/estudiante/index.php"
    );

    exit();
}


/* =========================
   CARGAR CONEXIÓN Y MODELO
   ========================= */

require_once __DIR__ . "/../config/conexion.php";
require_once __DIR__ . "/../models/Dashboard.php";


$modeloDashboard =
    new Dashboard($conexion);


/* =========================
   DATOS DEL DASHBOARD
   ========================= */

$totalUsuarios =
    $modeloDashboard->totalUsuarios();

$totalModulos =
    $modeloDashboard->totalModulos();

$totalCategorias =
    $modeloDashboard->totalCategorias();

$totalLecciones =
    $modeloDashboard->totalLecciones();

$totalEvaluaciones =
    $modeloDashboard->totalEvaluaciones();

$totalJuegos =
    $modeloDashboard->totalJuegos();

$ultimasLecciones =
    $modeloDashboard->ultimasLecciones();


/* =========================
   CARGAR VISTA
   ========================= */

require_once __DIR__ .
    "/../views/admin/index.php";