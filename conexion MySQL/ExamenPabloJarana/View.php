<?php
require_once "Producto.php";
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 29/11/17
 * Time: 9:53
 */
class View
{
    private $producto;

    public function __construct($producto)
    {
        $this->producto=$producto;
    }

    public function mostrarPOSTInsert()
    {
        echo "HTTP/1.1 201 Created<br/>";
        echo "Location: www.examenapi.com/producto/(maxID)<br/>"; //Donde pone max id tendríamos que buscar el id del producto insertado
        echo "Content-type: application/json;charset=utf-8<br/>";
        echo "{<br/>                                                 
                'nombre':'".$this->producto->getNombre()."',<br/> 
                'descripcion':'".$this->producto->getDescripcion()."' ,<br/>
                'precio':".$this->producto->getPrecio()."<br/> 
                }"; //Sé que lo de nombre,descripción y precio son comillas dobles, pero tenía problemas con la concatenación
    }

    public function mostrarUnProducto()
    {
        echo "HTTP/1.1 200 OK<br/>";
        echo "Content-type: application/json;charset=utf-8<br/>";
        echo "{<br/>                                                 
                'nombre':'".$this->producto->getNombre()."',<br/> 
                'descripcion':'".$this->producto->getDescripcion()."' ,<br/>
                'precio':".$this->producto->getPrecio()."<br/> 
                }"; //Sé que lo de nombre,descripción y precio son comillas dobles, pero tenía problemas con la concatenaci
    }

    public function mostrarTodosLosProductos($array)
    {
        echo "HTTP/1.1 200 OK<br/>";
        echo "Content-type: application/json;charset=utf-8<br/>";
        for($i=0;$i<count($array);$i++)
        {
            $this->producto=$array[$i];
            echo "{<br/>                                                 
                'nombre':'" . $this->producto->getNombre() . "',<br/> 
                'descripcion':'" . $this->producto->getDescripcion() . "' ,<br/>
                'precio':" . $this->producto->getPrecio() . "<br/> 
                }<br/>";
        }
    }
}