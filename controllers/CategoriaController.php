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
require_once __DIR__ . "/../models/Categoria.php";
require_once __DIR__ . "/../models/Modulo.php";

$modeloCategoria = new Categoria($conexion);
$modeloModulo = new Modulo($conexion);

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {

    case 'listar':

        $categorias = $modeloCategoria->obtenerTodas();

        require_once __DIR__ .
            "/../views/admin/categorias/index.php";

        break;


    case 'crear':

        $modulos = $modeloModulo->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id_modulo = $_POST['id_modulo'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $modeloCategoria->crear(
                $id_modulo,
                $nombre,
                $descripcion
            );

            header(
                "Location: CategoriaController.php?accion=listar"
            );
            exit();
        }

        require_once __DIR__ .
            "/../views/admin/categorias/crear.php";

        break;


    case 'editar':

        if (!isset($_GET['id'])) {
            echo "ID no especificado.";
            exit();
        }

        $id = $_GET['id'];

        $categoria =
            $modeloCategoria->obtenerPorId($id);

        if (!$categoria) {
            echo "Categoría no encontrada.";
            exit();
        }

        $modulos = $modeloModulo->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id_modulo = $_POST['id_modulo'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $modeloCategoria->editar(
                $id,
                $id_modulo,
                $nombre,
                $descripcion
            );

            header(
                "Location: CategoriaController.php?accion=listar"
            );
            exit();
        }

        require_once __DIR__ .
            "/../views/admin/categorias/editar.php";

        break;


    case 'eliminar':

        if (!isset($_GET['id'])) {
            echo "ID no especificado.";
            exit();
        }

        $id = $_GET['id'];

        try {

            $modeloCategoria->eliminar($id);

            header(
                "Location: CategoriaController.php?accion=listar"
            );
            exit();

        } catch (PDOException $e) {

            echo "No se puede eliminar esta categoría porque tiene lecciones relacionadas.";
        }

        break;


    default:

        echo "Acción no válida.";

        break;
}