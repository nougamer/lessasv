<?php

class Leccion
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }


    /* OBTENER TODAS LAS LECCIONES */
    public function obtenerTodas()
    {
        $sql = "SELECT
                    leccion.id_leccion,
                    leccion.id_categoria,
                    leccion.titulo,
                    leccion.descripcion,
                    leccion.significado,
                    leccion.imagen,
                    leccion.video,
                    leccion.orden,
                    categoria.nombre AS nombre_categoria,
                    modulo.nombre AS nombre_modulo
                FROM leccion
                INNER JOIN categoria
                    ON leccion.id_categoria = categoria.id_categoria
                INNER JOIN modulo
                    ON categoria.id_modulo = modulo.id_modulo
                ORDER BY
                    modulo.id_modulo,
                    categoria.id_categoria,
                    leccion.orden";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }


    /* BUSCAR UNA LECCIÓN */
    public function obtenerPorId($id)
    {
        $sql = "SELECT *
                FROM leccion
                WHERE id_leccion = :id";

        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }


    /* CREAR LECCIÓN */
    public function crear(
        $id_categoria,
        $titulo,
        $descripcion,
        $significado,
        $imagen,
        $video,
        $orden
    ) {

        $sql = "INSERT INTO leccion
                (
                    id_categoria,
                    titulo,
                    descripcion,
                    significado,
                    imagen,
                    video,
                    orden
                )
                VALUES
                (
                    :id_categoria,
                    :titulo,
                    :descripcion,
                    :significado,
                    :imagen,
                    :video,
                    :orden
                )";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(':id_categoria', $id_categoria);
        $consulta->bindParam(':titulo', $titulo);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':significado', $significado);
        $consulta->bindParam(':imagen', $imagen);
        $consulta->bindParam(':video', $video);
        $consulta->bindParam(':orden', $orden);

        return $consulta->execute();
    }


    /* EDITAR LECCIÓN */
    public function editar(
        $id,
        $id_categoria,
        $titulo,
        $descripcion,
        $significado,
        $imagen,
        $video,
        $orden
    ) {

        $sql = "UPDATE leccion
                SET id_categoria = :id_categoria,
                    titulo = :titulo,
                    descripcion = :descripcion,
                    significado = :significado,
                    imagen = :imagen,
                    video = :video,
                    orden = :orden
                WHERE id_leccion = :id";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(':id_categoria', $id_categoria);
        $consulta->bindParam(':titulo', $titulo);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':significado', $significado);
        $consulta->bindParam(':imagen', $imagen);
        $consulta->bindParam(':video', $video);
        $consulta->bindParam(':orden', $orden);
        $consulta->bindParam(':id', $id);

        return $consulta->execute();
    }


    /* ELIMINAR LECCIÓN */
    public function eliminar($id)
    {
        $sql = "DELETE FROM leccion
                WHERE id_leccion = :id";

        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(':id', $id);

        return $consulta->execute();
    }
}