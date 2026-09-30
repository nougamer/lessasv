<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar pregunta - LESSA SV</title>
    <link rel="stylesheet" href="../assets/css/editar.css">
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            <h2>LESSA SV</h2>
            <span>Administrador</span>
        </div>

        <nav>

            <a href="/lessasv/controllers/InicioController.php?accion=index" class="nav-item">
                <span>Inicio</span>
            </a>

            <a href="/lessasv/controllers/ModuloController.php?accion=listar" class="nav-item">
                <span>Módulos</span>
            </a>

            <a href="/lessasv/controllers/CategoriaController.php?accion=listar" class="nav-item">
                <span>Categorías</span>
            </a>

            <a href="/lessasv/controllers/LeccionController.php?accion=listar" class="nav-item">
                <span>Lecciones</span>
            </a>

            <a href="/lessasv/controllers/UsuarioController.php?accion=listar" class="nav-item">
                <span>Usuarios</span>
            </a>

            <a href="/lessasv/controllers/EvaluacionController.php?accion=listar" class="nav-item activo">
                <span>Evaluaciones</span>
            </a>

            <a href="/lessasv/controllers/JuegoController.php?accion=listar" class="nav-item">
                <span>Juegos</span>
            </a>

        </nav>

        <a href="#" id="btnAbrirLogout" class="nav-item logout">
            <span>Cerrar sesión</span>
        </a>

    </aside>


    <main class="contenido">

        <div class="form-card">

            <div class="form-header">

                <div class="form-header-left">

                    <div class="form-header-icon">
                        ?
                    </div>

                    <div class="form-header-text">

                        <h2>Editar pregunta</h2>

                        <p>
                            Evaluación:
                            <strong>
                                <?php echo htmlspecialchars($evaluacion['titulo']); ?>
                            </strong>
                        </p>

                    </div>

                </div>

            </div>


            <form
                method="POST"
                class="form-body"
            >

                <div class="form-group">

                    <label>Pregunta:</label>

                    <textarea
                        name="pregunta"
                        rows="4"
                        required
                    ><?php echo htmlspecialchars($preguntaActual['pregunta']); ?></textarea>

                </div>


                <div class="form-group">

                    <label>Opción A:</label>

                    <input
                        type="text"
                        name="opcion_a"
                        value="<?php echo htmlspecialchars($preguntaActual['opcion_a']); ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Opción B:</label>

                    <input
                        type="text"
                        name="opcion_b"
                        value="<?php echo htmlspecialchars($preguntaActual['opcion_b']); ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Opción C:</label>

                    <input
                        type="text"
                        name="opcion_c"
                        value="<?php echo htmlspecialchars($preguntaActual['opcion_c']); ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Opción D:</label>

                    <input
                        type="text"
                        name="opcion_d"
                        value="<?php echo htmlspecialchars($preguntaActual['opcion_d']); ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Respuesta correcta:</label>

                    <select
                        name="respuesta_correcta"
                        required
                    >

                        <?php foreach (['A', 'B', 'C', 'D'] as $opcion) { ?>

                            <option
                                value="<?php echo $opcion; ?>"
                                <?php
                                if ($preguntaActual['respuesta_correcta'] === $opcion) {
                                    echo 'selected';
                                }
                                ?>
                            >
                                <?php echo $opcion; ?>
                            </option>

                        <?php } ?>

                    </select>

                </div>


                <div class="form-actions">

                    <a
                        href="/lessasv/controllers/PreguntaController.php?accion=listar&id_evaluacion=<?php echo $idEvaluacion; ?>"
                        class="btn-cancelar"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="btn-actualizar"
                    >
                        Guardar cambios
                    </button>

                </div>

            </form>

        </div>

    </main>


    <!-- MODAL CERRAR SESIÓN -->

    <div id="modalLogout" class="modal">

        <div class="modal-box" id="boxPreguntaLogout">

            <div class="modal-icon">
                ⚠
            </div>

            <h3>¿Cerrar sesión?</h3>

            <p>
                ¿Estás seguro de que deseas cerrar tu sesión?
            </p>

            <div class="modal-actions">

                <button
                    type="button"
                    id="btnCancelarLogout"
                    class="btn-cancelar"
                >
                    Cancelar
                </button>

                <button
                    type="button"
                    id="btnConfirmarLogout"
                    class="btn-confirmar"
                >
                    Cerrar sesión
                </button>

            </div>

        </div>


        <div
            class="modal-box"
            id="boxCargandoLogout"
            style="display:none;"
        >

            <div class="spinner"></div>

            <h3>Cerrando sesión...</h3>

            <p>
                Serás redirigido en
                <span id="contadorLogout">3</span>
            </p>

        </div>

    </div>


    <script>

        const btnAbrirLogout = document.getElementById("btnAbrirLogout");
        const modalLogout = document.getElementById("modalLogout");
        const btnCancelarLogout = document.getElementById("btnCancelarLogout");
        const btnConfirmarLogout = document.getElementById("btnConfirmarLogout");
        const boxPreguntaLogout = document.getElementById("boxPreguntaLogout");
        const boxCargandoLogout = document.getElementById("boxCargandoLogout");
        const contadorLogout = document.getElementById("contadorLogout");


        btnAbrirLogout.addEventListener("click", function (e) {

            e.preventDefault();

            modalLogout.style.display = "flex";

        });


        btnCancelarLogout.addEventListener("click", function () {

            modalLogout.style.display = "none";

        });


        btnConfirmarLogout.addEventListener("click", function () {

            boxPreguntaLogout.style.display = "none";
            boxCargandoLogout.style.display = "block";

            let contador = 3;

            contadorLogout.textContent = contador;

            const intervalo = setInterval(function () {

                contador--;

                contadorLogout.textContent = contador;

                if (contador <= 0) {

                    clearInterval(intervalo);

                    window.location.href =
                        "/lessasv/controllers/AuthController.php?accion=logout";

                }

            }, 1000);

        });

    </script>

</body>

</html>