<?php
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 25/10/17
 * Time: 8:39
 */
?>
<!-- FOR que recorra los dos array y muestre nombres y apellidos-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Churruca School</title>
    </head>
    <h1><a>Colegio Churruca</a></h1>
    <hr width="100%">
    <body>
    <?php
        require "Persona.php";
        $nombreAlumno=$_POST["nombreAlumno"];
        $apellidoAlumno=$_POST["apellidoAlumno"];

        // $numAlumnos=$_GET["numAlumnos"];
        for($i=0;$i<count($nombreAlumno);$i++)
        {
            $persona=new Persona($nombreAlumno[$i],$apellidoAlumno[$i]);
            $persona->mostrarDatos();
        }

    ?>
    </body>
</html>