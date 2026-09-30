<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear juego - LESSA SV</title>

    <link rel="stylesheet" href="../assets/css/crear.css">
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

            <a href="/lessasv/controllers/DashboardController.php" class="nav-item">
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
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
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
                    <path d="M6 12h4M8 10v4M15 11h.01M18 13h.01"/>
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

        <div class="form-card">

            <div class="form-header">

                <div class="form-header-icon">

                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>

                </div>

                <div class="form-header-text">

                    <h2>Crear juego</h2>

                    <p>
                        Agrega un nuevo juego al sistema
                    </p>

                </div>

            </div>


            <form method="POST" class="form-body">


                <div class="form-group">

                    <label for="nombre">
                        Nombre
                        <span class="requerido">*</span>
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="descripcion">
                        Descripción
                    </label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        class="form-control"
                    ></textarea>

                </div>


                <div class="form-group">

                    <label for="tipo">
                        Tipo de juego
                        <span class="requerido">*</span>
                    </label>

                    <select
                        id="tipo"
                        name="tipo"
                        class="form-control"
                        required
                    >

                        <option value="">
                            Selecciona un tipo
                        </option>

                        <option value="seleccion">
                            Selección
                        </option>

                        <option value="identificar">
                            Identificar seña
                        </option>

                        <option value="completar">
                            Completar palabra
                        </option>

                        <option value="relacionar">
                            Relacionar
                        </option>

                    </select>

                </div>


                <div class="form-actions">

                    <a
                        href="/lessasv/controllers/JuegoController.php?accion=listar"
                        class="btn-cancelar"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="btn-guardar"
                    >

                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                            <polyline points="17 21 17 13 7 13 7 21"/>
                            <polyline points="7 3 7 8 15 8"/>
                        </svg>

                        <span>Guardar juego</span>

                    </button>

                </div>

            </form>

        </div>

    </main>


    <!-- MODAL CERRAR SESIÓN -->

    <div
        class="modal-overlay"
        id="modalLogout"
        style="display:none;"
    >

        <div class="modal-box">

            <div class="modal-icono-danger">

                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>

            </div>

            <h3>¿Cerrar sesión?</h3>

            <p>
                Se cerrará tu sesión actual.
            </p>

            <div class="modal-acciones">

                <button
                    class="btn-secundario"
                    id="btnCancelarLogout"
                >
                    Cancelar
                </button>

                <button
                    class="btn-danger"
                    id="btnConfirmarLogout"
                >
                    Cerrar sesión
                </button>

            </div>

        </div>

    </div>


    <script>

        const btnAbrirLogout =
            document.getElementById('btnAbrirLogout');

        const modalLogout =
            document.getElementById('modalLogout');

        const btnCancelarLogout =
            document.getElementById('btnCancelarLogout');

        const btnConfirmarLogout =
            document.getElementById('btnConfirmarLogout');


        btnAbrirLogout.addEventListener('click', function(e) {

            e.preventDefault();

            modalLogout.style.display = 'flex';

        });


        btnCancelarLogout.addEventListener('click', function() {

            modalLogout.style.display = 'none';

        });


        btnConfirmarLogout.addEventListener('click', function() {

            modalLogout.innerHTML = `
                <div class="modal-box">
                    <div class="rueda-spinner"></div>
                    <h3>Cerrando sesión...</h3>
                    <p>Espera un momento.</p>
                </div>
            `;

            setTimeout(function() {

                window.location.href =
                    "/lessasv/controllers/AuthController.php?accion=logout";

            }, 700);

        });


        modalLogout.addEventListener('click', function(e) {

            if (e.target === modalLogout) {

                modalLogout.style.display = 'none';

            }

        });

    </script>

</body>

</html>