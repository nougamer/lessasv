<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>
        Panel Administrador - LESSA SV
    </title>
</head>

<body>


<h1>
    Panel de Administración - LESSA SV
</h1>


<p>
    Bienvenido,

    <strong>
        <?php echo htmlspecialchars($_SESSION['nombre']); ?>
    </strong>
</p>


<hr>


<h2>Dashboard</h2>


<div>

    <p>
        👥 Usuarios:

        <strong>
            <?php echo $totalUsuarios; ?>
        </strong>
    </p>


    <p>
        📦 Módulos:

        <strong>
            <?php echo $totalModulos; ?>
        </strong>
    </p>


    <p>
        📂 Categorías:

        <strong>
            <?php echo $totalCategorias; ?>
        </strong>
    </p>


    <p>
        📚 Lecciones:

        <strong>
            <?php echo $totalLecciones; ?>
        </strong>
    </p>


    <p>
        📝 Evaluaciones:

        <strong>
            <?php echo $totalEvaluaciones; ?>
        </strong>
    </p>


    <p>
        🎮 Juegos:

        <strong>
            <?php echo $totalJuegos; ?>
        </strong>
    </p>

</div>


<hr>


<h2>
    Administración
</h2>


<a href="/lessasv/controllers/ModuloController.php?accion=listar">
    Gestionar módulos
</a>

<br><br>


<a href="/lessasv/controllers/CategoriaController.php?accion=listar">
    Gestionar categorías
</a>

<br><br>


<a href="/lessasv/controllers/LeccionController.php?accion=listar">
    Gestionar lecciones
</a>

<br><br>


<a href="/lessasv/controllers/UsuarioController.php?accion=listar">
    Gestionar usuarios
</a>

<br><br>


<a href="/lessasv/controllers/EvaluacionController.php?accion=listar">
    Gestionar evaluaciones
</a>

<br><br>


<a href="/lessasv/controllers/JuegoController.php?accion=listar">
    Gestionar juegos
</a>


<hr>


<h2>
    Últimas lecciones agregadas
</h2>


<?php if (count($ultimasLecciones) > 0) { ?>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Categoría</th>
            <th>Orden</th>
        </tr>


        <?php foreach ($ultimasLecciones as $leccion) { ?>

            <tr>

                <td>
                    <?php echo $leccion['id_leccion']; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($leccion['titulo']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($leccion['categoria']); ?>
                </td>

                <td>
                    <?php echo $leccion['orden']; ?>
                </td>

            </tr>

        <?php } ?>

    </table>

<?php } else { ?>

    <p>
        Todavía no existen lecciones.
    </p>

<?php } ?>


<hr>


<a href="/lessasv/controllers/AuthController.php?accion=logout">
    🚪 Cerrar sesión
</a>


</body>

</html>