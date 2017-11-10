<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Churruca School</title>
</head>
<h1><a>Colegio Churruca</a></h1>
<hr width="100%">
<body>
<form action="sentenciasPreparadas.php" method="post">
    <?php
    $numUsuarios=$_POST["numUsuarios"]; //Para volver a enviar el num de alumnos: <input type="Hidden" name="numAlumno" value="$_POST["numAlumnos"]">
    $i=0;
    while($i<$numUsuarios)
    {
        ?>
        <p>Nombre Usuario: <input type="text" name="nombreUsuario[]">         Apellidos Usuario: <input type="text" name="apellidoUsuario[]"></p><br>
        <br/><p>Edad: <input type="number" name="edadUsuario[]"></p><br/>
        <?php
        $i++;
    }

    ?>
    <input type="hidden" name="numUsuarios" value=$numUsuarios />
    <input type="submit" name="enviar">
</form>
<!-- Falta botón enviar-->
</body>
</html>