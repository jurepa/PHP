<?php
require "Peticion.php";
require "GestionBadat.php";
require  "View.php";
require_once "Producto.php";
/**
 ANOTACIONES:
 * Usuario Badat: pjarana
 * Contraseña: pjarana
 *
 * Los insert los he hecho validado con POST, el put no he tenido tiempo, pero es validar dos cosillas más, no obstante
 * si pones PUT te saltará un mensaje de error HTTP/1.1 400 Bad Request
 * Me gustaría haber validado todo pero no me ha sido posible, aunque mínimamente esta validado todo
 * Creo que funciona al completo
 */
class Controller
{
    private $peticion;
    private $gestionBadat;
    private $producto;
    private $view;

    public function __construct($peticion)
    {
        $this->peticion=$peticion;
        $this->gestionBadat=new GestionBadat();
        $this->producto=new Producto();
        if($this->peticion->getVerb()=="POST") //Si queremos hacer un insert con POST
        {
            if($this->peticion->getBody1() == "nombre" && //Si la petición es correcta creamos producto
                $this->peticion->getBody2() == "descripcion" &&
                $this->peticion->getBody3() == "precio")
             {
                $this->producto->setNombre($this->peticion->getValue1());
                $this->producto->setDescripcion($this->peticion->getValue2());
                $this->producto->setPrecio($this->peticion->getValue3());

                if (($this->peticion->getUrl1() == "producto" && $this->peticion->getUrl2() == "") ||
                    ($this->peticion->getUrl2() == "producto" && $this->peticion->getUrl3() == "") ||
                    $this->peticion->getUrl3() == "producto")
                 {
                    //Si las filas afectadas tras la inserción han sido mayor a 0, imprimimos.
                    if ($this->gestionBadat->insertProducto($this->producto->getNombre(), $this->producto->getDescripcion(), $this->producto->getPrecio()) > 0) {
                        $this->view = new View($this->producto);
                        $this->view->mostrarPOSTInsert();
                    }
                }
                else
                {
                    echo "HTTP/1.1 400 Bad Request";
                }
             }
            else //Si la petición no es correcta
            {
                echo "HTTP/1.1 400 Bad Request";
            }
        }
        //Si no, si lo que queremos es consultar
        else if($this->peticion->getVerb()=="GET")
        {
            //Si la peticion es de formato /producto/loquesea (No sabía controlar que fuera un número), buscamos producto y mostramos
            if(($this->peticion->getUrl1()=="producto"&&$this->peticion->getUrl2()!="")||
            ($this->peticion->getUrl2()=="producto"&&$this->peticion->getUrl3()!=""))
            {
                $this->producto=$this->gestionBadat->searchProducto($this->peticion->getUrl2());
                $this->view=new View($this->producto);
                $this->view->mostrarUnProducto();
            }
            else if($this->peticion->getUrl1()=="producto"&&$this->peticion->getUrl2()==""||
                $this->peticion->getUrl2()=="producto"&&$this->peticion->getUrl3()==""||
                $this->peticion->getUrl3()=="producto")
            {
                $array=$this->gestionBadat->searchTodosLosProductos();
                $this->view=new View($this->producto);
                $this->view->mostrarTodosLosProductos($array);
            }
            else
            {
                echo "HTTP/1.1 400 Bad Request";
            }
        }
        else
        {
            echo"HTTP/1.1 400 Bad Request";
        }
    }

    /**
     * @return mixed
     */
    public function getPeticion()
    {
        return $this->peticion;
    }




}