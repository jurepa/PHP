
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Equipos NBA</title>
</head>
<h1><a>Jugadores</a></h1>
<hr width="100%">
<body>

<table style="width:70%" border="1" align="center">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Edad</th>
        <th>Foto</th>
        <th>Opciones</th>
    </tr>
    <?php
    require "ConexionNBA.php";
    $idEquipo=$_GET["query"];
    $conexion=new ConexionNBA();
    $equiposStatement=$conexion->getConexion()->prepare("SELECT ID,Nombre,Apellidos,Edad FROM Jugadores WHERE ID_Equipo=$idEquipo");
    $equiposStatement->execute();
    $result=$equiposStatement->get_result();
    while($row=$result->fetch_assoc())
    {
        $id=$row["ID"];
        echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Nombre"] . "</td><td>".$row["Apellidos"]."</td><td>".$row["Edad"]."</td><td>No tiene</td><td><a href='deleteJugador.php?query=$id&idEquipo=$idEquipo'><input type='button' value='Eliminar'/></a></td></tr>";
    }
    $conexion->getConexion()->close();

echo"</table>";
echo "<a href='addJugador.php?query=$idEquipo'><input type='button' value='Añadir nuevo jugador'/></a>";
echo "<a href='ListaEquipos.php'><input type='button' value='Volver a la lista de equipos'/></a>";
    ?>
</body>
</html>