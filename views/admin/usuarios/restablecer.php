<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>
        Contraseña temporal - LESSA SV
    </title>
</head>

<body>

    <h1>
        Asignar contraseña temporal
    </h1>


    <p>
        Usuario:

        <strong>
            <?php
            echo htmlspecialchars(
                $usuario['nombre']
            );
            ?>
        </strong>
    </p>


    <p>
        Correo:

        <strong>
            <?php
            echo htmlspecialchars(
                $usuario['correo']
            );
            ?>
        </strong>
    </p>


    <p>
        Asigna una contraseña temporal al usuario.
    </p>

    <p>
        Después de iniciar sesión,
        el usuario podrá cambiarla desde su perfil.
    </p>


    <?php if (!empty($error)) { ?>

        <p>
            <?php
            echo htmlspecialchars($error);
            ?>
        </p>

    <?php } ?>


    <form
        method="POST"
        action="/lessasv/controllers/UsuarioController.php?accion=restablecer&id=<?php echo $usuario['id_usuario']; ?>"
    >

        <label>
            Contraseña temporal:
        </label>

        <br>


        <input
            type="password"
            name="nueva_contrasena"
            minlength="8"
            required
        >


        <br><br>


        <button type="submit">
            Asignar contraseña temporal
        </button>

    </form>


    <br>


    <a href="/lessasv/controllers/UsuarioController.php?accion=listar">
        Cancelar
    </a>

</body>

</html>