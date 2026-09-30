<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar lecciones</title>
    <link rel="stylesheet" href="../assets/css/lecciones.css">
</head>

<body>

    <!-- BARRA LATERAL (SIDEBAR) -->
    <aside class="sidebar">
        <div class="logo">
            <div class="logo-icono">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <div>
                <strong>LESSA SV</strong>
                <span>Administrador</span>
            </div>
        </div>

        <nav style="display:flex; flex-direction:column; gap:4px;">
            <a href="/lessasv/controllers/DashboardController.php" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>
                <span>Inicio</span>
            </a>
            <a href="/lessasv/controllers/ModuloController.php?accion=listar" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                <span>Módulos</span>
            </a>
            <a href="/lessasv/controllers/CategoriaController.php?accion=listar" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                <span>Categorías</span>
            </a>
            <a href="/lessasv/controllers/LeccionController.php?accion=listar" class="nav-item activo">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                <span>Lecciones</span>
            </a>
            <a href="/lessasv/controllers/UsuarioController.php?accion=listar" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <span>Usuarios</span>
            </a>
            <a href="/lessasv/controllers/EvaluacionController.php?accion=listar" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                <span>Evaluaciones</span>
            </a>
            <a href="/lessasv/controllers/JuegoController.php?accion=listar" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 12h4M8 10v4M15 11h.01M18 13h.01"/></svg>
                <span>Juegos</span>
            </a>
        </nav>

        <div class="abajo">
            <a href="#" class="salir" id="btnAbrirLogout">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                <span>Cerrar sesión</span>
            </a>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenido">

        <!-- ENCABEZADO -->
        <div class="page-header">
            <div>
                <h1>Gestionar lecciones - MVC</h1>
            </div>

            <div class="header-acciones">
                

                <a href="/lessasv/controllers/LeccionController.php?accion=crear" class="btn-crear">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>Agregar lección</span>
                </a>
            </div>
        </div>

        <!-- CUADRÍCULA DE LECCIONES -->
        <div class="grid-lecciones">
            <?php foreach ($lecciones as$leccion) { ?>

                <div class="leccion-card">
                    <div>
                        <!-- META Y ORDEN -->
                        <div class="leccion-meta-header">
                            <span class="badge-id">ID: #<?php echo $leccion['id_leccion']; ?></span>
                            <span class="badge-orden">Orden: <?php echo $leccion['orden']; ?></span>
                        </div>

                        <!-- MÓDULO Y CATEGORÍA -->
                        <div class="tags-container">
                            <span class="badge-modulo">
                                <?php echo htmlspecialchars($leccion['nombre_modulo']); ?>
                            </span>
                            <span class="badge-categoria">
                                <?php echo htmlspecialchars($leccion['nombre_categoria']); ?>
                            </span>
                        </div>

                        <!-- TÍTULO -->
                        <h3 class="leccion-titulo">
                            <?php echo htmlspecialchars($leccion['titulo']); ?>
                        </h3>

                        <!-- DESCRIPCIÓN Y SIGNIFICADO -->
                        <div class="leccion-info-block">
                            <div class="info-item">
                                <label>Descripción</label>
                                <p><?php echo htmlspecialchars($leccion['descripcion'] ?? ''); ?></p>
                            </div>
                            <div class="info-item">
                                <label>Significado</label>
                                <p><?php echo htmlspecialchars($leccion['significado'] ?? ''); ?></p>
                            </div>
                        </div>

                        <!-- MULTIMEDIA -->
                        <div class="media-grid">
                            
                            <!-- IMAGEN -->
                            <div class="media-box">
                                <span class="media-label">Imagen</span>
                                <?php if (!empty($leccion['imagen'])) { ?>

                                    <img
                                        src="/lessasv/<?php echo htmlspecialchars($leccion['imagen']); ?>"
                                        width="100"
                                        alt="Imagen de la lección"
                                    >

                                <?php } else { ?>

                                    <span class="media-vacio">Sin imagen</span>

                                <?php } ?>
                            </div>

                            <!-- VIDEO -->
                            <div class="media-box">
                                <span class="media-label">Video</span>
                                <?php if (!empty($leccion['video'])) { ?>

                                    <video width="180" controls>

                                        <source
                                            src="/lessasv/<?php echo htmlspecialchars($leccion['video']); ?>"
                                        >

                                        Tu navegador no puede reproducir este video.

                                    </video>

                                <?php } else { ?>

                                    <span class="media-vacio">Sin video</span>

                                <?php } ?>
                            </div>

                        </div>
                    </div>

                    <!-- ACCIONES -->
                    <div class="leccion-acciones">
                        <a
                            href="/lessasv/controllers/LeccionController.php?accion=editar&id=<?php echo $leccion['id_leccion']; ?>"
                            class="btn-card-editar"
                        >
                            Editar
                        </a>

                        <a
                            href="/lessasv/controllers/LeccionController.php?accion=eliminar&id=<?php echo $leccion['id_leccion']; ?>"
                            class="btn-card-eliminar btn-eliminar-leccion"
                            data-titulo="<?php echo htmlspecialchars($leccion['titulo']); ?>"
                        >
                            Eliminar
                        </a>
                    </div>
                </div>

            <?php } ?>
        </div>

    </main>

    <!-- MODAL CONFIRMAR ELIMINAR LECCIÓN -->
    <div id="modalEliminar" class="modal-overlay" style="display: none;">
        <div class="modal-box">
            <div class="modal-icono-danger">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <h3>¿Eliminar lección?</h3>
            <p>¿Estás seguro de que deseas eliminar <strong id="lblTituloLeccion"></strong>? Esta acción no se puede deshacer.</p>
            <div class="modal-acciones">
                <button type="button" class="btn-secundario" id="btnCancelarEliminar">Cancelar</button>
                <a href="#" class="btn-danger" id="btnConfirmarEliminar">Sí, eliminar</a>
            </div>
        </div>
    </div>

    <!-- MODAL LOGOUT -->
    <div id="modalLogout" class="modal-overlay" style="display: none;">
        <div class="modal-box">
            <div id="boxPreguntaLogout">
                <div class="modal-icono-danger">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                </div>
                <h3>¿Cerrar sesión?</h3>
                <p>¿Estás seguro de que deseas salir del Panel Administrador?</p>
                <div class="modal-acciones">
                    <button type="button" class="btn-secundario" id="btnCancelarLogout">Cancelar</button>
                    <button type="button" class="btn-danger" id="btnConfirmarLogout">Sí, salir</button>
                </div>
            </div>

            <div id="boxCargandoLogout" style="display: none;">
                <div class="rueda-spinner"></div>
                <h3>Cerrando sesión...</h3>
                <p>Redirigiendo en <strong id="txtSegundosLogout">5</strong> segundos.</p>
            </div>
        </div>
    </div>

    <!-- SCRIPTS DE INTERACCIÓN -->
    <script>
        // Modal Eliminar Lección
        const modalEliminar = document.getElementById('modalEliminar');
        const btnCancelarEliminar = document.getElementById('btnCancelarEliminar');
        const btnConfirmarEliminar = document.getElementById('btnConfirmarEliminar');
        const lblTituloLeccion = document.getElementById('lblTituloLeccion');

        document.querySelectorAll('.btn-eliminar-leccion').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                const titulo = this.getAttribute('data-titulo') || '';

                lblTituloLeccion.textContent = titulo ? `"${titulo}"` : 'esta lección';
                btnConfirmarEliminar.setAttribute('href', url);
                modalEliminar.style.display = 'flex';
            });
        });

        btnCancelarEliminar.addEventListener('click', () => {
            modalEliminar.style.display = 'none';
        });

        // Modal Logout
        const btnAbrirLogout = document.getElementById('btnAbrirLogout');
        const btnCancelarLogout = document.getElementById('btnCancelarLogout');
        const btnConfirmarLogout = document.getElementById('btnConfirmarLogout');
        const modalLogout = document.getElementById('modalLogout');
        const boxPreguntaLogout = document.getElementById('boxPreguntaLogout');
        const boxCargandoLogout = document.getElementById('boxCargandoLogout');
        const txtSegundosLogout = document.getElementById('txtSegundosLogout');

        btnAbrirLogout.addEventListener('click', (e) => {
            e.preventDefault();
            boxPreguntaLogout.style.display = 'block';
            boxCargandoLogout.style.display = 'none';
            modalLogout.style.display = 'flex';
        });

        btnCancelarLogout.addEventListener('click', () => {
            modalLogout.style.display = 'none';
        });

        btnConfirmarLogout.addEventListener('click', () => {
            boxPreguntaLogout.style.display = 'none';
            boxCargandoLogout.style.display = 'block';

            let seg = 5;
            txtSegundosLogout.textContent = seg;

            const timer = setInterval(() => {
                seg--;
                txtSegundosLogout.textContent = seg;

                if (seg <= 0) {
                    clearInterval(timer);
                    window.location.href = "/lessasv/controllers/AuthController.php?accion=logout";
                }
            }, 1000);
        });
    </script>

</body>

</html>