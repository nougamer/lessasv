<?php

class Usuario
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }


    /* =========================
       OBTENER TODOS
       ========================= */

    public function obtenerTodos()
    {
        $sql = "
            SELECT
                id_usuario,
                nombre,
                correo,
                rol
            FROM usuario
            ORDER BY id_usuario
        ";

        $consulta =
            $this->conexion->prepare($sql);

        $consulta->execute();

        return $consulta->fetchAll(
            PDO::FETCH_ASSOC
        );
    }


    /* =========================
       OBTENER POR ID
       ========================= */

    public function obtenerPorId($id)
    {
        $sql = "
            SELECT
                id_usuario,
                nombre,
                correo,
                rol
            FROM usuario
            WHERE id_usuario = :id
        ";

        $consulta =
            $this->conexion->prepare($sql);

        $consulta->execute([
            ':id' => $id
        ]);

        return $consulta->fetch(
            PDO::FETCH_ASSOC
        );
    }


    /* =========================
       OBTENER POR CORREO
       ========================= */

    public function obtenerPorCorreo($correo)
    {
        $sql = "
            SELECT *
            FROM usuario
            WHERE correo = :correo
        ";

        $consulta =
            $this->conexion->prepare($sql);

        $consulta->execute([
            ':correo' => $correo
        ]);

        return $consulta->fetch(
            PDO::FETCH_ASSOC
        );
    }


    /* =========================
       CREAR USUARIO
       ========================= */

    public function crear(
        $nombre,
        $correo,
        $contrasena,
        $rol
    ) {
        $hash =
            password_hash(
                $contrasena,
                PASSWORD_DEFAULT
            );


        $sql = "
            INSERT INTO usuario (
                nombre,
                correo,
                contrasena,
                rol
            )
            VALUES (
                :nombre,
                :correo,
                :contrasena,
                :rol
            )
        ";

        $consulta =
            $this->conexion->prepare($sql);


        return $consulta->execute([
            ':nombre' => $nombre,
            ':correo' => $correo,
            ':contrasena' => $hash,
            ':rol' => $rol
        ]);
    }


    /* =========================
       EDITAR USUARIO
       ========================= */

    public function editar(
        $id,
        $nombre,
        $correo,
        $rol
    ) {
        $sql = "
            UPDATE usuario
            SET
                nombre = :nombre,
                correo = :correo,
                rol = :rol
            WHERE id_usuario = :id
        ";

        $consulta =
            $this->conexion->prepare($sql);


        return $consulta->execute([
            ':nombre' => $nombre,
            ':correo' => $correo,
            ':rol' => $rol,
            ':id' => $id
        ]);
    }


    /* =========================
       ACTUALIZAR CONTRASEÑA
       ========================= */

    public function actualizarContrasena(
        $id,
        $nuevaContrasena
    ) {
        $hash =
            password_hash(
                $nuevaContrasena,
                PASSWORD_DEFAULT
            );


        $sql = "
            UPDATE usuario
            SET contrasena = :contrasena
            WHERE id_usuario = :id
        ";

        $consulta =
            $this->conexion->prepare($sql);


        return $consulta->execute([
            ':contrasena' => $hash,
            ':id' => $id
        ]);
    }


    /* =========================
       ELIMINAR USUARIO
       ========================= */

    public function eliminar($id)
    {
        $sql = "
            DELETE FROM usuario
            WHERE id_usuario = :id
        ";

        $consulta =
            $this->conexion->prepare($sql);


        return $consulta->execute([
            ':id' => $id
        ]);
    }
}