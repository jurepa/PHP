<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 20/11/2017
 * Time: 18:53
 */
require "ConexionNBA.php";
$conexion=new ConexionNBA();
$idEquipo=$_GET["query"];
$nombreJugador=$_POST["nombreJugador"];
$apellidoJugador=$_POST["apellidoJugador"];
$edadJugador=$_POST["edadJugador"];
$insert=$conexion->getConexion()->prepare("INSERT INTO Jugadores (Nombre,Apellidos,Edad,ID_Equipo)VALUES (?,?,?,?)");
$insert->bind_param('ssii',$nombreJugador,$apellidoJugador,$edadJugador,$idEquipo);
$insert->execute();
$consulta=$conexion->getConexion()->prepare("Select * From Jugadores WHERE ID=(SELECT MAX(ID) FROM Jugadores)");
$consulta->execute();
$result=$consulta->get_result();
while($row=$result->fetch_assoc())
{
    echo "ID: " . $row["ID"] . " Nombre: " . $row["Nombre"]." Apellidos " . $row["Apellidos"]." Edad " . $row["Edad"]."<br><br>";
    echo "Se añadió el nuevo jugador<br><br>";
}
$conexion->getConexion()->close();
echo "<a href=\"addJugador.php?query=$idEquipo\"><input type=\"button\" value=\"Añadir otro jugador\"/></a><br><br>";
echo "<a href=\"ListaJugadores.php?query=$idEquipo\"><input type=\"button\" value=\"Volver a la lista de jugadores\"/></a>";