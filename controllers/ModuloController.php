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
require_once __DIR__ . "/../models/Modulo.php";

$modeloModulo = new Modulo($conexion);

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {

    case 'listar':

        $modulos = $modeloModulo->obtenerTodos();

        require_once __DIR__ .
            "/../views/admin/modulos/index.php";

        break;


    case 'crear':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $modeloModulo->crear(
                $nombre,
                $descripcion
            );

            header(
                "Location: ModuloController.php?accion=listar"
            );
            exit();
        }

        require_once __DIR__ .
            "/../views/admin/modulos/crear.php";

        break;


    case 'editar':

        if (!isset($_GET['id'])) {
            echo "ID no especificado.";
            exit();
        }

        $id = $_GET['id'];

        $modulo = $modeloModulo->obtenerPorId($id);

        if (!$modulo) {
            echo "Módulo no encontrado.";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $modeloModulo->editar(
                $id,
                $nombre,
                $descripcion
            );

            header(
                "Location: ModuloController.php?accion=listar"
            );
            exit();
        }

        require_once __DIR__ .
            "/../views/admin/modulos/editar.php";

        break;


    case 'eliminar':

        if (!isset($_GET['id'])) {
            echo "ID no especificado.";
            exit();
        }

        $id = $_GET['id'];

        try {

            $modeloModulo->eliminar($id);

            header(
                "Location: ModuloController.php?accion=listar"
            );
            exit();

        } catch (PDOException $e) {

            echo "No se puede eliminar este módulo porque tiene categorías relacionadas.";
        }

        break;


    default:

        echo "Acción no válida.";

        break;
}