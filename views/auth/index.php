
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LESSA SV - Bienvenida</title>

    <link rel="stylesheet" href="../assets/css/bienvenida.css">
</head>

<body>

    <!-- PANTALLA DE BIENVENIDA -->
    <div class="pantalla bienvenida" id="pantallaBienvenida">

        <div class="contenido-bienvenida">

            <!-- ESPACIO PARA EL LOGO -->
            <div class="logo-empresa">

                <!-- LOGO TEMPORAL -->
                <div class="logo-temporal">
                    LESSA
                </div>

                <!--
                CUANDO TENGAS TU LOGO PUEDES REEMPLAZAR
                EL DIV DE ARRIBA POR:

                <img src="../assets/img/logo.png" alt="Logo LESSA SV">
                -->

            </div>

            <h1>LESSA SV</h1>

            <p class="lema">
                Rompiendo barreras, conectando mundos
            </p>

            <p class="descripcion">
                Aprende, practica y descubre nuevas formas
                de comunicarte a través del lenguaje de señas.
            </p>

            <button class="btn-iniciar" id="btnIniciar">
                Iniciar sesión
            </button>

        </div>

    </div>


    <!-- PANTALLA DE CARGA -->
    <div class="pantalla carga" id="pantallaCarga">

        <div class="contenido-carga">

            <div class="logo-carga">
                LESSA
            </div>

            <div class="spinner"></div>

            <h2>Cargando...</h2>

            <p>Preparando LESSA SV</p>

        </div>

    </div>


    <script>

        const btnIniciar = document.getElementById("btnIniciar");
        const pantallaBienvenida = document.getElementById("pantallaBienvenida");
        const pantallaCarga = document.getElementById("pantallaCarga");

        btnIniciar.addEventListener("click", function () {

            // Ocultar bienvenida
            pantallaBienvenida.classList.add("ocultar");

            // Mostrar pantalla de carga
            pantallaCarga.classList.add("mostrar");

            // Esperar 1.5 segundos y abrir el login
            setTimeout(function () {

                window.location.href = "/lessasv/views/auth/login.php";

            }, 1500);

        });

    </script>

</body>
</html>
