<?php

/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 29/11/17
 * Time: 9:40
 */
class Producto
{
    private $nombre;
    private $descripcion;
    private $precio;
    private $id;
    public function __construct()
    {
        $this->id=0;
        $this->nombre="";
        $this->descripcion="";
        $this->precio=0.0;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

}