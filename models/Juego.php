<?php

class Juego
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function listar()
    {
        $sql = "
            SELECT
                id_juego,
                nombre,
                descripcion,
                tipo
            FROM juego
            ORDER BY id_juego
        ";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "
            SELECT
                id_juego,
                nombre,
                descripcion,
                tipo
            FROM juego
            WHERE id_juego = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($nombre, $descripcion, $tipo)
    {
        $sql = "
            INSERT INTO juego (
                nombre,
                descripcion,
                tipo
            )
            VALUES (
                :nombre,
                :descripcion,
                :tipo
            )
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':tipo' => $tipo
        ]);
    }

    public function editar(
        $id,
        $nombre,
        $descripcion,
        $tipo
    ) {
        $sql = "
            UPDATE juego
            SET
                nombre = :nombre,
                descripcion = :descripcion,
                tipo = :tipo
            WHERE id_juego = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':tipo' => $tipo,
            ':id' => $id
        ]);
    }

    public function eliminar($id)
    {
        $sql = "
            DELETE FROM juego
            WHERE id_juego = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}