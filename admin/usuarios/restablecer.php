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

$sql = "SELECT id_usuario, nombre, correo
        FROM usuario
        WHERE id_usuario = :id";

$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();

$usuario = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nueva_contrasena = $_POST['nueva_contrasena'];

    $hash = password_hash(
        $nueva_contrasena,
        PASSWORD_DEFAULT
    );

    $sql = "UPDATE usuario
            SET contrasena = :contrasena
            WHERE id_usuario = :id";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':contrasena', $hash);
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
    <title>Restablecer contraseña</title>
</head>

<body>

    <h1>Restablecer contraseña</h1>

    <p>
        Usuario:
        <?php echo $usuario['nombre']; ?>
    </p>

    <p>
        Correo:
        <?php echo $usuario['correo']; ?>
    </p>

    <form method="POST">

        <label>Nueva contraseña:</label>
        <br>

        <input
            type="password"
            name="nueva_contrasena"
            required
        >

        <br><br>

        <button type="submit">
            Restablecer contraseña
        </button>

    </form>

    <br>

    <a href="index.php">
        Cancelar
    </a>

</body>

</html>