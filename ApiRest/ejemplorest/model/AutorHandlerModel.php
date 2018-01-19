<?php
require_once "AutorModel.php";
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 17/01/18
 * Time: 10:11
 */
class AutorHandlerModel
{
    public static function insertAutor(AutorModel $autor)
    {
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $nombre=$autor->getNombre();
        $password=password_hash($autor->getPassword(),PASSWORD_DEFAULT);
        if($autor->getTipo()==null)
        {
            $tipo="";
        }
        else
        {
            $tipo=$autor->getTipo();
        }
        $prep_query=$db_connection->prepare("INSERT INTO autores(nombre,password,tipo) VALUES(?,?,?)");
        $prep_query->bind_param('sss',$nombre,$password,$tipo);
        $prep_query->execute();
        return $prep_query->affected_rows;
    }
    public static function getUltimoAutor()
    {
        $libro=null;
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $prep_query=$db_connection->prepare("SELECT ID,nombre,password,tipo FROM autores WHERE ID=(SELECT MAX(ID)FROM autores)");
        $prep_query->execute();
        $result=$prep_query->get_result();
        while($row=$result->fetch_assoc())
        {
            $autor=new AutorModel($row["nombre"],$row["password"],$row["tipo"]);
        }
        return $autor;
    }
}