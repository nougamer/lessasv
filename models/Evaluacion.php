<?php

class Evaluacion
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
                evaluacion.id_evaluacion,
                evaluacion.id_modulo,
                evaluacion.titulo,
                evaluacion.descripcion,
                modulo.nombre AS nombre_modulo
            FROM evaluacion
            INNER JOIN modulo
                ON evaluacion.id_modulo = modulo.id_modulo
            ORDER BY evaluacion.id_evaluacion
        ";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function obtenerPorId($id)
    {
        $sql = "
            SELECT
                id_evaluacion,
                id_modulo,
                titulo,
                descripcion
            FROM evaluacion
            WHERE id_evaluacion = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function crear($idModulo, $titulo, $descripcion)
    {
        $sql = "
            INSERT INTO evaluacion (
                id_modulo,
                titulo,
                descripcion
            )
            VALUES (
                :id_modulo,
                :titulo,
                :descripcion
            )
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id_modulo' => $idModulo,
            ':titulo' => $titulo,
            ':descripcion' => $descripcion
        ]);
    }


    public function editar($id, $idModulo, $titulo, $descripcion)
    {
        $sql = "
            UPDATE evaluacion
            SET
                id_modulo = :id_modulo,
                titulo = :titulo,
                descripcion = :descripcion
            WHERE id_evaluacion = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id_modulo' => $idModulo,
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':id' => $id
        ]);
    }


    public function eliminar($id)
    {
        $sql = "
            DELETE FROM evaluacion
            WHERE id_evaluacion = :id
        ";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}