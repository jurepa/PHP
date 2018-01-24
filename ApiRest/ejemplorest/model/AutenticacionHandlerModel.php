<?php
require_once "Autenticacion.php";
require_once "AutorModel.php";
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 24/01/18
 * Time: 8:43
 */
class AutenticacionHandlerModel
{
    public static function getUsuarioPorNombreYContraseña(Autenticacion $a)
    {
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $user=$a->getUser();
        $prep_query=$db_connection->prepare("SELECT nombre,password,tipo FROM autores WHERE nombre=?");
        $prep_query->bind_param('s',$user);
        $prep_query->execute();
        $result=$prep_query->get_result();
        $filasDevueltas=$result->num_rows;
        if($filasDevueltas<=0)
        {
            $autor=null;
        }
        else
        {
            while ($row = $result->fetch_assoc())
            {
                $autor = new AutorModel($row["nombre"], $row["password"], $row["tipo"]);
            }
        }
        return $autor;
    }
}