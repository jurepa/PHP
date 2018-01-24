<?php
require_once "Controller.php";
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 24/01/18
 * Time: 9:08
 */
class NotAuthenticatedController extends Controller
{
    public function manage(Request $req)
    {
        $response = new Response('401', null, null, $req->getAccept());
        $response->generate();
    }
}