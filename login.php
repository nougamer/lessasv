<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>LESSA - Iniciar Sesión</title>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/login.css">

</head>
<body>
  <style>
    .toast-error{
    position:fixed;
    top:20px;
    left:50%;
    transform:translateX(-50%);
    background:#1a0d0d;
    border:1px solid #ff5252;
    color:#ff5252;
    padding:12px 20px;
    border-radius:10px;
    display:flex;
    align-items:center;
    gap:8px;
    font-size:13px;
    font-weight:600;
    animation: bajar .3s ease, desaparecer .3s ease 3s forwards;
    z-index:999;
}
@keyframes bajar{
    from{ top:-50px; opacity:0; }
    to{ top:20px; opacity:1; }
}
@keyframes desaparecer{
    to{ opacity:0; top:-50px; }
}
  </style>
  
<?php if (isset($_GET['error'])) { ?>
    <div class="toast-error">
        <span class="material">error</span>
        Correo o contraseña incorrectos
    </div>
<?php } ?>


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
