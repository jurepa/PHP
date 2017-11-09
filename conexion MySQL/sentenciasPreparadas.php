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
$numUsuarios=$_POST["numUsuarios"];
$nombreUsuario=$_POST["nombreUsuario"];
$apellidoUsuario=$_POST["apellidoUsuario"];
$edadUsuario=$_POST["edadUsuario"];
for($i=0;$i<$numUsuarios;$i++)
{
    $sentenciaPreparada=$conexion->prepare('INSERT INTO Usuario (Nombre,Apellidos,Edad) VALUES (' . $nombreUsuario[$i]. ', ' .$apellidoUsuario[$i]. ', ' .$edadUsuario[$i]. ')');
    $sentenciaPreparada->execute();
    $consultaUltimoInsert=$conexion->prepare('SELECT ID,Nombre,Apellidos,Edad FROM Usuario WHERE ID=(SELECT MAX(ID)FROM Usuario)');
    $result=$consultaUltimoInsert->get_result();
    while($row=$result->fetch_assoc())
    {
        echo "<li>ID usuario: " . $row["ID"]. " - Nombre: " . $row["Nombre"]. " - Apellidos: " .$row["Apellidos"]. " - Edad: " .$row["Edad"]."</li><br>";
    }
    $i++;
}


?>