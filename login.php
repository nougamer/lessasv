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
  <div style="position:relative; display:inline-block; width:100%;">
    <input type="password" id="contrasena" name="contrasena" placeholder="••••••••" required style="width:100%; padding-right:35px; box-sizing:border-box;">
    <span class ="material" onmousedown="contrasena.type='text'" onmouseup="contrasena.type='password'" onmouseleave="contrasena.type='password'" style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer; font-size:15px;">visibility</span>
  </div>

  <button type="submit">Ingresar</button>
</form>
<p style="margin-top:20px">¿Olvidastes tu contraseña? <a href="recuperar.php">Recupérala</a></p>
<p style="margin-top:20px">¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
</body>
</html>
