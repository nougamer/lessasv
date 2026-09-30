<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - LESSA SV</title>
    <link rel="stylesheet" href="../assets/css/editar.css">
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

            <a href="/lessasv/controllers/LeccionController.php?accion=listar" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                <span>Lecciones</span>
            </a>

            <a href="/lessasv/controllers/UsuarioController.php?accion=listar" class="nav-item activo">
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
        <div class="form-card">

            <div class="form-header">

                <div class="form-header-left">

                    <div class="form-header-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </div>

                    <div class="form-header-text">
                        <h2>Editar Usuario</h2>
                        <p>Actualiza los datos del usuario</p>
                    </div>

                </div>

                <span class="badge-id">
                    ID: #<?php echo $usuario['id_usuario']; ?>
                </span>

            </div>

            <form
                method="POST"
                action="/lessasv/controllers/UsuarioController.php?accion=editar&id=<?php echo $usuario['id_usuario']; ?>"
                class="form-body"
            >

                <div class="form-group">

                    <label for="nombre">
                        Nombre <span class="requerido">*</span>
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        value="<?php echo htmlspecialchars($usuario['nombre']); ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="correo">
                        Correo <span class="requerido">*</span>
                    </label>

                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        class="form-control"
                        value="<?php echo htmlspecialchars($usuario['correo']); ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="rol">
                        Rol <span class="requerido">*</span>
                    </label>

                    <select
                        id="rol"
                        name="rol"
                        class="form-control"
                        required
                    >

                        <option
                            value="Estudiante"
                            <?php if ($usuario['rol'] == 'Estudiante') echo 'selected'; ?>
                        >
                            Estudiante
                        </option>

                        <option
                            value="Administrador"
                            <?php if ($usuario['rol'] == 'Administrador') echo 'selected'; ?>
                        >
                            Administrador
                        </option>

                    </select>

                </div>

                <div class="form-actions">

                    <a
                        href="/lessasv/controllers/UsuarioController.php?accion=listar"
                        class="btn-cancelar"
                    >
                        Cancelar
                    </a>

                    <button type="submit" class="btn-actualizar">

                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>

                        <span>Guardar cambios</span>

                    </button>

                </div>

            </form>

        </div>
    </main>

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

                    <button type="button" class="btn-secundario" id="btnCancelarLogout">
                        Cancelar
                    </button>

                    <button type="button" class="btn-danger" id="btnConfirmarLogout">
                        Sí, salir
                    </button>

                </div>

            </div>

            <div id="boxCargandoLogout" style="display: none;">

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