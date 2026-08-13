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
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO categoria (id_modulo, nombre, descripcion)
            VALUES (:id_modulo, :nombre, :descripcion)";

    $consulta = $conexion->prepare($sql);

    $id_modulo = 1;

    $consulta->bindParam(':id_modulo', $id_modulo);
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':descripcion', $descripcion);

    $consulta->execute();

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar categoría</title>
</head>

<body>

    <h1>Agregar categoría</h1>

    <form method="POST">

        <label>Nombre:</label>
        <br>

        <input type="text" name="nombre" required>

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"></textarea>

        <br><br>

        <button type="submit">
            Guardar categoría
        </button>

    </form>

    <br>

    <a href="index.php">
        Cancelar
    </a>

</body>

</html>