<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar preguntas</title>
    <link rel="stylesheet" href="../assets/css/preguntas.css">
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
            <a href="/lessasv/controllers/UsuarioController.php?accion=listar" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <span>Usuarios</span>
            </a>
            <a href="/lessasv/controllers/EvaluacionController.php?accion=listar" class="nav-item activo">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                <span>Evaluaciones</span>
            </a>
            <a href="/lessasv/controllers/JuegoController.php?accion=listar" class="nav-item">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 12h4M8 10v4M15 11h.01M18 13h.01"/></svg>
                <span>Juegos</span>
            </a>
        </nav>

        <div class="abajo">
            <a href="/lessasv/controllers/AuthController.php?accion=logout" class="salir">
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
                <h1>Preguntas de la evaluación</h1>
                <h2><?php echo htmlspecialchars($evaluacion['titulo']); ?></h2>
            </div>

            <div class="header-acciones">
                <a href="/lessasv/controllers/EvaluacionController.php?accion=listar" class="btn-volver">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                    <span>Volver a evaluaciones</span>
                </a>

                <a href="/lessasv/controllers/PreguntaController.php?accion=crear&id_evaluacion=<?php echo $evaluacion['id_evaluacion']; ?>" class="btn-crear">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>Agregar pregunta</span>
                </a>
            </div>
        </div>

        <!-- LISTADO DE PREGUNTAS -->
        <?php if (count($preguntas) > 0) { ?>

            <div class="grid-preguntas">

                <?php foreach ($preguntas as $pregunta) { ?>

                    <div class="pregunta-card">
                        <div>
                            <div class="pregunta-header">
                                <span class="badge-id">ID: #<?php echo $pregunta['id_pregunta']; ?></span>
                            </div>

                            <div class="pregunta-texto">
                                <?php echo htmlspecialchars($pregunta['pregunta']); ?>
                            </div>

                            <div class="opciones-list">
                                <!-- OPCIÓN A -->
                                <div class="opcion-item <?php echo ($pregunta['respuesta_correcta'] === 'A') ? 'es-correcta' : ''; ?>">
                                    <span class="opcion-letra">A</span>
                                    <span><?php echo htmlspecialchars($pregunta['opcion_a']); ?></span>
                                    <?php if ($pregunta['respuesta_correcta'] === 'A') { ?>
                                        <span class="badge-correcta-tag">Correcta</span>
                                    <?php } ?>
                                </div>

                                <!-- OPCIÓN B -->
                                <div class="opcion-item <?php echo ($pregunta['respuesta_correcta'] === 'B') ? 'es-correcta' : ''; ?>">
                                    <span class="opcion-letra">B</span>
                                    <span><?php echo htmlspecialchars($pregunta['opcion_b']); ?></span>
                                    <?php if ($pregunta['respuesta_correcta'] === 'B') { ?>
                                        <span class="badge-correcta-tag">Correcta</span>
                                    <?php } ?>
                                </div>

                                <!-- OPCIÓN C -->
                                <div class="opcion-item <?php echo ($pregunta['respuesta_correcta'] === 'C') ? 'es-correcta' : ''; ?>">
                                    <span class="opcion-letra">C</span>
                                    <span><?php echo htmlspecialchars($pregunta['opcion_c']); ?></span>
                                    <?php if ($pregunta['respuesta_correcta'] === 'C') { ?>
                                        <span class="badge-correcta-tag">Correcta</span>
                                    <?php } ?>
                                </div>

                                <!-- OPCIÓN D -->
                                <div class="opcion-item <?php echo ($pregunta['respuesta_correcta'] === 'D') ? 'es-correcta' : ''; ?>">
                                    <span class="opcion-letra">D</span>
                                    <span><?php echo htmlspecialchars($pregunta['opcion_d']); ?></span>
                                    <?php if ($pregunta['respuesta_correcta'] === 'D') { ?>
                                        <span class="badge-correcta-tag">Correcta</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <!-- ACCIONES -->
                        <div class="pregunta-acciones">
                            <a href="/lessasv/controllers/PreguntaController.php?accion=editar&id=<?php echo $pregunta['id_pregunta']; ?>" class="btn-card-editar">
                                Editar
                            </a>

                            <a
                                href="/lessasv/controllers/PreguntaController.php?accion=eliminar&id=<?php echo $pregunta['id_pregunta']; ?>"
                                onclick="return confirm('¿Seguro que deseas eliminar esta pregunta?');"
                                class="btn-card-eliminar"
                            >
                                Eliminar
                            </a>
                        </div>
                    </div>

                <?php } ?>

            </div>

        <?php } else { ?>

            <div class="mensaje-vacio">
                Esta evaluación todavía no tiene preguntas.
            </div>

        <?php } ?>

    </main>

</body>

</html>