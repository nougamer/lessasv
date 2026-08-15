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

// Buscar el usuario
$sql = "SELECT id_usuario, nombre, correo, rol
        FROM usuario
        WHERE id_usuario = :id";

$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();

$usuario = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit();
}

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    $sql = "UPDATE usuario
            SET nombre = :nombre,
                correo = :correo,
                rol = :rol
            WHERE id_usuario = :id";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':correo', $correo);
    $consulta->bindParam(':rol', $rol);
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
    <title>Editar usuario</title>
</head>

<body>

    <h1>Editar usuario</h1>

    <form method="POST">

        <label>Nombre:</label>
        <br>

        <input
            type="text"
            name="nombre"
            value="<?php echo $usuario['nombre']; ?>"
            required
        >

        <br><br>

        <label>Correo:</label>
        <br>

        <input
            type="email"
            name="correo"
            value="<?php echo $usuario['correo']; ?>"
            required
        >

        <br><br>

        <label>Rol:</label>
        <br>

        <select name="rol" required>

            <option value="Estudiante"
                <?php if ($usuario['rol'] == 'Estudiante') echo 'selected'; ?>>
                Estudiante
            </option>

            <option value="Administrador"
                <?php if ($usuario['rol'] == 'Administrador') echo 'selected'; ?>>
                Administrador
            </option>

        </select>

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