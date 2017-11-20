<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 18/11/2017
 * Time: 17:46
 */
require "ConexionNBA.php";
$conexion=new ConexionNBA();
$nombreEquipo=$_POST["nombreEquipo"];
$insert=$conexion->getConexion()->prepare("INSERT INTO Equipos (Nombre)VALUES (?)");
$insert->bind_param('s',$nombreEquipo);
$insert->execute();
$consulta=$conexion->getConexion()->prepare("Select * From Equipos WHERE ID=(SELECT MAX(ID) FROM Equipos)");
$consulta->execute();
$result=$consulta->get_result();
while($row=$result->fetch_assoc())
{
    echo "ID: " . $row["ID"] . " Nombre: " . $row["Nombre"]."<br><br>";
    echo "Se añadió el nuevo equipo<br><br>";
}
$conexion->getConexion()->close();
echo "<a href=\"addEquipo.html\"><input type=\"button\" value=\"Añadir otro equipo\"/></a><br><br>";
echo "<a href=\"ListaEquipos.php\"><input type=\"button\" value=\"Volver a la lista de equipos\"/></a>";
