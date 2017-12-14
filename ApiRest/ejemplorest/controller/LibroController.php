<?php

require_once "Controller.php";


class LibroController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaLibros = null;
        $id = null;
        $response = null;
        $code = null;

        //if the URI refers to a libro entity, instead of the libro collection
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }


        $listaLibros = LibroHandlerModel::getLibro($id);

        if ($listaLibros != null) {
            $code = '200';

        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, $listaLibros, $request->getAccept());
        $response->generate();

    }

    public function managePostVerb(Request $request)
    {

            $params_body=$request->getBodyParameters();
            $libro=new LibroModel(0,$params_body->titulo,$params_body->numpag);
            $exito= LibroHandlerModel::insertLibro($libro);
            if($exito=1)
            {
                $code=201;
                $libroInsertado=LibroHandlerModel::getUltimoLibro();
                $response=new Response($code,null,$libroInsertado,$request->getAccept());
            }
            else
            {
                $code=400;
                $response=new Response($code,null,null,$request->getAccept());
            }

            $response->generate();

    }

    public function manageDeleteVerb(Request $request)
    {
        $id=null;
        $code=null;
        if(isset($request->getUrlElements()[2]))
        {
            $id=$request->getUrlElements()[2];
        }
        $borrado=LibroHandlerModel::deleteLibro($id);

        if($borrado==1)
        {
            $code=200;
        }
        else
        {
            $code=404;
        }
        $response=new Response($code,null,null,null);
        $response->generate();
    }

}