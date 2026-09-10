<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar evaluación</title>
</head>

<body>

    <h1>Editar evaluación</h1>

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

            <?php foreach ($modulos as $modulo) { ?>

                <option
                    value="<?php echo $modulo['id_modulo']; ?>"

                    <?php
                    if (
                        $modulo['id_modulo'] ==
                        $evaluacion['id_modulo']
                    ) {
                        echo 'selected';
                    }
                    ?>
                >

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
            value="<?php echo htmlspecialchars($evaluacion['titulo']); ?>"
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
        ><?php echo htmlspecialchars($evaluacion['descripcion'] ?? ''); ?></textarea>

        <br><br>


        <button type="submit">
            Guardar cambios
        </button>

    </form>

</body>

</html>
