<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear módulo</title>
</head>

<body>

    <h1>Crear módulo - MVC</h1>

    <form
        method="POST"
        action="/lessasv/controllers/ModuloController.php?accion=crear"
    >

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
            Crear módulo
        </button>

    </form>

    <br>

    <a href="/lessasv/controllers/ModuloController.php?accion=listar">
        Cancelar
    </a>

</body>

</html>