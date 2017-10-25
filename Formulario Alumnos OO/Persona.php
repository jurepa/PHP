<?php
class Persona{
    private $nombre;
    private $apellidos;

    public function __construct($nombre,$apellidos)
    {
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setNombre($nuevo_nombre)
    {
        $this->nombre=$nuevo_nombre;
    }
    public function setApellidos($nuevo_apellidos)
    {
        $this->apellidos=$nuevo_apellidos;
    }
    public function mostrarDatos()
    {
        echo"<p>".$this->nombre."         ".$this->apellidos."</p>";
    }

}
?>