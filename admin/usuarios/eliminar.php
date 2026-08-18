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

// Evitar que el administrador elimine su propia cuenta
if ($id == $_SESSION['id_usuario']) {
    echo "No puedes eliminar tu propia cuenta.";
    exit();
}

$sql = "DELETE FROM usuario
        WHERE id_usuario = :id";

$consulta = $conexion->prepare($sql);

$consulta->bindParam(':id', $id);

$consulta->execute();

header("Location: index.php");
exit();

?>