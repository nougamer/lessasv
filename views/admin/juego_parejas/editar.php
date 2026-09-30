<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar pareja - LESSA SV</title>
    <link rel="stylesheet" href="../assets/css/crear.css">
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

            <a href="/lessasv/controllers/EvaluacionController.php?accion=listar" class="nav-item">
                <span>Evaluaciones</span>
            </a>

            <a href="/lessasv/controllers/JuegoController.php?accion=listar" class="nav-item activo">
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
                        🧩
                    </div>

                    <div class="form-header-text">

                        <h2>Agregar pareja</h2>

                        <p>
                            Juego:
                            <strong>
                                <?php echo htmlspecialchars($juego['nombre']); ?>
                            </strong>
                        </p>

                    </div>

                </div>

            </div>


            <form
                method="POST"
                enctype="multipart/form-data"
                class="form-body"
            >

                <?php if (!empty($error)) { ?>

                    <div class="mensaje-error">
                        <?php echo htmlspecialchars($error); ?>
                    </div>

                <?php } ?>


                <div class="form-group">

                    <label>Palabra o texto:</label>

                    <input
                        type="text"
                        name="texto"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Imagen de la seña:</label>

                    <input
                        type="file"
                        name="imagen"
                        accept="image/jpeg,image/png,image/webp"
                        required
                    >

                </div>


                <div class="form-actions">

                    <a
                        href="/lessasv/controllers/JuegoParejaController.php?accion=listar&id_juego=<?php echo $juego['id_juego']; ?>"
                        class="btn-cancelar"
                    >
                        Cancelar
                    </a>

                    <button type="submit" class="btn-crear">
                        Guardar pareja
                    </button>

                </div>

            </form>

        </div>

    </main>


    <div id="modalLogout" class="modal">

        <div class="modal-box" id="boxPreguntaLogout">

            <div class="modal-icon">⚠</div>

            <h3>¿Cerrar sesión?</h3>

            <p>
                ¿Estás seguro de que deseas cerrar tu sesión?
            </p>

            <div class="modal-actions">

                <button type="button" id="btnCancelarLogout" class="btn-cancelar">
                    Cancelar
                </button>

                <button type="button" id="btnConfirmarLogout" class="btn-confirmar">
                    Cerrar sesión
                </button>

            </div>

        </div>


        <div class="modal-box" id="boxCargandoLogout" style="display:none;">

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