<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar juego</title>
</head>

<body>

    <h1>Editar juego</h1>

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
            value="<?php echo htmlspecialchars($juego['nombre']); ?>"
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
        ><?php echo htmlspecialchars($juego['descripcion'] ?? ''); ?></textarea>

        <br><br>


        <label>
            Tipo de juego:
        </label>

        <br>

        <select
            name="tipo"
            required
        >

            <option
                value="seleccion"
                <?php
                if ($juego['tipo'] === 'seleccion') {
                    echo 'selected';
                }
                ?>
            >
                Selección
            </option>


            <option
                value="identificar"
                <?php
                if ($juego['tipo'] === 'identificar') {
                    echo 'selected';
                }
                ?>
            >
                Identificar seña
            </option>


            <option
                value="completar"
                <?php
                if ($juego['tipo'] === 'completar') {
                    echo 'selected';
                }
                ?>
            >
                Completar palabra
            </option>


            <option
                value="relacionar"
                <?php
                if ($juego['tipo'] === 'relacionar') {
                    echo 'selected';
                }
                ?>
            >
                Relacionar
            </option>

        </select>

        <br><br>


        <button type="submit">
            Guardar cambios
        </button>

    </form>

</body>

</html>