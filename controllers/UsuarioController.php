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
   VALIDAR ADMINISTRADOR
   ========================= */

if ($_SESSION['rol'] !== 'Administrador') {

    header(
        "Location: /lessasv/controllers/AuthController.php?accion=login"
    );

    exit();
}


/* =========================
   CARGAR CONEXIÓN Y MODELO
   ========================= */

require_once __DIR__ . "/../config/conexion.php";
require_once __DIR__ . "/../models/Usuario.php";


$modeloUsuario =
    new Usuario($conexion);


/* =========================
   OBTENER ACCIÓN
   ========================= */

$accion =
    $_GET['accion'] ?? 'listar';


switch ($accion) {

    /* =========================
       LISTAR
       ========================= */

    case 'listar':

        $usuarios =
            $modeloUsuario->obtenerTodos();


        require_once __DIR__ .
            "/../views/admin/usuarios/index.php";

        break;


    /* =========================
       CREAR
       ========================= */

    case 'crear':

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nombre =
                trim($_POST['nombre'] ?? '');

            $correo =
                trim($_POST['correo'] ?? '');

            $contrasena =
                $_POST['contrasena'] ?? '';

            $rol =
                $_POST['rol'] ?? 'Estudiante';


            if (
                $nombre === '' ||
                $correo === '' ||
                $contrasena === ''
            ) {

                $error =
                    "Todos los campos son obligatorios.";

            } elseif (
                strlen($contrasena) < 8
            ) {

                $error =
                    "La contraseña debe tener al menos 8 caracteres.";

            } elseif (
                !in_array(
                    $rol,
                    [
                        'Administrador',
                        'Estudiante'
                    ],
                    true
                )
            ) {

                $error =
                    "El rol seleccionado no es válido.";

            } elseif (
                $modeloUsuario
                    ->obtenerPorCorreo($correo)
            ) {

                $error =
                    "Ya existe un usuario con ese correo.";

            } else {

                $modeloUsuario->crear(
                    $nombre,
                    $correo,
                    $contrasena,
                    $rol
                );


                header(
                    "Location: UsuarioController.php?accion=listar"
                );

                exit();
            }
        }


        require_once __DIR__ .
            "/../views/admin/usuarios/crear.php";

        break;


    /* =========================
       EDITAR
       ========================= */

    case 'editar':

        if (!isset($_GET['id'])) {

            echo "ID no especificado.";
            exit();
        }


        $id =
            (int) $_GET['id'];


        $usuario =
            $modeloUsuario->obtenerPorId($id);


        if (!$usuario) {

            echo "Usuario no encontrado.";
            exit();
        }


        $error = null;


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nombre =
                trim($_POST['nombre'] ?? '');

            $correo =
                trim($_POST['correo'] ?? '');

            $rol =
                $_POST['rol'] ?? '';


            if (
                $nombre === '' ||
                $correo === ''
            ) {

                $error =
                    "Nombre y correo son obligatorios.";

            } elseif (
                !in_array(
                    $rol,
                    [
                        'Administrador',
                        'Estudiante'
                    ],
                    true
                )
            ) {

                $error =
                    "El rol seleccionado no es válido.";

            } else {

                $modeloUsuario->editar(
                    $id,
                    $nombre,
                    $correo,
                    $rol
                );


                header(
                    "Location: UsuarioController.php?accion=listar"
                );

                exit();
            }
        }


        require_once __DIR__ .
            "/../views/admin/usuarios/editar.php";

        break;


    /* =========================
       CONTRASEÑA TEMPORAL
       ========================= */

    case 'restablecer':

        if (!isset($_GET['id'])) {

            echo "ID no especificado.";
            exit();
        }


        $id =
            (int) $_GET['id'];


        $usuario =
            $modeloUsuario->obtenerPorId($id);


        if (!$usuario) {

            echo "Usuario no encontrado.";
            exit();
        }


        $error = null;


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nuevaContrasena =
                $_POST['nueva_contrasena'] ?? '';


            if (
                strlen($nuevaContrasena) < 8
            ) {

                $error =
                    "La contraseña temporal debe tener al menos 8 caracteres.";

            } else {

                $modeloUsuario
                    ->actualizarContrasena(
                        $id,
                        $nuevaContrasena
                    );


                header(
                    "Location: UsuarioController.php?accion=listar"
                );

                exit();
            }
        }


        require_once __DIR__ .
            "/../views/admin/usuarios/restablecer.php";

        break;


    /* =========================
       ELIMINAR
       ========================= */

    case 'eliminar':

        if (!isset($_GET['id'])) {

            echo "ID no especificado.";
            exit();
        }


        $id =
            (int) $_GET['id'];


        if (
            $id ==
            $_SESSION['id_usuario']
        ) {

            echo
                "No puedes eliminar tu propia cuenta.";

            exit();
        }


        $modeloUsuario->eliminar($id);


        header(
            "Location: UsuarioController.php?accion=listar"
        );

        exit();


    /* =========================
       ACCIÓN NO VÁLIDA
       ========================= */

    default:

        echo "Acción no válida.";

        break;
}