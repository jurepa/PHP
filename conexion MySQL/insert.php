<?php
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 25/10/17
 * Time: 9:41
 */
?>
<html>

<body>
<?php
$conexion=new mysqli('localhost','pepito','qq','Ejemplo');
if ($conexion->connect_error)
{
    trigger_error("Failed to connect to MySQL: " . $conexion->connect_error, E_USER_ERROR);
}
$sql="INSERT INTO Usuario (ID,Nombre,Apellidos,Edad) VALUES(NULL, 'Molthen','Wood5',24)";
$consultaDelInsert="SELECT ID,Nombre,Apellidos,Edad FROM Usuario";
//$resultInsert=$conexion->query($sql);
$result = $conexion->query($consultaDelInsert);
if ($result->num_rows > 0)
{
    while($row=$result->fetch_assoc())
    {
        echo "<li>ID usuario: " . $row["ID"]. " - Nombre: " . $row["Nombre"]. " - Apellidos: " .$row["Apellidos"]. " - Edad: " .$row["Edad"]."</li><br>";
    }
} else
{
    echo "0 results";
}
$conexion->close();
?>
</body>
</html>
