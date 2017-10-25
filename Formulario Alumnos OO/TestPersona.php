<?php
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 25/10/17
 * Time: 8:45
 */
require "Persona.php";
$persona=new Persona ("Pablo", "Jarana");
$persona->mostrarDatos();
$persona->setNombre("Carlos");
$persona->setApellidos("Churruca");
$persona->mostrarDatos();
?>