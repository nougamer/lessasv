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

/* Buscar la lección antes de borrarla */
$sql = "SELECT imagen, video
        FROM leccion
        WHERE id_leccion = :id";

$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();

$leccion = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$leccion) {
    echo "Lección no encontrada.";
    exit();
}

try {

    /* Borrar imagen si existe */
    if (!empty($leccion['imagen'])) {

        $ruta_imagen =
            __DIR__ . "/../../" . $leccion['imagen'];

        if (file_exists($ruta_imagen)) {
            unlink($ruta_imagen);
        }
    }

    /* Borrar video si existe */
    if (!empty($leccion['video'])) {

        $ruta_video =
            __DIR__ . "/../../" . $leccion['video'];

        if (file_exists($ruta_video)) {
            unlink($ruta_video);
        }
    }

    /* Borrar registro de PostgreSQL */
    $sql = "DELETE FROM leccion
            WHERE id_leccion = :id";

    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':id', $id);
    $consulta->execute();

    header("Location: index.php");
    exit();

} catch (PDOException $e) {

    echo "No se puede eliminar esta lección porque tiene información relacionada.";

}

?>