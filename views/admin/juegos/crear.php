<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear juego</title>
</head>

<body>

    <h1>Crear juego</h1>

    <a href="/lessasv/controllers/JuegoController.php?accion=listar">
        Volver
    </a>

    <br><br>

    <form method="POST">

        <label>
            Nombre:
        </label>

        <br>

        <input
            type="text"
            name="nombre"
            required
        >

        <br><br>


        <label>
            Descripción:
        </label>

        <br>

        <textarea
            name="descripcion"
            rows="5"
            cols="40"
        ></textarea>

        <br><br>


        <label>
            Tipo de juego:
        </label>

        <br>

        <select
            name="tipo"
            required
        >

            <option value="">
                Selecciona un tipo
            </option>

            <option value="seleccion">
                Selección
            </option>

            <option value="identificar">
                Identificar seña
            </option>

            <option value="completar">
                Completar palabra
            </option>

            <option value="relacionar">
                Relacionar
            </option>

        </select>

        <br><br>


        <button type="submit">
            Guardar juego
        </button>

    </form>

</body>

</html>