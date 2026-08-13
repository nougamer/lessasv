<?php

require_once "config/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $hash = password_hash(
        $contrasena,
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO usuario
            (nombre, correo, contrasena, rol)
            VALUES
            (:nombre, :correo, :contrasena, 'Estudiante')";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':correo', $correo);
    $consulta->bindParam(':contrasena', $hash);

    $consulta->execute();

    echo "Usuario registrado correctamente.";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>

<body>

    <h1>Crear cuenta</h1>

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

        <button type="submit">
            Registrarse
        </button>

    </form>

</body>

</html>