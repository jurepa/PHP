
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Equipos NBA</title>
</head>
<h1><a>Equipos</a></h1>
<hr width="100%">
<body>

<table style="width:70%" border="1" align="center">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Número de Jugadores</th>
        <th>Opciones</th>
    </tr>
    <?php
    require "ConexionNBA.php";
    $conexion=new ConexionNBA();
    $equiposStatement=$conexion->getConexion()->prepare("SELECT ID,Nombre FROM Equipos");
    $equiposStatement->execute();
    $result=$equiposStatement->get_result();
    while($row=$result->fetch_assoc())
    {
        $id=$row["ID"];
        echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Nombre"] . "</td><td>Ni idea hulio</td><td><a href='deleteEquipo.php?query=$id'><input type='button' value='Eliminar'/></a> </td></tr>";
    }

    ?>
</table>
<a href="addEquipo.html"><input type="button" value="Añadir nuevo equipo"/></a>
<input type='button' value='Jugadores'/>
</body>
</html>