<?php
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 25/10/17
 * Time: 9:40
 */
?>
<html>

<body>
<?php
$conexion=new mysqli('localhost','pjarana','pjarana','Ejemplo');
if ($conexion->connect_error)
{
    trigger_error("Failed to connect to MySQL: " . $conexion->connect_error, E_USER_ERROR);
}
$sql="Select * from Usuario";
$result = $conexion->query($sql);
if ($result->num_rows > 0)
{
    while($row=$result->fetch_assoc())
    {
        echo "<li>ID usuario: " . $row["ID"] . " - Nombre: " . $row["Nombre"] . " - Apellidos: " . $row["Apellidos"] . " - Edad: " . $row["Edad"] . "</li><br>";
    }
} else
{
    echo "0 results";
}
$conexion->close();
?>
</body>
</html>
