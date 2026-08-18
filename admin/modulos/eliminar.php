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

try {

    $sql = "DELETE FROM modulo
            WHERE id_modulo = :id";

    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':id', $id);
    $consulta->execute();

    header("Location: index.php");
    exit();

} catch (PDOException $e) {

    echo "No se puede eliminar este módulo porque tiene categorías relacionadas.";

}

?>