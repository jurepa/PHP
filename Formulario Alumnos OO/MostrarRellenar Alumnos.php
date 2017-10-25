<?php
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 25/10/17
 * Time: 8:43
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Churruca School</title>
    </head>
    <h1><a>Colegio Churruca</a></h1>
    <hr width="100%">
    <body>
        <form action="MostrarArray.php" method="post">
            <?php

            $numAlumnos=$_POST["numAlumnos"]; //Para volver a enviar el num de alumnos: <input type="Hidden" name="numAlumno" value="$_POST["numAlumnos"]">
            $i=0;
            while($i<$numAlumnos)
            {
                ?>
                <p>Nombre Alumno <input type="text" name="nombreAlumno[]">         Apellido Alumno <input type="text" name="apellidoAlumno[]"></p><br>
                <?php
                $i++;
            }

            ?>
            <input type="submit" name="enviar">
        </form>
    <!-- Falta botón enviar-->
    </body>
</html>