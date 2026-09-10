<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear evaluación</title>
</head>

<body>

    <h1>Crear evaluación</h1>

    <a href="/lessasv/controllers/EvaluacionController.php?accion=listar">
        Volver
    </a>

    <br><br>

    <form method="POST">

        <label>
            Módulo:
        </label>

        <br>

        <select name="id_modulo" required>

            <option value="">
                Selecciona un módulo
            </option>

            <?php foreach ($modulos as $modulo) { ?>

                <option value="<?php echo $modulo['id_modulo']; ?>">

                    <?php
                    echo htmlspecialchars(
                        $modulo['nombre']
                    );
                    ?>

                </option>

            <?php } ?>

        </select>

        <br><br>


        <label>
            Título:
        </label>

        <br>

        <input
            type="text"
            name="titulo"
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


        <button type="submit">
            Guardar evaluación
        </button>

    </form>

</body>

</html>
