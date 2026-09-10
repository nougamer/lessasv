<?php

class Modulo
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }


    public function obtenerTodos()
    {
        $sql = "SELECT *
                FROM modulo
                ORDER BY id_modulo";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }


    public function obtenerPorId($id)
    {
        $sql = "SELECT *
                FROM modulo
                WHERE id_modulo = :id";

        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }


    public function crear($nombre, $descripcion)
    {
        $sql = "INSERT INTO modulo
                (nombre, descripcion)
                VALUES
                (:nombre, :descripcion)";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':descripcion', $descripcion);

        return $consulta->execute();
    }


    public function editar($id, $nombre, $descripcion)
    {
        $sql = "UPDATE modulo
                SET nombre = :nombre,
                    descripcion = :descripcion
                WHERE id_modulo = :id";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':id', $id);

        return $consulta->execute();
    }


    public function eliminar($id)
    {
        $sql = "DELETE FROM modulo
                WHERE id_modulo = :id";

        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':id', $id);

        return $consulta->execute();
    }
}