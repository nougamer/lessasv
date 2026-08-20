<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Estudiante</title>
    <link rel="stylesheet" href="../assets/css/estudiante.css">
</head>

<body>

    <div class="sidebar">

        <div class="logo">
            <div class="logo-icono">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 4 5v6c0 5 3.4 8.7 8 11 4.6-2.3 8-6 8-11V5l-8-3Z"/><path d="m9 12 2 2 4-4"/></svg>
            </div>
            <div>
                <strong>LESSA SV</strong>
                <span>Mi cuenta</span>
            </div>
        </div>

        <a href="index.php" class="nav-item activo">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9.5 12 3l9 6.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z"/></svg>
            <span>Inicio</span>
        </a>
        <a href="perfil.php" class="nav-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-6.5 8-6.5s8 2.5 8 6.5"/></svg>
            <span>Perfil</span>
        </a>

        <div class="abajo">
            <div class="perfil-mini">
                <div class="avatar-mini">
                    <?php echo strtoupper(substr($_SESSION['nombre'], 0, 1)); ?>
                </div>
            </div>
            <a href="../login.php" class="salir">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
                Cerrar Sesión
            </a>
        </div>

    </div>

    <div class="contenido">
        <div class="panel">

            <div class="bienvenida">
                <h1>Hola, <?php echo $_SESSION['nombre']; ?></h1>
                <p>Sigue aprendiendo lengua de señas salvadoreña donde te quedaste.</p>
            </div>

            

            <h2 class="seccion-titulo">Continúa aprendiendo</h2>

            <div class="lecciones">

                <div class="leccion-card">
                    <div class="icono">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/></svg>
                    </div>
                    <div class="info">
                        <h3>Saludos</h3>
                        <div class="barra-progreso"><span style="width:100%"></span></div>
                    </div>
                    <div class="porcentaje">100%</div>
                </div>

                <div class="leccion-card">
                    <div class="icono">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/></svg>
                    </div>
                    <div class="info">
                        <h3>Números del 1 al 10</h3>
                        <div class="barra-progreso"><span style="width:60%"></span></div>
                    </div>
                    <div class="porcentaje">60%</div>
                </div>

                <div class="leccion-card">
                    <div class="icono">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/></svg>
                    </div>
                    <div class="info">
                        <h3>Colores</h3>
                        <div class="barra-progreso"><span style="width:20%"></span></div>
                    </div>
                    <div class="porcentaje">20%</div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>