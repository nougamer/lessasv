<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar contenido - LESSA SV</title>
    <link rel="stylesheet" href="../assets/css/crear.css">
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            <h2>LESSA SV</h2>
            <span>Administrador</span>
        </div>

        <nav>

            <a href="/lessasv/controllers/InicioController.php?accion=index">
                🏠 Inicio
            </a>

            <a href="/lessasv/controllers/ModuloController.php?accion=listar">
                📚 Módulos
            </a>

            <a href="/lessasv/controllers/CategoriaController.php?accion=listar">
                📂 Categorías
            </a>

            <a href="/lessasv/controllers/LeccionController.php?accion=listar">
                📖 Lecciones
            </a>

            <a href="/lessasv/controllers/UsuarioController.php?accion=listar">
                👥 Usuarios
            </a>

            <a href="/lessasv/controllers/EvaluacionController.php?accion=listar">
                📝 Evaluaciones
            </a>

            <a href="/lessasv/controllers/JuegoController.php?accion=listar" class="activo">
                🎮 Juegos
            </a>

        </nav>

        <a href="#" class="logout" id="btnAbrirLogout">
            🚪 Cerrar sesión
        </a>

    </aside>


    <main class="contenido">

        <div class="form-card">

            <div class="form-header">

                <div class="icono">
                    🎮
                </div>

                <div>
                    <h1>Agregar contenido</h1>

                    <p>
                        Juego:
                        <?php echo htmlspecialchars($juego['nombre']); ?>
                    </p>
                </div>

            </div>


            <form
                method="POST"
                enctype="multipart/form-data"
                class="form-body"
            >

                <div class="form-group">

                    <label>
                        Tipo de juego
                    </label>

                    <input
                        type="text"
                        value="<?php echo htmlspecialchars($juego['tipo']); ?>"
                        readonly
                    >

                </div>


                <?php if ($juego['tipo'] === 'seleccion'): ?>

                    <p class="form-info">
                        Escribe una pregunta, cuatro opciones y la letra
                        de la respuesta correcta.
                    </p>

                <?php elseif ($juego['tipo'] === 'identificar'): ?>

                    <p class="form-info">
                        Sube una imagen de una seña y escribe cuatro
                        posibles significados.
                    </p>

                <?php elseif ($juego['tipo'] === 'completar'): ?>

                    <p class="form-info">
                        Escribe la palabra incompleta y luego la respuesta correcta.
                        Las opciones pueden quedar vacías.
                    </p>

                <?php elseif ($juego['tipo'] === 'relacionar'): ?>

                    <p class="form-info">
                        Escribe la seña o concepto que el estudiante debe
                        relacionar y sus posibles respuestas.
                    </p>

                <?php endif; ?>


                <div class="form-group">

                    <label>
                        Pregunta o instrucción
                    </label>

                    <input
                        type="text"
                        name="pregunta"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Imagen
                    </label>

                    <input
                        type="file"
                        name="imagen"
                        accept="image/jpeg,image/png,image/webp"
                    >

                </div>


                <?php if ($juego['tipo'] !== 'completar'): ?>

                    <div class="form-group">

                        <label>
                            Opción A
                        </label>

                        <input
                            type="text"
                            name="opcion_a"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Opción B
                        </label>

                        <input
                            type="text"
                            name="opcion_b"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Opción C
                        </label>

                        <input
                            type="text"
                            name="opcion_c"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Opción D
                        </label>

                        <input
                            type="text"
                            name="opcion_d"
                        >

                    </div>

                <?php endif; ?>


                <div class="form-group">

                    <label>
                        Respuesta correcta
                    </label>


                    <?php if ($juego['tipo'] === 'completar'): ?>

                        <input
                            type="text"
                            name="respuesta_correcta"
                            placeholder="Ejemplo: O"
                            required
                        >

                    <?php else: ?>

                        <select
                            name="respuesta_correcta"
                            required
                        >

                            <option value="">
                                Selecciona la respuesta
                            </option>

                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>

                        </select>

                    <?php endif; ?>

                </div>


                <div class="form-actions">

                    <a
                        href="/lessasv/controllers/JuegoPreguntaController.php?accion=listar&id_juego=<?php echo $juego['id_juego']; ?>"
                        class="btn-cancelar"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="btn-crear"
                    >
                        Guardar contenido
                    </button>

                </div>

            </form>

        </div>

    </main>


    <!-- Modal cerrar sesión -->

    <div id="modalLogout" class="modal">

        <div id="boxPreguntaLogout" class="modal-box">

            <h2>¿Cerrar sesión?</h2>

            <p>
                ¿Estás seguro de que deseas cerrar sesión?
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


        <div id="boxCargandoLogout" class="modal-box cargando">

            <div class="spinner"></div>

            <p>
                Cerrando sesión...
            </p>

            <span id="contadorLogout">
                3
            </span>

        </div>

    </div>


    <script>

        const btnAbrirLogout =
            document.getElementById("btnAbrirLogout");

        const modalLogout =
            document.getElementById("modalLogout");

        const boxPreguntaLogout =
            document.getElementById("boxPreguntaLogout");

        const boxCargandoLogout =
            document.getElementById("boxCargandoLogout");

        const btnCancelarLogout =
            document.getElementById("btnCancelarLogout");

        const btnConfirmarLogout =
            document.getElementById("btnConfirmarLogout");

        const contadorLogout =
            document.getElementById("contadorLogout");


        btnAbrirLogout.addEventListener("click", function (e) {

            e.preventDefault();

            modalLogout.style.display = "flex";

            boxPreguntaLogout.style.display = "block";

            boxCargandoLogout.style.display = "none";

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