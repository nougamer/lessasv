<?php
session_start();

require_once "config/conexion.php";

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuario WHERE correo = :correo";

$consulta = $conexion->prepare($sql);

$consulta->bindParam(':correo', $correo);

$consulta->execute();

$usuario = $consulta->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {

    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['correo'] = $usuario['correo'];
    $_SESSION['rol'] = $usuario['rol'];

    if ($usuario['rol'] == 'Administrador') {

        header("Location: admin/index.php");
        exit();

    } else {

        header("Location: estudiante/index.php");
        exit();

    }

} else {

    echo "Correo o contraseña incorrectos.";

}

?>