<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 20/11/2017
 * Time: 19:25
 */
require "ConexionNBA.php";
$conexion=new ConexionNBA();
$idJugador=$_GET["query"];
$idEquipo=$_GET["idEquipo"];
$consulta=$conexion->getConexion()->prepare("SELECT Nombre,Apellidos FROM Jugadores WHERE ID=$idJugador");
$consulta->execute();
$result=$consulta->get_result();
$deleteJugadores=$conexion->getConexion()->prepare("DELETE FROM Jugadores WHERE ID=$idJugador");
$deleteJugadores->execute();
while($row=$result->fetch_assoc())
{
    echo "El equipo ".$row["Nombre"]." ".$row["Apellidos"]." ha sido eliminado";
}
echo "<br><br><a href=\"ListaJugadores.php?query=$idEquipo\"><input type=\"button\" value=\"Volver a la lista de jugadores\"/></a>";