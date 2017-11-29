<?php
require "Producto.php";
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 29/11/17
 * Time: 9:17
 */
class GestionBadat
{
    private $conexion;
    private $producto;
    public function __construct()
    {
        $this->conexion=new mysqli('localhost','pjarana','pjarana','Tienda');
        if ($this->conexion->connect_error)
        {
            trigger_error("Failed to connect to MySQL: " . $this->conexion->connect_error, E_USER_ERROR);
        }
    }

    public function insertProducto($nombre,$descripcion,$precio)
    {
        $insert=$this->conexion->prepare("INSERT INTO productos (nombre,descripcion,precio) VALUES(?,?,?)");
        $insert->bind_param('ssd',$nombre,$descripcion,$precio);
        $insert->execute();

        return $insert->affected_rows;
    }

    public function searchProducto($codProducto)
    {
        $select=$this->conexion->prepare("SELECT * FROM productos WHERE cod=?");
        $select->bind_param('i',$codProducto);
        $select->execute();
        $resultado=$select->get_result();
        while($row=$resultado->fetch_assoc())
        {
            $this->producto=new Producto();
            $this->producto->setNombre($row["nombre"]);
            $this->producto->setPrecio($row["precio"]);
            $this->producto->setDescripcion($row["descripcion"]);
        }
        return $this->producto;
    }
    public function searchTodosLosProductos()
    {
        $select=$this->conexion->prepare("SELECT * FROM productos");
        $select->execute();
        $resultado=$select->get_result();
        $contador=0;
        $array=array();
        while($row=$resultado->fetch_assoc())
        {
            $this->producto=new Producto();
            $this->producto->setNombre($row["nombre"]);
            $this->producto->setPrecio($row["precio"]);
            $this->producto->setDescripcion($row["descripcion"]);
            $array[]=$this->producto;
            $contador++;
        }
        return $array;
    }
    public function getConexion()
    {
        return $this->conexion;
    }
}