<?php

class Pregunta
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function listarPorEvaluacion($idEvaluacion)
    {
        $sql = "
            SELECT
                id_pregunta,
                id_evaluacion,
                pregunta,
                opcion_a,
                opcion_b,
                opcion_c,
                opcion_d,
                respuesta_correcta
            FROM pregunta
            WHERE id_evaluacion = :id_evaluacion
            ORDER BY id_pregunta
        ";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':id_evaluacion' => $idEvaluacion
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $sql = "
            SELECT
                id_pregunta,
                id_evaluacion,
                pregunta,
                opcion_a,
                opcion_b,
                opcion_c,
                opcion_d,
                respuesta_correcta
            FROM pregunta
            WHERE id_pregunta = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear(
        $idEvaluacion,
        $pregunta,
        $opcionA,
        $opcionB,
        $opcionC,
        $opcionD,
        $respuestaCorrecta
    ) {
        $sql = "
            INSERT INTO pregunta (
                id_evaluacion,
                pregunta,
                opcion_a,
                opcion_b,
                opcion_c,
                opcion_d,
                respuesta_correcta
            )
            VALUES (
                :id_evaluacion,
                :pregunta,
                :opcion_a,
                :opcion_b,
                :opcion_c,
                :opcion_d,
                :respuesta_correcta
            )
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id_evaluacion' => $idEvaluacion,
            ':pregunta' => $pregunta,
            ':opcion_a' => $opcionA,
            ':opcion_b' => $opcionB,
            ':opcion_c' => $opcionC,
            ':opcion_d' => $opcionD,
            ':respuesta_correcta' => $respuestaCorrecta
        ]);
    }

    public function editar(
        $id,
        $pregunta,
        $opcionA,
        $opcionB,
        $opcionC,
        $opcionD,
        $respuestaCorrecta
    ) {
        $sql = "
            UPDATE pregunta
            SET
                pregunta = :pregunta,
                opcion_a = :opcion_a,
                opcion_b = :opcion_b,
                opcion_c = :opcion_c,
                opcion_d = :opcion_d,
                respuesta_correcta = :respuesta_correcta
            WHERE id_pregunta = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':pregunta' => $pregunta,
            ':opcion_a' => $opcionA,
            ':opcion_b' => $opcionB,
            ':opcion_c' => $opcionC,
            ':opcion_d' => $opcionD,
            ':respuesta_correcta' => $respuestaCorrecta,
            ':id' => $id
        ]);
    }

    public function eliminar($id)
    {
        $sql = "
            DELETE FROM pregunta
            WHERE id_pregunta = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}
