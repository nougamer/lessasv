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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];

    // Convertimos la contraseña en un hash
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario
            (nombre, correo, contrasena, rol)
            VALUES
            (:nombre, :correo, :contrasena, :rol)";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':correo', $correo);
    $consulta->bindParam(':contrasena', $hash);
    $consulta->bindParam(':rol', $rol);

    $consulta->execute();

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar usuario</title>
</head>

<body>

    <h1>Agregar usuario</h1>

    <form method="POST">

        <label>Nombre:</label>
        <br>
        <input type="text" name="nombre" required>

        <br><br>

        <label>Correo:</label>
        <br>
        <input type="email" name="correo" required>

        <br><br>

        <label>Contraseña:</label>
        <br>
        <input type="password" name="contrasena" required>

        <br><br>

        <label>Rol:</label>
        <br>

        <select name="rol" required>
            <option value="Estudiante">Estudiante</option>
            <option value="Administrador">Administrador</option>
        </select>

        <br><br>

        <button type="submit">
            Crear usuario
        </button>

    </form>

    <br>

    <a href="index.php">Cancelar</a>

</body>

</html>