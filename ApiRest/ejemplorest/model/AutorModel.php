<?php

/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 17/01/18
 * Time: 10:14
 */
class AutorModel
{
    public $nombre;
    public $password;
    public $tipo;

    public function __construct($nombre=null,$password=null,$tipo=null)
    {
        $this->nombre=$nombre;
        $this->password=$password;
        $this->tipo=$tipo;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

}