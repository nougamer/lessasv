<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['rol'] != 'Administrador') {
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LESSA SV - Administrador</title>
</head>

<body>

    <h1>Panel del Administrador</h1>

    <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?></h2>

    <p>Correo: <?php echo $_SESSION['correo']; ?></p>

    <p>Rol: <?php echo $_SESSION['rol']; ?></p>

    <br>

    <a href="../admin/categorias/index.php">Gestionar Categorias</a>
    <br>
    <a href="../admin/usuarios/index.php">Gestionar Usuarios</a>
    <br>
    <a href="../logout.php">Cerrar sesión</a>

</body>
</html>