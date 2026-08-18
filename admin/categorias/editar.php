<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../login.php");
    exit();
}

if ($_SESSION['rol'] != 'Administrador') {
    header("Location: ../../login.php");
    exit();
}

require_once "../../config/conexion.php";

$id = $_GET['id'];

/* Buscar la categoría que vamos a editar */
$sql = "SELECT * FROM categoria WHERE id_categoria = :id";

$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();

$categoria = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$categoria) {
    echo "Categoría no encontrada.";
    exit();
}

/* Obtener todos los módulos para mostrarlos en el selector */
$sql = "SELECT id_modulo, nombre
        FROM modulo
        ORDER BY id_modulo";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$modulos = $consulta->fetchAll(PDO::FETCH_ASSOC);

/* Guardar los cambios */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_modulo = $_POST['id_modulo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = "UPDATE categoria
            SET id_modulo = :id_modulo,
                nombre = :nombre,
                descripcion = :descripcion
            WHERE id_categoria = :id";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':id_modulo', $id_modulo);
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':descripcion', $descripcion);
    $consulta->bindParam(':id', $id);

    $consulta->execute();

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar categoría</title>
    <link rel="stylesheet" href="../../assets/css/krear.css">
</head>

<body>

    <div class="sidebar">

        <div class="logo">
            <div class="logo-icono">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2 4 5v6c0 5 3.4 8.7 8 11 4.6-2.3 8-6 8-11V5l-8-3Z"/>
                    <path d="m9 12 2 2 4-4"/>
                </svg>
            </div>

            <div>
                <strong>LESSA SV</strong>
                <span>Panel Administrador</span>
            </div>
        </div>

        <a href="../index.php" class="nav-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9.5 12 3l9 6.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z"/>
            </svg>
            <span>Inicio</span>
        </a>

        <a href="index.php" class="nav-item activo">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 7h5l2 2h11v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1Z"/>
            </svg>
            <span>Categorías</span>
        </a>

        <a href="../lecciones/" class="nav-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>
            </svg>
            <span>Lecciones</span>
        </a>

        <a href="../usuarios/" class="nav-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="8" r="3.2"/>
                <path d="M2.5 19c0-3.3 2.9-5.5 6.5-5.5s6.5 2.2 6.5 5.5"/>
                <circle cx="17" cy="8.5" r="2.4"/>
                <path d="M15.8 13.6c2.8.3 4.7 2.2 4.7 5"/>
            </svg>
            <span>Usuarios</span>
        </a>

        <a href="../evaluaciones/" class="nav-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 11.5 11 13.5 15.5 9"/>
                <rect x="3" y="3" width="18" height="18" rx="2"/>
            </svg>
            <span>Evaluaciones</span>
        </a>

        <div class="abajo">

            <div class="perfil-mini">
                <div class="avatar-mini">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 20c0-4 3.6-6.5 8-6.5s8 2.5 8 6.5"/>
                    </svg>
                </div>
            </div>

            <a href="../../logout.php" class="salir">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4"/>
                    <path d="M16 17l5-5-5-5"/>
                    <path d="M21 12H9"/>
                </svg>
                Cerrar Sesión
            </a>

        </div>

    </div>

    <div class="contenido">

        <div class="panel" style="max-width:700px;">

            <p class="breadcrumb">
                <a href="../index.php">Panel de Administración</a> ›
                <a href="index.php">Categorías</a> ›
                <strong>Editar</strong>
            </p>

            <div class="titulo-pagina">

                <a href="index.php" class="volver">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"/>
                        <path d="m12 19-7-7 7-7"/>
                    </svg>
                </a>

                <h1>Editar Categoría</h1>

            </div>

            <form method="POST" class="card-form">

                <div class="card-header">
                    <h2>Detalles de la Categoría</h2>
                    <p>Actualice la información de esta categoría.</p>
                </div>

                <div class="card-body">

                    <!-- NUEVO: selector de módulo -->
                    <div class="campo">

                        <label>
                            Módulo <span class="req">*</span>
                        </label>

                        <select name="id_modulo" required>

                            <?php foreach ($modulos as $modulo) { ?>

                                <option
                                    value="<?php echo $modulo['id_modulo']; ?>"

                                    <?php
                                    if ($modulo['id_modulo'] == $categoria['id_modulo']) {
                                        echo 'selected';
                                    }
                                    ?>
                                >

                                    <?php echo $modulo['nombre']; ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="campo">

                        <label>
                            Nombre <span class="req">*</span>
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            value="<?php echo $categoria['nombre']; ?>"
                            required
                        >

                    </div>

                    <div class="campo">

                        <label>Descripción</label>

                        <textarea name="descripcion"><?php echo $categoria['descripcion']; ?></textarea>

                        <p class="ayuda">
                            La descripción ayuda a los usuarios a entender qué encontrarán en esta categoría.
                        </p>

                    </div>

                </div>

                <div class="card-pie">

                    <a href="index.php" class="btn-cancelar">
                        Cancelar
                    </a>

                    <button type="submit" class="btn-guardar">

                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/>
                            <path d="M17 21v-8H7v8"/>
                            <path d="M7 3v5h8"/>
                        </svg>

                        Guardar cambios

                    </button>

                </div>

            </form>

        </div>

    </div>

</body>

</html>