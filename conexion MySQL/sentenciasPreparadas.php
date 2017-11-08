<?php
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 8/11/17
 * Time: 9:52
 */
$conexion=new mysqli('localhost','pepito','qq','Ejemplo');
if ($conexion->connect_error)
{
    trigger_error("Failed to connect to MySQL: " . $conexion->connect_error, E_USER_ERROR);
}

$sentenciaPreparada=$conexion->prepare('SELECT ID,Nombre,Apellidos,Edad FROM Usuario WHERE ID>?');
$sentenciaPreparada->bind_param('i',$numID);
$numID=1;
$sentenciaPreparada->execute();
$result=$sentenciaPreparada->get_result();
while($row=$result->fetch_assoc())
{
    echo "<li>ID usuario: " . $row["ID"]. " - Nombre: " . $row["Nombre"]. " - Apellidos: " .$row["Apellidos"]. " - Edad: " .$row["Edad"]."</li><br>";
}


?>