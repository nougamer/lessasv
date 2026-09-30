<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LESSA SV - Registro</title>
    <link rel="stylesheet" href="../assets/css/registro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <div class="contenedor">
        <div class="panel-form">
            <div class="logo">
                <span class="material">person_add</span>
            </div>

            <h1>Crear cuenta</h1>
            <p class="subtitle">Únete a LESSA SV y empieza a aprender lengua de señas</p>

            <form method="POST" action="/lessasv/controllers/AuthController.php?accion=registro">
                <div class="input-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" required>
                </div>

                <div class="input-group">
                    <label>Correo:</label>
                    <input type="email" name="correo" required>
                </div>

                <div class="input-group">
                    <label>Contraseña:</label>
                    <div class="password-wrapper">
                        <input type="password" name="contrasena" id="contrasena" required>
                        <span class="material toggle-password" id="togglePassword">visibility</span>
                    </div>
                </div>

                <button type="submit">Registrarse</button>
            </form>

            <div class="footer-links">
                <p>¿Ya tienes una cuenta? <a href="/lessasv/controllers/AuthController.php?accion=login">Inicia sesión</a></p>
            </div>
        </div>

        <div class="panel-imagen">
            <div class="contenido-imagen">
                <h2>LESSA SV</h2>
                <p>Aprende lengua de señas e inclúyete en una nueva forma de comunicarte.</p>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#contrasena');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.textContent = type === 'password' ? 'visibility' : 'visibility_off';
        });
    </script>

</body>

</html>