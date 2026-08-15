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

$sql = "SELECT * FROM categoria ORDER BY id_categoria";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$categorias = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar categorías</title>
    <link rel="stylesheet" href="../../assets/css/categorias.css">

</head>

<body>

    <div class="sidebar">

        <div class="logo">
            <div class="logo-icono">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 4 5v6c0 5 3.4 8.7 8 11 4.6-2.3 8-6 8-11V5l-8-3Z"/><path d="m9 12 2 2 4-4"/></svg>
            </div>
            <div>
                <strong>LESSA SV</strong>
                <span>Panel Administrador</span>
            </div>
        </div>

        <a href="../index.php" class="nav-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9.5 12 3l9 6.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z"/></svg>
            <span>Inicio</span>
        </a>
        <a href="categorias.php" class="nav-item activo">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7h5l2 2h11v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1Z"/></svg>
            <span>Categorías</span>
        </a>
        <a href="lecciones.php" class="nav-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/></svg>
            <span>Lecciones</span>
        </a>
        <a href="usuarios.php" class="nav-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3.2"/><path d="M2.5 19c0-3.3 2.9-5.5 6.5-5.5s6.5 2.2 6.5 5.5"/><circle cx="17" cy="8.5" r="2.4"/><path d="M15.8 13.6c2.8.3 4.7 2.2 4.7 5"/></svg>
            <span>Usuarios</span>
        </a>
        <a href="evaluaciones.php" class="nav-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11.5 11 13.5 15.5 9"/><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
            <span>Evaluaciones</span>
        </a>

        <div class="abajo">
            <div class="perfil-mini">
                <div class="avatar-mini">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-6.5 8-6.5s8 2.5 8 6.5"/></svg>
                </div>
            </div>
            <a href="../login.php" class="salir">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
                Cerrar Sesión
            </a>
        </div>

    </div>

    <div class="contenido">
        <div class="panel">

            <div class="encabezado">
                <h1>Gestionar categorías</h1>
                <a href="crear.php" class="btn-agregar">+ Agregar categoría</a>
            </div>

            <div class="tabla-wrap">
            <table>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>

                <?php foreach ($categorias as $categoria) { ?>

                    <tr>

                        <td>
                            <span class="badge-id"><?php echo $categoria['id_categoria']; ?></span>
                        </td>

                        <td>
                            <?php echo $categoria['nombre']; ?>
                        </td>

                        <td>
                            <?php echo $categoria['descripcion']; ?>
                        </td>

                        <td class="acciones">
                            <a href="editar.php?id=<?php echo $categoria['id_categoria']; ?>" class="btn-editar">
                                Editar
                            </a>

                            <a href="eliminar.php?id=<?php echo $categoria['id_categoria']; ?>" class="btn-eliminar">
                                Eliminar
                            </a>
                        </td>

                    </tr>

                <?php } ?>

            </table>
            </div>

            <p class="pie">Mostrando <?php echo count($categorias); ?> categorías</p>

        </div>
    </div>

</body>

</html>
