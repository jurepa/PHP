<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 26/11/2017
 * Time: 17:28
 */
require 'ConexionNBA.php';
$idJugador=$_GET["query"];
$idEquipo=$_GET["idEquipo"];
$conexionNBA=new ConexionNBA();
$selectJugador=$conexionNBA->getConexion()->prepare("Select ");