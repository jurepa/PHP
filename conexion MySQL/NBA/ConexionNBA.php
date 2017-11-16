<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 16/11/2017
 * Time: 19:58
 */

class ConexionNBA
{
    private $conexion;
    public function __construct()
    {
        $this->conexion=new mysqli('localhost','pjarana','pjarana','ejemplo');
        if ($this->conexion->connect_error)
        {
            trigger_error("Failed to connect to MySQL: " . $this->conexion->connect_error, E_USER_ERROR);
        }
    }

    public function getConexion()
    {
        return $this->conexion;
    }
}