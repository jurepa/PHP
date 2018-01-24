<?php
require_once "Controller.php";
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 17/01/18
 * Time: 10:10
 */
class AutorController extends Controller
{
    public function managePostVerb(Request $request)
    {

        $params_body=$request->getBodyParameters();
        if($params_body->tipo==null)
        {
            $params_body->tipo="normal";
        }
        $nombre=$params_body->nombre;
        $password=$params_body->password;
        $tipo=$params_body->tipo;
        $autor=new AutorModel($nombre,$password,$tipo);
        $exito= AutorHandlerModel::insertAutor($autor);
        if($exito=1)
        {
            $code=201;
            $autorInsertado=AutorHandlerModel::getUltimoAutor();
            $response=new Response($code,null,$autorInsertado,$request->getAccept());
        }
        else
        {
            $code=400;
            $response=new Response($code,null,null,$request->getAccept());
        }

        $response->generate();

    }
}