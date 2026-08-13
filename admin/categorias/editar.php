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

$sql = "SELECT * FROM categoria WHERE id_categoria = :id";

$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();

$categoria = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$categoria) {
    echo "Categoría no encontrada.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = "UPDATE categoria
            SET nombre = :nombre,
                descripcion = :descripcion
            WHERE id_categoria = :id";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':descripcion', $descripcion);
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
    <title>Editar categoría</title>
</head>

<body>

    <h1>Editar categoría</h1>

    <form method="POST">

        <label>Nombre:</label>
        <br>

        <input
            type="text"
            name="nombre"
            value="<?php echo $categoria['nombre']; ?>"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"><?php echo $categoria['descripcion']; ?></textarea>

        <br><br>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

    <br>

    <a href="index.php">
        Cancelar
    </a>

</body>

</html>