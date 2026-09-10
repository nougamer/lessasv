<?php

class Categoria
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    /* OBTENER TODAS LAS CATEGORÍAS */
    public function obtenerTodas()
    {
        $sql = "SELECT
                    categoria.id_categoria,
                    categoria.id_modulo,
                    categoria.nombre AS nombre_categoria,
                    categoria.descripcion,
                    modulo.nombre AS nombre_modulo
                FROM categoria
                INNER JOIN modulo
                    ON categoria.id_modulo = modulo.id_modulo
                ORDER BY modulo.id_modulo, categoria.id_categoria";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    /* OBTENER UNA CATEGORÍA POR ID */
    public function obtenerPorId($id)
    {
        $sql = "SELECT *
                FROM categoria
                WHERE id_categoria = :id";

        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    /* CREAR CATEGORÍA */
    public function crear($id_modulo, $nombre, $descripcion)
    {
        $sql = "INSERT INTO categoria
                (id_modulo, nombre, descripcion)
                VALUES
                (:id_modulo, :nombre, :descripcion)";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(':id_modulo', $id_modulo);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':descripcion', $descripcion);

        return $consulta->execute();
    }

    /* EDITAR CATEGORÍA */
    public function editar($id, $id_modulo, $nombre, $descripcion)
    {
        $sql = "UPDATE categoria
                SET id_modulo = :id_modulo,
                    nombre = :nombre,
                    descripcion = :descripcion
                WHERE id_categoria = :id";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(':id_modulo', $id_modulo);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':id', $id);

        return $consulta->execute();
    }

    /* ELIMINAR CATEGORÍA */
    public function eliminar($id)
    {
        $sql = "DELETE FROM categoria
                WHERE id_categoria = :id";

        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':id', $id);

        return $consulta->execute();
    }
}