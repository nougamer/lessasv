<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LESSA SV - Iniciar sesión</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <!-- Fuente para los íconos (el ojito y el logo) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <!-- Logo adaptado a la imagen -->
    <div class="logo">
        <span class="material">sign_language</span>
    </div>

    <h1>LESSA</h1>
    <p>Ingresa tu correo para continuar aprendiendo lengua de señas</p>

    <?php if (isset($error)) { ?>
        <div class="toast-error">
            <span class="material" style="font-size: 20px;">error</span>
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php } ?>

    <form method="POST" action="/lessasv/controllers/AuthController.php?accion=login">
        
        <div class="input-group">
            <label>Correo:</label>
            <input type="email" name="correo" required>
        </div>

        <div class="input-group">
            <label>Contraseña:</label>
            <div class="password-wrapper">
                <input type="password" name="contrasena" id="contrasena" required>
                <!-- Ícono del ojito -->
                <span class="material toggle-password" id="togglePassword">visibility</span>
            </div>
        </div>

        <button type="submit">Ingresar</button>

    </form>

    <div class="footer-links">
        <p>¿Olvidastes tu contraseña? 
            <a href="/lessasv/controllers/AuthController.php?accion=solicitar-recuperacion">Recupérala</a>
        </p>
        <p>¿No tienes cuenta? 
            <a href="/lessasv/controllers/AuthController.php?accion=registro">Regístrate</a>
        </p>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#contrasena');

        togglePassword.addEventListener('click', function () {
            // Alterna el atributo type
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Alterna el ícono
            this.textContent = type === 'password' ? 'visibility' : 'visibility_off';
        });
    </script>

</body>
</html>