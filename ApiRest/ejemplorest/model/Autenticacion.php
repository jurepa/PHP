<?php
use Firebase\JWT\JWT as JWT;
require_once "AutenticacionHandlerModel.php";
$upOne=realpath(__DIR__.'/..');
require_once  $upOne.'/phpjwtmaster/src/JWT.php';
require_once  $upOne.'/phpjwtmaster/src/SignatureInvalidException.php';
require_once  $upOne.'/phpjwtmaster/src/BeforeValidException.php';
require_once  $upOne.'/phpjwtmaster/src/ExpiredException.php';
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 24/01/18
 * Time: 8:30
 */
class Autenticacion
{
    private $user;
    private $password;
    private $autenticado;
    private $key="jarana";
    private $token;
    private $tokenValidado;
    private $jwt;

    function  __construct($user=null,$password=null,$token=null)
    {

        $this->user=$user;
        $this->password=$password;
        $this->token=$token;
        if($this->user!=null&&$this->password!=null)
        {
            $this->autenticar();
        }
        else
        {
            $this->validarToken();
        }
    }

    function autenticar()
    {
        $autor=AutenticacionHandlerModel::getUsuarioPorNombreYContraseña($this);
        if($autor==null||$autor->getTipo()=="normal"||!password_verify($this->password,$autor->getPassword()))
        {
            $this->setAutenticado(false);
        }
        else
        {
            $this->setAutenticado(true);
        }
    }

    function validarToken()
    {
        try
        {
            $data = JWT::decode($this->token, $this->key, array('HS256'));
            $this->tokenValidado=true;
        }catch(Exception $exception)
        {
            $this->tokenValidado=false;
        }

    }

    /**
     * @return mixed
     */
    public function getJwt()
    {
        return $this->jwt;
    }

    /**
     * @param mixed $jwt
     */
    public function setJwt($jwt)
    {
        $this->jwt = $jwt;
    }



    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAutenticado()
    {
        return $this->autenticado;
    }

    /**
     * @param mixed $autenticado
     */
    public function setAutenticado($autenticado)
    {
        $this->autenticado = $autenticado;
    }

    /**
     * @return mixed
     */
    public function getTokenValidado()
    {
        return $this->tokenValidado;
    }

    /**
     * @param mixed $tokenValidado
     */
    public function setTokenValidado($tokenValidado)
    {
        $this->tokenValidado = $tokenValidado;
    }

}