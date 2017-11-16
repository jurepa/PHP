<?php
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 8/11/17
 * Time: 9:52
 */
$conexion=new mysqli('localhost','pjarana','pjarana','ejemplo');
if ($conexion->connect_error)
{
    trigger_error("Failed to connect to MySQL: " . $conexion->connect_error, E_USER_ERROR);
}
$numUsuarios=$_POST["numUsuarios"];
$nombreUsuario=$_POST["nombreUsuario"];
$apellidoUsuario=$_POST["apellidoUsuario"];
$edadUsuario=$_POST["edadUsuario"];
for($i=0;$i<count($edadUsuario);$i++)
{
    $insert="INSERT INTO Usuario (Nombre,Apellidos,Edad) VALUES ('$nombreUsuario[$i]','$apellidoUsuario[$i]', $edadUsuario[$i])";
    $resultinsert=$conexion->query($insert);
    echo $conexion->error;
    $consulta=('SELECT ID,Nombre,Apellidos,Edad FROM Usuario WHERE ID=(SELECT MAX(ID)FROM Usuario)');

    $result=$conexion->query($consulta);
    if($result->num_rows>0)
    {
        while ($row = $result->fetch_assoc())
        {
            echo "<li>ID usuario: " . $row["ID"] . " - Nombre: " . $row["Nombre"] . " - Apellidos: " . $row["Apellidos"] . " - Edad: " . $row["Edad"] . "</li><br>";
        }
    }
    $i++;
}


?>