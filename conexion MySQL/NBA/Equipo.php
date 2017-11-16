<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 16/11/2017
 * Time: 19:25
 */

class Equipo
{
    private $nombre;

    public function __construct($nombre)
    {
        $this->nombre=$nombre;
    }

    public function setNombre($nuevoNombre)
    {
        $this->nombre=$nuevoNombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
}