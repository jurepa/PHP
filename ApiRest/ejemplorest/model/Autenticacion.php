<?php
require_once "AutenticacionHandlerModel.php";
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

    function  __construct($user,$password)
    {
        $this->user=$user;
        $this->password=$password;
        $this->autenticar();
    }

    function autenticar()
    {
        $autenticado=false;
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

}