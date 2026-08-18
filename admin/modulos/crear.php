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

// Obtener los módulos existentes
$sql = "SELECT id_modulo, nombre
        FROM modulo
        ORDER BY id_modulo";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$modulos = $consulta->fetchAll(PDO::FETCH_ASSOC);

// Cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_modulo = $_POST['id_modulo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO categoria
            (id_modulo, nombre, descripcion)
            VALUES
            (:id_modulo, :nombre, :descripcion)";

    $consulta = $conexion->prepare($sql);

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

        <label>Módulo:</label>
        <br>

        <select name="id_modulo" required>

            <?php foreach ($modulos as $modulo) { ?>

                <option value="<?php echo $modulo['id_modulo']; ?>">
                    <?php echo $modulo['nombre']; ?>
                </option>

            <?php } ?>

        </select>

        <br><br>

        <label>Nombre:</label>
        <br>

        <input
            type="text"
            name="nombre"
            required
        >

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"></textarea>

        <br><br>

        <button type="submit">
            Crear categoría
        </button>

    </form>

    <br>

    <a href="index.php">
        Cancelar
    </a>

</body>

</html>