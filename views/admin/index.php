<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador - LESSA SV</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
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
            <a href="/lessasv/controllers/DashboardController.php" class="nav-item activo">
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
                    <h1>Panel del Administrador</h1>
                    <p>Gestiona el contenido principal y los usuarios de LESSA SV</p>
                </div>

                <div class="perfil">
                    <div class="avatar">
                        <?php echo strtoupper(substr($_SESSION['nombre'], 0, 1)); ?>
                    </div>
                    <div class="info">
                        <strong><?php echo htmlspecialchars($_SESSION['nombre']); ?></strong>
                        <span>Administrador</span>
                    </div>
                </div>
            </header>

            <!-- RESUMEN DE DASHBOARD -->
            <section class="seccion">
                <h2 class="subtitulo">Dashboard</h2>
                <div class="stats-grid">
                    <div class="stat-box">
                        <span class="label">👥 Usuarios</span>
                        <strong class="valor"><?php echo $totalUsuarios; ?></strong>
                    </div>
                    <div class="stat-box">
                        <span class="label">📦 Módulos</span>
                        <strong class="valor"><?php echo $totalModulos; ?></strong>
                    </div>
                    <div class="stat-box">
                        <span class="label">📂 Categorías</span>
                        <strong class="valor"><?php echo $totalCategorias; ?></strong>
                    </div>
                    <div class="stat-box">
                        <span class="label">📚 Lecciones</span>
                        <strong class="valor"><?php echo $totalLecciones; ?></strong>
                    </div>
                    <div class="stat-box">
                        <span class="label">📝 Evaluaciones</span>
                        <strong class="valor"><?php echo $totalEvaluaciones; ?></strong>
                    </div>
                    <div class="stat-box">
                        <span class="label">🎮 Juegos</span>
                        <strong class="valor"><?php echo $totalJuegos; ?></strong>
                    </div>
                </div>
            </section>

            <!-- TARJETAS DE ADMINISTRACIÓN -->
            <section class="seccion">
                <h2 class="subtitulo">Administración</h2>
                <div class="grid">

                    <a href="/lessasv/controllers/ModuloController.php?accion=listar" class="card">
                        <div class="top-card">
                            <div class="icono">
                                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            </div>
                            <span class="flecha">→</span>
                        </div>
                        <h3>Gestionar Módulos</h3>
                        <p>Crea, edita y organiza los bloques de aprendizaje principales.</p>
                    </a>

                    <a href="/lessasv/controllers/CategoriaController.php?accion=listar" class="card">
                        <div class="top-card">
                            <div class="icono">
                                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                            </div>
                            <span class="flecha">→</span>
                        </div>
                        <h3>Gestionar Categorías</h3>
                        <p>Agrupa lecciones por temáticas específicas del catálogo.</p>
                    </a>

                    <a href="/lessasv/controllers/LeccionController.php?accion=listar" class="card">
                        <div class="top-card">
                            <div class="icono">
                                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                            </div>
                            <span class="flecha">→</span>
                        </div>
                        <h3>Gestionar Lecciones</h3>
                        <p>Administra el contenido multimedia y textos de las lecciones.</p>
                    </a>

                    <a href="/lessasv/controllers/UsuarioController.php?accion=listar" class="card">
                        <div class="top-card">
                            <div class="icono">
                                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                            </div>
                            <span class="flecha">→</span>
                        </div>
                        <h3>Gestionar Usuarios</h3>
                        <p>Administra alumnos, roles y perfiles del personal operativo.</p>
                    </a>

                    <a href="/lessasv/controllers/EvaluacionController.php?accion=listar" class="card">
                        <div class="top-card">
                            <div class="icono">
                                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            </div>
                            <span class="flecha">→</span>
                        </div>
                        <h3>Gestionar Evaluaciones</h3>
                        <p>Configura pruebas y cuestionarios para medir el avance.</p>
                    </a>

                    <a href="/lessasv/controllers/JuegoController.php?accion=listar" class="card">
                        <div class="top-card">
                            <div class="icono">
                                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="6" width="20" height="12" rx="2"/></svg>
                            </div>
                            <span class="flecha">→</span>
                        </div>
                        <h3>Gestionar Juegos</h3>
                        <p>Modifica mecánicas de práctica y cuestionarios lúdicos.</p>
                    </a>

                </div>
            </section>

            <!-- TABLA ÚLTIMAS LECCIONES -->
            <section class="seccion">
                <h2 class="subtitulo">Últimas lecciones agregadas</h2>
                <div class="tabla-contenedor">
                    <?php if (count($ultimasLecciones) > 0) { ?>
                        <table class="tabla-custom">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Categoría</th>
                                    <th>Orden</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ultimasLecciones as $leccion) { ?>
                                    <tr>
                                        <td><span class="tag-id">#<?php echo $leccion['id_leccion']; ?></span></td>
                                        <td><strong><?php echo htmlspecialchars($leccion['titulo']); ?></strong></td>
                                        <td><span class="tag-cat"><?php echo htmlspecialchars($leccion['categoria']); ?></span></td>
                                        <td><?php echo $leccion['orden']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p class="sin-datos">Todavía no existen lecciones.</p>
                    <?php } ?>
                </div>
            </section>

        </div>
    </main>

    <!-- VENTANA MODAL FLOTANTE CERRAR SESIÓN -->
    <div id="modalLogout" class="modal-overlay" style="display: none;">
        <div class="modal-box">
            <!-- PASO 1: PREGUNTA -->
            <div id="boxPregunta">
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

            <!-- PASO 2: RUEDITA 5 SEG -->
            <div id="boxCargando" style="display: none;">
                <div class="rueda-spinner"></div>
                <h3>Cerrando sesión...</h3>
                <p>Redirigiendo en <strong id="txtSegundos">5</strong> segundos.</p>
            </div>
        </div>
    </div>

    <!-- SCRIPT DEL MODAL Y REDIRECCIÓN -->
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
                    window.location.href = "/lessasv/controllers/AuthController.php?accion=logout";
                }
            }, 1000);
        });
    </script>

</body>

</html>