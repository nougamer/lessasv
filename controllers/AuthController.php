<?php

session_start();

/* =========================
   CARGAR CONEXIÓN Y MODELO
   ========================= */

require_once __DIR__ . "/../config/conexion.php";
require_once __DIR__ . "/../models/Usuario.php";

$modeloUsuario = new Usuario($conexion);


/* =========================
   OBTENER ACCIÓN
   ========================= */

$accion = $_GET['accion'] ?? 'login';


switch ($accion) {

    /* =========================
       LOGIN
       ========================= */

    case 'login':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $correo =
                trim($_POST['correo'] ?? '');

            $contrasena =
                $_POST['contrasena'] ?? '';

            $usuario =
                $modeloUsuario->obtenerPorCorreo($correo);


            if (
                $usuario &&
                password_verify(
                    $contrasena,
                    $usuario['contrasena']
                )
            ) {

                $_SESSION['id_usuario'] =
                    $usuario['id_usuario'];

                $_SESSION['nombre'] =
                    $usuario['nombre'];

                $_SESSION['correo'] =
                    $usuario['correo'];

                $_SESSION['rol'] =
                    $usuario['rol'];


                if (
                    $usuario['rol'] ===
                    'Administrador'
                ) {

                    header(
                        "Location: /lessasv/controllers/DashboardController.php"
                    );

                    exit();

                } else {

                    header(
                        "Location: /lessasv/estudiante/index.php"
                    );

                    exit();
                }

            } else {

                $error =
                    "Correo o contraseña incorrectos.";
            }
        }


        require_once __DIR__ .
            "/../views/auth/login.php";

        break;


    /* =========================
       REGISTRO
       ========================= */

    case 'registro':

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nombre =
                trim($_POST['nombre'] ?? '');

            $correo =
                trim($_POST['correo'] ?? '');

            $contrasena =
                $_POST['contrasena'] ?? '';


            if (
                $nombre === '' ||
                $correo === '' ||
                $contrasena === ''
            ) {

                $error =
                    "Todos los campos son obligatorios.";

            } elseif (
                !filter_var(
                    $correo,
                    FILTER_VALIDATE_EMAIL
                )
            ) {

                $error =
                    "El correo no es válido.";

            } elseif (
                strlen($contrasena) < 8
            ) {

                $error =
                    "La contraseña debe tener al menos 8 caracteres.";

            } elseif (
                $modeloUsuario
                    ->obtenerPorCorreo($correo)
            ) {

                $error =
                    "Ya existe una cuenta con ese correo.";

            } else {

                /*
                    Registro público:
                    siempre crea Estudiante.
                */
                $modeloUsuario->crear(
                    $nombre,
                    $correo,
                    $contrasena,
                    'Estudiante'
                );


                header(
                    "Location: AuthController.php?accion=login"
                );

                exit();
            }
        }


        require_once __DIR__ .
            "/../views/auth/registro.php";

        break;


    /* =========================
       RECUPERAR CONTRASEÑA
       MEDIANTE SOPORTE
       ========================= */

    case 'solicitar-recuperacion':

        require_once __DIR__ .
            "/../views/auth/recuperar.php";

        break;


    /* =========================
       CERRAR SESIÓN
       ========================= */

    case 'logout':

        session_unset();
        session_destroy();


        header(
            "Location: AuthController.php?accion=login"
        );

        exit();


    /* =========================
       ACCIÓN NO VÁLIDA
       ========================= */

    default:

        echo "Acción no válida.";

        break;
}