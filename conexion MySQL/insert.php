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
$conexion=new mysqli('localhost','pjarana','pjarana','Ejemplo');
if ($conexion->connect_error)
{
    trigger_error("Failed to connect to MySQL: " . $conexion->connect_error, E_USER_ERROR);
}
$sql="INSERT INTO Boletos  VALUES((SELECT MAX(ID)FROM Boletos)+1,'2029-08-18 13:00:00', 20)";
$consultaDelInsert="SELECT * FROM BOLETOS WHERE ID=(SELECT MAX(ID) FROM BOLETOS)";
$resultInsert=$conexion->query($sql);
$result = $conexion->query($consultaDelInsert);
if ($result->num_rows > 0)
{
    while($row=$result->fetch_assoc())
    {
        echo "<li>ID boleto: " . $row["ID"]. " - Fecha_Sorteo: " . $row["Fecha_Sorteo"]. " - Precio: " .$row["Precio"]. "</li><br>";
    }
} else
{
    echo "0 results";
}
$conexion->close();
?>
</body>
</html>
