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
        <a href="../index.php" title="Panel principal">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9.5 12 3l9 6.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z"/></svg>
        </a>
        <a href="categorias.php" class="activo" title="Categorías">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7h5l2 2h11v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1Z"/></svg>
        </a>
        <a href="lecciones.php" title="Lecciones">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/></svg>
        </a>
        <a href="evaluaciones.php" title="Evaluaciones">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11.5 11 13.5 15.5 9"/><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
        </a>
        <a href="usuarios.php" title="Usuarios">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3.2"/><path d="M2.5 19c0-3.3 2.9-5.5 6.5-5.5s6.5 2.2 6.5 5.5"/><circle cx="17" cy="8.5" r="2.4"/><path d="M15.8 13.6c2.8.3 4.7 2.2 4.7 5"/></svg>
        </a>
        <a href="../login.php"" class="salir" title="Cerrar sesión">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
        </a>
    </div>

    <div class="contenido">
        <div class="panel">

            <div class="encabezado">
                <h1>Gestionar categorías</h1>
                <a href="crear.php" class="btn-agregar">+ Agregar categoría</a>
            </div>

            <table border="1">

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>

                <?php foreach ($categorias as $categoria) { ?>

                    <tr>

                        <td>
                            <?php echo $categoria['id_categoria']; ?>
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

            <p class="pie">Mostrando <?php echo count($categorias); ?> categorías</p>

        </div>
    </div>

</body>

</html>
