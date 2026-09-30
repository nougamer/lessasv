<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar lección - LESSA SV</title>
    <link rel="stylesheet" href="../assets/css/editar.css">
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icono">
                📖
            </div>

            <div>
                <strong>LESSA SV</strong>
                <span>Administrador</span>
            </div>
        </div>

        <nav style="display:flex; flex-direction:column; gap:4px;">

            <a href="/lessasv/controllers/InicioController.php?accion=index" class="nav-item">
                <span>Inicio</span>
            </a>

            <a href="/lessasv/controllers/ModuloController.php?accion=listar" class="nav-item">
                <span>Módulos</span>
            </a>

            <a href="/lessasv/controllers/CategoriaController.php?accion=listar" class="nav-item">
                <span>Categorías</span>
            </a>

            <a href="/lessasv/controllers/LeccionController.php?accion=listar" class="nav-item activo">
                <span>Lecciones</span>
            </a>

            <a href="/lessasv/controllers/UsuarioController.php?accion=listar" class="nav-item">
                <span>Usuarios</span>
            </a>

            <a href="/lessasv/controllers/EvaluacionController.php?accion=listar" class="nav-item">
                <span>Evaluaciones</span>
            </a>

            <a href="/lessasv/controllers/JuegoController.php?accion=listar" class="nav-item">
                <span>Juegos</span>
            </a>

        </nav>

        <div class="abajo">

            <a href="#" class="salir" id="btnAbrirLogout">
                <span>Cerrar sesión</span>
            </a>

        </div>

    </aside>


    <main class="contenido">

        <div class="form-card">

            <div class="form-header">

                <div class="form-header-left">

                    <div class="form-header-icon">
                        📖
                    </div>

                    <div class="form-header-text">

                        <h2>Editar lección</h2>

                        <p>
                            Modifica los datos de la lección.
                        </p>

                    </div>

                </div>

                <div class="badge-id">
                    ID: <?php echo $leccion['id_leccion']; ?>
                </div>

            </div>


            <form
                method="POST"
                action="/lessasv/controllers/LeccionController.php?accion=editar&id=<?php echo $leccion['id_leccion']; ?>"
                enctype="multipart/form-data"
                class="form-body"
            >

                <div class="form-group">

                    <label for="id_categoria">
                        Categoría:
                    </label>

                    <select
                        id="id_categoria"
                        name="id_categoria"
                        class="form-control"
                        required
                    >

                        <?php foreach ($categorias as $categoria) { ?>

                            <option
                                value="<?php echo $categoria['id_categoria']; ?>"
                                <?php
                                if ($categoria['id_categoria'] == $leccion['id_categoria']) {
                                    echo 'selected';
                                }
                                ?>
                            >
                                <?php
                                echo htmlspecialchars(
                                    $categoria['nombre_modulo']
                                    . " - "
                                    . $categoria['nombre_categoria']
                                );
                                ?>
                            </option>

                        <?php } ?>

                    </select>

                </div>


                <div class="form-group">

                    <label for="orden">
                        Orden:
                    </label>

                    <input
                        type="number"
                        id="orden"
                        name="orden"
                        class="form-control"
                        min="1"
                        value="<?php echo htmlspecialchars($leccion['orden']); ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="titulo">
                        Título:
                    </label>

                    <input
                        type="text"
                        id="titulo"
                        name="titulo"
                        class="form-control"
                        value="<?php echo htmlspecialchars($leccion['titulo']); ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="descripcion">
                        Descripción:
                    </label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        class="form-control"
                    ><?php echo htmlspecialchars($leccion['descripcion']); ?></textarea>

                </div>


                <div class="form-group">

                    <label for="significado">
                        Significado:
                    </label>

                    <textarea
                        id="significado"
                        name="significado"
                        class="form-control"
                    ><?php echo htmlspecialchars($leccion['significado']); ?></textarea>

                </div>


                <div class="form-group">

                    <label for="imagen">
                        Imagen:
                    </label>

                    <?php if (!empty($leccion['imagen'])) { ?>

                        <p style="font-size:13px; color:#888;">
                            Imagen actual:
                            <?php echo htmlspecialchars($leccion['imagen']); ?>
                        </p>

                    <?php } ?>

                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp"
                    >

                </div>


                <div class="form-group">

                    <label for="video">
                        Video:
                    </label>

                    <?php if (!empty($leccion['video'])) { ?>

                        <p style="font-size:13px; color:#888;">
                            Video actual:
                            <?php echo htmlspecialchars($leccion['video']); ?>
                        </p>

                    <?php } ?>

                    <input
                        type="file"
                        id="video"
                        name="video"
                        class="form-control"
                        accept="video/mp4,video/webm"
                    >

                </div>


                <div class="form-actions">

                    <a
                        href="/lessasv/controllers/LeccionController.php?accion=listar"
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

    <div
        id="modalLogout"
        class="modal-overlay"
        style="display: none;"
    >

        <div class="modal-box">

            <div id="boxPreguntaLogout">

                <div class="modal-icono-danger">
                    ⚠
                </div>

                <h3>¿Cerrar sesión?</h3>

                <p>
                    ¿Estás seguro de que deseas salir del Panel Administrador?
                </p>

                <div class="modal-acciones">

                    <button
                        type="button"
                        class="btn-secundario"
                        id="btnCancelarLogout"
                    >
                        Cancelar
                    </button>

                    <button
                        type="button"
                        class="btn-danger"
                        id="btnConfirmarLogout"
                    >
                        Sí, salir
                    </button>

                </div>

            </div>


            <div
                id="boxCargandoLogout"
                style="display: none;"
            >

                <div class="rueda-spinner"></div>

                <h3>Cerrando sesión...</h3>

                <p>
                    Redirigiendo en
                    <strong id="txtSegundosLogout">5</strong>
                    segundos.
                </p>

            </div>

        </div>

    </div>


    <script>

        const btnAbrirLogout =
            document.getElementById('btnAbrirLogout');

        const btnCancelarLogout =
            document.getElementById('btnCancelarLogout');

        const btnConfirmarLogout =
            document.getElementById('btnConfirmarLogout');

        const modalLogout =
            document.getElementById('modalLogout');

        const boxPreguntaLogout =
            document.getElementById('boxPreguntaLogout');

        const boxCargandoLogout =
            document.getElementById('boxCargandoLogout');

        const txtSegundosLogout =
            document.getElementById('txtSegundosLogout');


        btnAbrirLogout.addEventListener('click', function (e) {

            e.preventDefault();

            boxPreguntaLogout.style.display = 'block';

            boxCargandoLogout.style.display = 'none';

            modalLogout.style.display = 'flex';

        });


        btnCancelarLogout.addEventListener('click', function () {

            modalLogout.style.display = 'none';

        });


        btnConfirmarLogout.addEventListener('click', function () {

            boxPreguntaLogout.style.display = 'none';

            boxCargandoLogout.style.display = 'block';

            let seg = 5;

            txtSegundosLogout.textContent = seg;


            const timer = setInterval(function () {

                seg--;

                txtSegundosLogout.textContent = seg;

                if (seg <= 0) {

                    clearInterval(timer);

                    window.location.href =
                        "/lessasv/controllers/AuthController.php?accion=logout";

                }

            }, 1000);

        });

    </script>

</body>

</html>