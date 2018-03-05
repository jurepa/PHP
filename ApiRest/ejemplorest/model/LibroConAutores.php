<?php

/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 26/02/18
 * Time: 11:52
 */
class LibroConAutores
{
    public $libro;
    public $autores;

    public function __construct($libro=null,$arrayAutores=null)
    {
        $this->libro=$libro;
        $this->autores=$arrayAutores;
    }

    /**
     * @return null
     */
    public function getLibro()
    {
        return $this->libro;
    }

    /**
     * @param null $libro
     */
    public function setLibro($libro)
    {
        $this->libro = $libro;
    }

    /**
     * @return null
     */
    public function getAutores()
    {
        return $this->autores;
    }

    /**
     * @param null $autores
     */
    public function setAutores($autores)
    {
        $this->autores = $autores;
    }


}