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

    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/registro.css">
</head>

<body>

    <div class="contenedor">

        <div class="panel-form">

            <div class="logo">
                <span class="material">sign_language</span>
            </div>
            <h1>LESSA</h1>
            <p>Crea tu cuenta y empieza a aprender lengua de señas</p>

            <?php if (isset($mensaje)) { ?>
                <p class="exito"><?php echo $mensaje; ?></p>
            <?php } ?>

            <form method="POST">

                <label>Nombre:</label>
                <input type="text" name="nombre" required>

                <label>Correo:</label>
                <input type="email" name="correo" required>

                <label>Contraseña:</label>
                <input type="password" name="contrasena" required>

                <button type="submit">Registrarse</button>

            </form>

            <p style="margin-top:20px">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>

        </div>

        <div class="panel-imagen">
            <div>
                <h2>Aprende Lengua de Señas Salvadoreña</h2>
                <p>Únete a LESSA y comienza a comunicarte sin barreras.</p>
            </div>
        </div>

    </div>

</body>

</html>
