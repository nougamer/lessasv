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

$sql = "SELECT id_usuario, nombre, correo, rol
        FROM usuario
        ORDER BY id_usuario";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar usuarios</title>
</head>

<body>

    <h1>Gestionar usuarios</h1>

    <a href="../index.php">Volver al panel</a>
    <br> 
    <a href="../usuarios/crear.php">Crear Usuario</a>
    <br>


    <br><br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($usuarios as $usuario) { ?>

            <tr>

                <td>
                    <?php echo $usuario['id_usuario']; ?>
                </td>

                <td>
                    <?php echo $usuario['nombre']; ?>
                </td>

                <td>
                    <?php echo $usuario['correo']; ?>
                </td>

                <td>
                    <?php echo $usuario['rol']; ?>
                </td>

                <td>
                    <a href="restablecer.php?id=<?php echo $usuario['id_usuario']; ?>">
                        Restablecer contraseña
                    </a>
                    <br>
                    <a href="editar.php?id=<?php echo $usuario['id_usuario']; ?>">
                        Editar
                    </a>
                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>