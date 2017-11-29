<?php
/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 29/11/17
 * Time: 8:45
 */
require "Controller.php";
require_once "Peticion.php";
$peticion=new Peticion();
$verb=$_POST["verb"];
$url1=$_POST["url1"];
$url2=$_POST["url2"];
$url3=$_POST["url3"];
$body1=$_POST["body1"];
$body2=$_POST["body2"];
$body3=$_POST["body3"];
$body4=$_POST["body4"];
$body5=$_POST["body5"];
$value1=$_POST["value1"];
$value2=$_POST["value2"];
$value3=$_POST["value3"];
$value4=$_POST["value4"];
$value5=$_POST["value5"];
$peticion->setVerb($verb);
$peticion->setUrl1($url1);
$peticion->setUrl2($url2);
$peticion->setUrl3($url3);
$peticion->setBody1($body1);
$peticion->setBody2($body2);
$peticion->setBody3($body3);
$peticion->setBody4($body4);
$peticion->setBody5($body5);
$peticion->setValue1($value1);
$peticion->setValue2($value2);
$peticion->setValue3($value3);
$peticion->setValue4($value4);
$peticion->setValue5($value5);
$controller=new Controller($peticion);