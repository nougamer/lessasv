<?php

class JuegoPareja
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function listarPorJuego($idJuego)
    {
        $sql = "
            SELECT
                id_juego_pareja,
                id_juego,
                texto,
                imagen
            FROM juego_pareja
            WHERE id_juego = :id_juego
            ORDER BY id_juego_pareja
        ";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':id_juego' => $idJuego
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "
            SELECT
                id_juego_pareja,
                id_juego,
                texto,
                imagen
            FROM juego_pareja
            WHERE id_juego_pareja = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear(
        $idJuego,
        $texto,
        $imagen
    ) {
        $sql = "
            INSERT INTO juego_pareja (
                id_juego,
                texto,
                imagen
            )
            VALUES (
                :id_juego,
                :texto,
                :imagen
            )
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id_juego' => $idJuego,
            ':texto' => $texto,
            ':imagen' => $imagen
        ]);
    }

    public function editar(
        $id,
        $texto,
        $imagen
    ) {
        $sql = "
            UPDATE juego_pareja
            SET
                texto = :texto,
                imagen = :imagen
            WHERE id_juego_pareja = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':texto' => $texto,
            ':imagen' => $imagen,
            ':id' => $id
        ]);
    }

    public function eliminar($id)
    {
        $sql = "
            DELETE FROM juego_pareja
            WHERE id_juego_pareja = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}