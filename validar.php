<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>LESSA - Iniciar Sesión</title>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/login.css">

</head>
<body>

<div class="logo">
    <span class="material">sign_language</span>
  </div>
<h1>LESSA</h1>
<p>Ingresa tu correo para continuar aprendiendo lengua de señas</p>

<form action="validar.php" method="POST">
  <label>Correo:</label>
  <input type="email" name="correo" placeholder="nombre@ejemplo.com" required>

  <label>Contraseña:</label>
  <input type="password" name="contrasena" placeholder="••••••••" required>

  <button type="submit">Ingresar</button>
</form>

<p style="margin-top:20px">¿No tienes cuenta? <a href="registro.html">Regístrate</a></p>

</body>
</html>