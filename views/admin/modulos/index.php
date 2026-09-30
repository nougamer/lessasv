<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Módulos - LESSA SV</title>
    <link rel="stylesheet" href="../assets/css/modulo.css">
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
            <a href="/lessasv/controllers/ModuloController.php?accion=listar" class="nav-item activo">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                <span>Módulos</span>
            </a>
            <a href="/lessasv/controllers/CategoriaController.php?accion=listar" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                <span>Categorías</span>
            </a>
            <a href="/lessasv/controllers/LeccionController.php?accion=listar" class="nav-item">
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
        <div class="panel">

            <!-- ENCABEZADO -->
            <header class="encabezado">
                <div>
                    <h1>Gestionar Módulos</h1>
                    <p>Administra los bloques de aprendizaje principales del sistema</p>
                </div>

                <div class="perfil">
                    <div class="avatar">
                        <?php echo isset($_SESSION['nombre']) ? strtoupper(substr($_SESSION['nombre'], 0, 1)) : 'A'; ?>
                    </div>
                    <div class="info">
                        <strong><?php echo htmlspecialchars($_SESSION['nombre'] ?? 'Administrador'); ?></strong>
                        <span>Panel Administrador</span>
                    </div>
                </div>
            </header>

            <!-- RESUMEN DE MÓDULOS -->
            <section class="seccion">
                <div class="stats-grid">
                    <div class="stat-box">
                        <span class="label">📦 Total de Módulos</span>
                        <strong class="valor"><?php echo count($modulos); ?></strong>
                    </div>
                    <div class="stat-box">
                        <span class="label">⚡ Estado del Sistema</span>
                        <strong class="valor" style="color: #10b981;">Activo</strong>
                    </div>
                </div>
            </section>

            <!-- BARRA DE ACCIÓN PRINCIPAL -->
            <section class="seccion">
                <div class="toolbar">
                    <a href="/lessasv/controllers/ModuloController.php?accion=crear" class="btn-crear">
                        <div class="icon-circle">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </div>
                        <span>Agregar nuevo módulo</span>
                    </a>
                </div>
            </section>

            <!-- TABLA PRINCIPAL -->
            <section class="seccion">
                <div class="tabla-contenedor">
                    <?php if (count($modulos) > 0) { ?>
                        <table class="tabla-custom">
                            <thead>
                                <tr>
                                    <th style="width: 90px;">ID</th>
                                    <th style="width: 240px;">Nombre</th>
                                    <th>Descripción</th>
                                    <th style="width: 200px; text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($modulos as$modulo) { ?>
                                    <tr>
                                        <td>
                                            <span class="tag-id">#<?php echo $modulo['id_modulo']; ?></span>
                                        </td>
                                        <td>
                                            <strong class="modulo-nombre"><?php echo htmlspecialchars($modulo['nombre']); ?></strong>
                                        </td>
                                        <td style="color: #94a3b8;">
                                            <?php echo htmlspecialchars($modulo['descripcion'] ?? 'Sin descripción'); ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="acciones-cell">
                                                <a href="/lessasv/controllers/ModuloController.php?accion=editar&id=<?php echo $modulo['id_modulo']; ?>" class="btn-accion btn-editar" title="Editar módulo">
                                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                    <span>Editar</span>
                                                </a>

                                                <button type="button" class="btn-accion btn-eliminar" onclick="confirmarEliminar(<?php echo $modulo['id_modulo']; ?>, '<?php echo htmlspecialchars(addslashes($modulo['nombre'])); ?>')" title="Eliminar módulo">
                                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                                    <span>Eliminar</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p class="sin-datos">No hay módulos registrados en este momento.</p>
                    <?php } ?>
                </div>
            </section>

        </div>
    </main>

    <!-- VENTANA MODAL FLOTANTE: ELIMINAR MÓDULO -->
    <div id="modalEliminar" class="modal-overlay" style="display: none;">
        <div class="modal-box">
            <!-- PASO 1: PREGUNTA CONFIRMACIÓN -->
            <div id="boxPreguntaEliminar">
                <div class="modal-icono-danger">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                </div>
                <h3>¿Eliminar módulo?</h3>
                <p>Estás a punto de borrar el módulo <strong id="nombreModuloTarget" style="color: #fff;"></strong>. Esta acción no se puede deshacer.</p>
                <div class="modal-acciones">
                    <button type="button" class="btn-secundario" id="btnCancelarEliminar">Cancelar</button>
                    <button type="button" class="btn-danger" id="btnConfirmarEliminar">Sí, eliminar</button>
                </div>
            </div>

            <!-- PASO 2: SPINNER -->
            <div id="boxCargandoEliminar" style="display: none;">
                <div class="rueda-spinner" style="border-top-color: #ff5252;"></div>
                <h3>Eliminando módulo...</h3>
                <p>Procesando solicitud en <strong id="txtSegundosEliminar">3</strong> segundos.</p>
            </div>
        </div>
    </div>

    <!-- VENTANA MODAL FLOTANTE: CERRAR SESIÓN -->
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

    <script>
        // --- LÓGICA DE MODAL ELIMINAR ---
        let urlEliminarDestino = '';
        const modalEliminar = document.getElementById('modalEliminar');
        const boxPreguntaEliminar = document.getElementById('boxPreguntaEliminar');
        const boxCargandoEliminar = document.getElementById('boxCargandoEliminar');
        const nombreModuloTarget = document.getElementById('nombreModuloTarget');
        const btnCancelarEliminar = document.getElementById('btnCancelarEliminar');
        const btnConfirmarEliminar = document.getElementById('btnConfirmarEliminar');
        const txtSegundosEliminar = document.getElementById('txtSegundosEliminar');

        function confirmarEliminar(id, nombre) {
            urlEliminarDestino = `/lessasv/controllers/ModuloController.php?accion=eliminar&id=${id}`;
            nombreModuloTarget.textContent = nombre;
            boxPreguntaEliminar.style.display = 'block';
            boxCargandoEliminar.style.display = 'none';
            modalEliminar.style.display = 'flex';
        }

        btnCancelarEliminar.addEventListener('click', () => {
            modalEliminar.style.display = 'none';
        });

        btnConfirmarEliminar.addEventListener('click', () => {
            boxPreguntaEliminar.style.display = 'none';
            boxCargandoEliminar.style.display = 'block';

            let seg = 3;
            txtSegundosEliminar.textContent = seg;

            const timer = setInterval(() => {
                seg--;
                txtSegundosEliminar.textContent = seg;

                if (seg <= 0) {
                    clearInterval(timer);
                    window.location.href = urlEliminarDestino;
                }
            }, 1000);
        });

        // --- LÓGICA DE MODAL LOGOUT ---
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