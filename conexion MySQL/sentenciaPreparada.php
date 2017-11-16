<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 16/11/2017
 * Time: 19:06
 */
$conexion=new mysqli('localhost','pjarana','pjarana','ejemplo');
if ($conexion->connect_error)
{
    trigger_error("Failed to connect to MySQL: " . $conexion->connect_error, E_USER_ERROR);
}
$preparedStatement=$conexion->prepare("SELECT ID,Nombre,Apellidos,Edad FROM usuario WHERE ID>?");
$insertPrepared=$conexion->prepare("INSERT INTO usuario (Nombre,Apellidos,Edad) VALUES (?,?,?)");
$id=1;
$nombre="Reme";
$apellidos="Garcia Garcia";
$edad=56;
$insertPrepared->bind_param("ssi",$nombre,$apellidos,$edad);
$preparedStatement->bind_param("i",$id);
$insertPrepared->execute();
$preparedStatement->execute();
$result=$preparedStatement->get_result();

    while ($row = $result->fetch_assoc())
    {
        echo "<li>ID usuario: " . $row["ID"] . " - Nombre: " . $row["Nombre"] . " - Apellidos: " . $row["Apellidos"] . " - Edad: " . $row["Edad"] . "</li><br>";
    }
