<?php

class Dashboard
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }


    public function totalUsuarios()
    {
        $sql = "SELECT COUNT(*) FROM usuario";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchColumn();
    }


    public function totalModulos()
    {
        $sql = "SELECT COUNT(*) FROM modulo";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchColumn();
    }


    public function totalCategorias()
    {
        $sql = "SELECT COUNT(*) FROM categoria";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchColumn();
    }


    public function totalLecciones()
    {
        $sql = "SELECT COUNT(*) FROM leccion";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchColumn();
    }


    public function totalEvaluaciones()
    {
        $sql = "SELECT COUNT(*) FROM evaluacion";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchColumn();
    }


    public function totalJuegos()
    {
        $sql = "SELECT COUNT(*) FROM juego";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchColumn();
    }


    public function ultimasLecciones()
    {
        $sql = "
            SELECT
                leccion.id_leccion,
                leccion.titulo,
                leccion.orden,
                categoria.nombre AS categoria
            FROM leccion
            INNER JOIN categoria
                ON leccion.id_categoria = categoria.id_categoria
            ORDER BY leccion.id_leccion DESC
            LIMIT 5
        ";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}