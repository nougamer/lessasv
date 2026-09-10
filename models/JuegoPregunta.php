<?php

class JuegoPregunta
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
                id_juego_pregunta,
                id_juego,
                pregunta,
                opcion_a,
                opcion_b,
                opcion_c,
                opcion_d,
                respuesta_correcta,
                imagen
            FROM juego_pregunta
            WHERE id_juego = :id_juego
            ORDER BY id_juego_pregunta
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
                id_juego_pregunta,
                id_juego,
                pregunta,
                opcion_a,
                opcion_b,
                opcion_c,
                opcion_d,
                respuesta_correcta,
                imagen
            FROM juego_pregunta
            WHERE id_juego_pregunta = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear(
        $idJuego,
        $pregunta,
        $opcionA,
        $opcionB,
        $opcionC,
        $opcionD,
        $respuestaCorrecta,
        $imagen
    ) {
        $sql = "
            INSERT INTO juego_pregunta (
                id_juego,
                pregunta,
                opcion_a,
                opcion_b,
                opcion_c,
                opcion_d,
                respuesta_correcta,
                imagen
            )
            VALUES (
                :id_juego,
                :pregunta,
                :opcion_a,
                :opcion_b,
                :opcion_c,
                :opcion_d,
                :respuesta_correcta,
                :imagen
            )
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id_juego' => $idJuego,
            ':pregunta' => $pregunta,
            ':opcion_a' => $opcionA,
            ':opcion_b' => $opcionB,
            ':opcion_c' => $opcionC,
            ':opcion_d' => $opcionD,
            ':respuesta_correcta' => $respuestaCorrecta,
            ':imagen' => $imagen
        ]);
    }

    public function editar(
        $id,
        $pregunta,
        $opcionA,
        $opcionB,
        $opcionC,
        $opcionD,
        $respuestaCorrecta,
        $imagen
    ) {
        $sql = "
            UPDATE juego_pregunta
            SET
                pregunta = :pregunta,
                opcion_a = :opcion_a,
                opcion_b = :opcion_b,
                opcion_c = :opcion_c,
                opcion_d = :opcion_d,
                respuesta_correcta = :respuesta_correcta,
                imagen = :imagen
            WHERE id_juego_pregunta = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':pregunta' => $pregunta,
            ':opcion_a' => $opcionA,
            ':opcion_b' => $opcionB,
            ':opcion_c' => $opcionC,
            ':opcion_d' => $opcionD,
            ':respuesta_correcta' => $respuestaCorrecta,
            ':imagen' => $imagen,
            ':id' => $id
        ]);
    }

    public function eliminar($id)
    {
        $sql = "
            DELETE FROM juego_pregunta
            WHERE id_juego_pregunta = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}