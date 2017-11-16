
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Equipos NBA</title>
</head>
<h1><a>Equipos</a></h1>
<hr width="100%">
<body>

<table style="width:100%">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Número de Jugadores</th>
    </tr>
    <?php
    require "ConexionNBA.php";
    $conexion=new ConexionNBA();
    $equiposStatement=$conexion->getConexion()->prepare("SELECT ID,Nombre FROM Equipos");
    $equiposStatement->execute();
    $result=$equiposStatement->get_result();
    while($row=$result->fetch_assoc())
    {
        echo "<tr><th>" . $row["ID"] . "</th><th>" . $row["Nombre"] . "</th><th>Ni idea hulio</th></tr>";
    }

    ?>
    <tr>
        <td>Eve</td>
        <td>Jackson</td>
        <td>94</td>
    </tr>
</table>
</body>
</html>