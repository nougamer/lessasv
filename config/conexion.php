<?php

$host = "localhost";
$puerto = "5432";
$basedatos = "lessa_sv";
$usuario = "postgres";
$contrasena = "404547455";

try {

    $conexion = new PDO(
        "pgsql:host=$host;port=$puerto;dbname=$basedatos",
        $usuario,
        $contrasena
    );

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Error de conexión: " . $e->getMessage());

}

?>