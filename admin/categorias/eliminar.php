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

$sql = "DELETE FROM categoria
        WHERE id_categoria = :id";

$consulta = $conexion->prepare($sql);

$consulta->bindParam(':id', $id);

$consulta->execute();

header("Location: index.php");
exit();

?>