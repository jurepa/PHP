<?php
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 20/11/17
 * Time: 9:15
 */
require "ConexionNBA.php";
$conexion=new ConexionNBA();
$id=$_GET["query"];
$consulta=$conexion->getConexion()->prepare("SELECT Nombre FROM Equipos WHERE ID=$id");
$consulta->execute();
$result=$consulta->get_result();
$deleteJugadores=$conexion->getConexion()->prepare("DELETE FROM Jugadores WHERE ID_Equipo=$id");
$deleteJugadores->execute();
$deleteEquipo=$conexion->getConexion()->prepare("DELETE FROM Equipos WHERE ID=$id");
$deleteEquipo->execute();
while($row=$result->fetch_assoc())
{
    echo "El equipo ".$row["Nombre"]." y sus respectivos jugadores han sido eliminados";
}
echo "<br><br><a href=\"ListaEquipos.php\"><input type=\"button\" value=\"Volver a la lista de equipos\"/></a>";