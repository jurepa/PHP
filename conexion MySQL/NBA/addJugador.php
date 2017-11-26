<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Equipos NBA</title>
</head>
<h1><a>Jugadores</a></h1>
<hr width="100%">
<body>
<?php
$idEquipo=$_GET["query"];

echo "<form method='post' action='insertJugador.php?query=$idEquipo'>";
    ?>
    <fieldset>
        <legend>Nuevo Jugador</legend>
        <br>Nombre:  <input type="text" required="required" name="nombreJugador"><br>
        <br>Apellidos: <input type="text" required="required" name="apellidoJugador"/><br>
        <br>Edad: <input type="number" required="required" min="18" name="edadJugador"/><br>
        <br>Foto: <input type="image" name="fotoJugador"/> <br>
        <input type="submit" value="Enviar"/>
    </fieldset>
</form>

</body>
</html>