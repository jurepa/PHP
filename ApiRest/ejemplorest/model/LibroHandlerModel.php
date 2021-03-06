<?php

require_once "ConsLibrosModel.php";
require_once "LibroModel.php";
require_once "LibroConAutores.php";
class LibroHandlerModel
{

    public static function getLibro($id,$query_string=null)
    {
        $listaLibros = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();


        //IMPORTANT: we have to be very careful about automatic data type conversions in MySQL.
        //For example, if we have a column named "cod", whose type is int, and execute this query:
        //SELECT * FROM table WHERE cod = "3yrtdf"
        //it will be converted into:
        //SELECT * FROM table WHERE cod = 3
        //That's the reason why I decided to create isValid method,
        //I had problems when the URI was like libro/2jfdsyfsd

        $valid = self::isValid($id);

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true || $id == null) {
            if($query_string==null) {
                $query = "SELECT " . \ConstantesDB\ConsLibrosModel::COD . ","
                    . \ConstantesDB\ConsLibrosModel::TITULO . ","
                    . \ConstantesDB\ConsLibrosModel::PAGS . " FROM " . \ConstantesDB\ConsLibrosModel::TABLE_NAME;
            }
            else if(isset($query_string['minpag'])&&isset($query_string['maxpag']))
            {
                $query="SELECT " . \ConstantesDB\ConsLibrosModel::COD . ","
                    . \ConstantesDB\ConsLibrosModel::TITULO . ","
                    . \ConstantesDB\ConsLibrosModel::PAGS . " FROM " . \ConstantesDB\ConsLibrosModel::TABLE_NAME." WHERE "
                    .\ConstantesDB\ConsLibrosModel::PAGS . ">=? and ".\ConstantesDB\ConsLibrosModel::PAGS."<=?";
            }
            else if(isset($query_string['minpag'])&&!isset($query_string['maxpag']))
            {
                $query="SELECT " . \ConstantesDB\ConsLibrosModel::COD . ","
                    . \ConstantesDB\ConsLibrosModel::TITULO . ","
                    . \ConstantesDB\ConsLibrosModel::PAGS . " FROM " . \ConstantesDB\ConsLibrosModel::TABLE_NAME." WHERE "
                    .\ConstantesDB\ConsLibrosModel::PAGS . ">=?";
            }
            else if(!isset($query_string['minpag'])&&isset($query_string['maxpag']))
            {
                $query="SELECT " . \ConstantesDB\ConsLibrosModel::COD . ","
                    . \ConstantesDB\ConsLibrosModel::TITULO . ","
                    . \ConstantesDB\ConsLibrosModel::PAGS . " FROM " . \ConstantesDB\ConsLibrosModel::TABLE_NAME." WHERE "
                    .\ConstantesDB\ConsLibrosModel::PAGS . "<=?";
            }


            if ($id != null) {
                $query = $query . " WHERE " . \ConstantesDB\ConsLibrosModel::COD . " = ?";
            }

            $prep_query = $db_connection->prepare($query);

            //IMPORTANT: If we do not want to expose our primary keys in the URIS,
            //we can use a function to transform them.
            //For example, we can use hash_hmac:
            //http://php.net/manual/es/function.hash-hmac.php
            //In this example we expose primary keys considering pedagogical reasons

            if ($id != null) {
                $prep_query->bind_param('s', $id);
            }
            else if($id==null&&$query_string!=null&&isset($query_string['minpag'])&&isset($query_string['maxpag']))
            {
                $minpag=$query_string['minpag'];
                $maxpag=$query_string['maxpag'];
                $prep_query->bind_param('ii',$minpag,$maxpag);
            }
            else if($id==null&&isset($query_string['minpag'])&&!isset($query_string['maxpag']))
            {
                $minpag=$query_string['minpag'];
                $prep_query->bind_param('i',$minpag);
            }
            else if($id==null&&!isset($query_string['minpag'])&&isset($query_string['maxpag']))
            {
                $maxpag=$query_string['maxpag'];
                $prep_query->bind_param('i',$maxpag);
            }

            $prep_query->execute();
            $listaLibrosConAutores = array();

            //IMPORTANT: IN OUR SERVER, I COULD NOT USE EITHER GET_RESULT OR FETCH_OBJECT,
            // PHP VERSION WAS OK (5.4), AND MYSQLI INSTALLED.
            // PROBABLY THE PROBLEM IS THAT MYSQLND DRIVER IS NEEDED AND WAS NOT AVAILABLE IN THE SERVER:
            // http://stackoverflow.com/questions/10466530/mysqli-prepared-statement-unable-to-get-result

            $result=$prep_query->get_result();
            while ($row1=$result->fetch_assoc()) {
                $tit=$row1["titulo"];
                $cod=$row1["codigo"];
                $pag=$row1["numpag"];
                $listaAutores=array();
                $libroConAutor=new LibroConAutores();
                $tit = utf8_encode($tit);
                $libro = new LibroModel($cod, $tit, $pag);
                $query="SELECT Nombre FROM autores AS A INNER JOIN AutoresLibros AS AL ON A.ID=AL.ID_Autor WHERE AL.COD_Libro=?";
                $prep_query->prepare($query);
                $prep_query->bind_param('i',$cod);
                $prep_query->execute();
                $result=$prep_query->get_result();
                while($row=$result->fetch_assoc())
                {

                    $autor=new AutorModel();
                    $autor->setNombre($row["Nombre"]);
                    $listaAutores[]=$autor;
                }
                $libroConAutor->setLibro($libro);
                $libroConAutor->setAutores($listaAutores);
                $listaLibrosConAutores[]=$libroConAutor;
            }

//            $result = $prep_query->get_result();
//            for ($i = 0; $row = $result->fetch_object(LibroModel::class); $i++) {
//
//                $listaLibros[$i] = $row;
//            }
        }
        $db_connection->close();

        return $listaLibrosConAutores;
    }

    public static function insertLibro(LibroModel $libro)
    {
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $titulo=$libro->getTitulo();
        $numpag=$libro->getNumpag();
        $prep_query=$db_connection->prepare("INSERT INTO libros(titulo,numpag) VALUES(?,?)");
        $prep_query->bind_param('si',$titulo,$numpag);
        $prep_query->execute();
        return $prep_query->affected_rows;
    }
    /*public static function insertLibroConId(LibroModel $libro)
    {
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $titulo=$libro->getTitulo();
        $numpag=$libro->getNumpag();
        $id=$libro->getCodigo();
        $prep_query=$db_connection->prepare("INSERT INTO libros(codigo,titulo,numpag) VALUES(?,?,?)");
        $prep_query->bind_param('isi',$id,$titulo,$numpag);
        $prep_query->execute();
        return $prep_query->affected_rows;
    }*/

    public static function getUltimoLibro()
    {
        $libro=null;
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $prep_query=$db_connection->prepare("SELECT codigo,titulo,numpag FROM libros WHERE codigo=(SELECT MAX(codigo)FROM libros)");
        $prep_query->execute();
        $result=$prep_query->get_result();
        while($row=$result->fetch_assoc())
        {
            $libro=new LibroModel($row["codigo"],$row["titulo"],$row["numpag"]);
        }
        return $libro;
    }

    public static function deleteLibro($id)
    {
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $prep_query=$db_connection->prepare("DELETE FROM libros WHERE codigo=?");
        $prep_query->bind_param('i',$id);
        $prep_query->execute();

        return $prep_query->affected_rows;
    }

    public static function buscarID($id)
    {
        $existe=false;
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $prep_query=$db_connection->prepare("SELECT codigo FROM libros WHERE codigo=?");
        $prep_query->bind_param('i',$id);
        $prep_query->execute();
        $result=$prep_query->get_result();
        while($row=$result->fetch_assoc())
        {
            if(isset($row["codigo"]))
            {
                $existe=true;
            }

        }
        return $existe;
    }

    public static function updateLibro(LibroModel $libro)
    {
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $titulo=$libro->getTitulo();
        $numPag=$libro->getNumpag();
        $codigo=$libro->getCodigo();
        $prep_query=$db_connection->prepare("Update libros SET titulo=?,numpag=? WHERE codigo=?");
        $prep_query->bind_param('sii',$titulo,$numPag,$codigo);
        $prep_query->execute();

        return $prep_query->affected_rows;

    }

    //returns true if $id is a valid id for a book
    //In this case, it will be valid if it only contains
    //numeric characters, even if this $id does not exist in
    // the table of books
    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id)) {
            $res = true;
        }
        return $res;
    }

}