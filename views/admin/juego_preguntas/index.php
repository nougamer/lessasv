<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido del juego</title>

    <link rel="stylesheet" href="../assets/css/contenido.css">
</head>

<body>

     <aside class="sidebar">

        <div class="logo">

            <div class="logo-icono">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>

            <div>
                <strong>LESSA SV</strong>
                <span>Administrador</span>
            </div>

        </div>


        <nav style="display:flex; flex-direction:column; gap:4px;">

            <a href="/lessasv/controllers/InicioController.php?accion=index" class="nav-item">

                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="9"/>
                    <rect x="14" y="3" width="7" height="5"/>
                    <rect x="14" y="12" width="7" height="9"/>
                    <rect x="3" y="16" width="7" height="5"/>
                </svg>

                <span>Inicio</span>

            </a>


            <a href="/lessasv/controllers/ModuloController.php?accion=listar" class="nav-item">

                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>

                <span>Módulos</span>

            </a>


            <a href="/lessasv/controllers/CategoriaController.php?accion=listar" class="nav-item">

                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                </svg>

                <span>Categorías</span>

            </a>


            <a href="/lessasv/controllers/LeccionController.php?accion=listar" class="nav-item">

                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>

                <span>Lecciones</span>

            </a>


            <a href="/lessasv/controllers/UsuarioController.php?accion=listar" class="nav-item">

                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a2 2 0 0 0-2 2v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>

                <span>Usuarios</span>

            </a>


            <a href="/lessasv/controllers/EvaluacionController.php?accion=listar" class="nav-item">

                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                </svg>

                <span>Evaluaciones</span>

            </a>


            <a href="/lessasv/controllers/JuegoController.php?accion=listar" class="nav-item activo">

                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                    <path d="M6 12h4M8 10v4"/>
                    <path d="M15 11h.01M18 13h.01"/>
                </svg>

                <span>Juegos</span>

            </a>

        </nav>


        <div class="abajo">

            <a href="#" class="salir" id="btnAbrirLogout">

                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>

                <span>Cerrar sesión</span>

            </a>

        </div>

    </aside>



    <main class="contenido">

        <div class="page-header">

            <div class="titulo-contenedor">

                <div class="titulo-icono">

                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 5h16v14H4z"/>
                        <path d="M8 9h8M8 13h5"/>
                    </svg>

                </div>

                <div>

                    <h1>
                        Contenido del juego:
                        <?php echo htmlspecialchars($juego['nombre']); ?>
                    </h1>

                    <p>
                        Tipo:
                        <strong>
                            <?php echo htmlspecialchars($juego['tipo']); ?>
                        </strong>
                    </p>

                </div>

            </div>


            <div class="acciones-header">

                <a
                    href="/lessasv/controllers/JuegoController.php?accion=listar"
                    class="btn-volver"
                >

                    <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>

                    Volver a juegos

                </a>


                <a
                    href="/lessasv/controllers/JuegoPreguntaController.php?accion=crear&id_juego=<?php echo $juego['id_juego']; ?>"
                    class="btn-crear"
                >

                    <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>

                    Agregar contenido

                </a>

            </div>

        </div>


        <div class="info-juego">

            <div class="info-item">

                <span>Tipo de juego</span>

                <strong>
                    <?php echo htmlspecialchars($juego['tipo']); ?>
                </strong>

            </div>

        </div>


        <?php if (empty($contenidos)): ?>

            <div class="grid-vacio">

                <div class="vacio-icono">

                    <svg width="30" height="30" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z"/>
                        <path d="M8 9h8M8 13h5"/>
                    </svg>

                </div>

                <h2>Sin contenido</h2>

                <p>
                    Este juego todavía no tiene contenido.
                </p>

                <a
                    href="/lessasv/controllers/JuegoPreguntaController.php?accion=crear&id_juego=<?php echo $juego['id_juego']; ?>"
                    class="btn-crear-vacio"
                >
                    Agregar contenido
                </a>

            </div>

        <?php else: ?>

            <div class="grid-contenidos">

                <?php foreach ($contenidos as $contenido): ?>

                    <div class="contenido-card">

                        <div class="contenido-imagen">

                            <?php if (!empty($contenido['imagen'])): ?>

                                <img
                                    src="/lessasv/<?php echo htmlspecialchars($contenido['imagen']); ?>"
                                    alt="Imagen del juego"
                                >

                            <?php else: ?>

                                <div class="sin-imagen">

                                    <svg width="42" height="42" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                                        <circle cx="8.5" cy="8.5" r="1.5"/>
                                        <path d="M21 15l-5-5L5 21"/>
                                    </svg>

                                    <span>Sin imagen</span>

                                </div>

                            <?php endif; ?>

                        </div>


                        <div class="contenido-contenido">

                            <div class="contenido-meta">

                                <span class="badge-id">
                                    ID #<?php echo htmlspecialchars($contenido['id_juego_pregunta']); ?>
                                </span>

                                <span class="badge-contenido">
                                    Contenido
                                </span>

                            </div>


                            <div class="contenido-pregunta">

                                <?php echo htmlspecialchars($contenido['pregunta']); ?>

                            </div>


                            <div class="respuesta">

                                <span>Respuesta correcta</span>

                                <strong>
                                    <?php echo htmlspecialchars($contenido['respuesta_correcta']); ?>
                                </strong>

                            </div>


                            <div class="contenido-acciones">

                                <a
                                    href="/lessasv/controllers/JuegoPreguntaController.php?accion=editar&id=<?php echo $contenido['id_juego_pregunta']; ?>"
                                    class="btn-card-editar"
                                >

                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M12 20h9"/>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                                    </svg>

                                    Editar

                                </a>


                                <a
                                    href="/lessasv/controllers/JuegoPreguntaController.php?accion=eliminar&id=<?php echo $contenido['id_juego_pregunta']; ?>"
                                    class="btn-card-eliminar"
                                    onclick="return confirm('¿Eliminar este contenido?');"
                                >

                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6l-1 14H6L5 6"/>
                                        <path d="M10 11v6M14 11v6"/>
                                    </svg>

                                    Eliminar

                                </a>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </main>


    <!-- MODAL CERRAR SESIÓN -->

    <div id="modalLogout" class="modal-overlay" style="display: none;">

        <div class="modal-box">

            <div id="boxPregunta">

                <div class="modal-icono-danger">

                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>

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


            <div id="boxCargando" style="display: none;">

                <div class="rueda-spinner"></div>

                <h3>Cerrando sesión...</h3>

                <p>
                    Redirigiendo en
                    <strong id="txtSegundos">5</strong>
                    segundos.
                </p>

            </div>

        </div>

    </div>


    <script>

        const btnAbrir = document.getElementById('btnAbrirLogout');
        const btnCancelar = document.getElementById('btnCancelarLogout');
        const btnConfirmar = document.getElementById('btnConfirmarLogout');
        const modal = document.getElementById('modalLogout');
        const boxPregunta = document.getElementById('boxPregunta');
        const boxCargando = document.getElementById('boxCargando');
        const txtSegundos = document.getElementById('txtSegundos');

        btnAbrir.addEventListener('click', (e) => {

            e.preventDefault();

            boxPregunta.style.display = 'block';
            boxCargando.style.display = 'none';
            modal.style.display = 'flex';

        });

        btnCancelar.addEventListener('click', () => {

            modal.style.display = 'none';

        });

        btnConfirmar.addEventListener('click', () => {

            boxPregunta.style.display = 'none';
            boxCargando.style.display = 'block';

            let seg = 5;

            txtSegundos.textContent = seg;

            const timer = setInterval(() => {

                seg--;

                txtSegundos.textContent = seg;

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