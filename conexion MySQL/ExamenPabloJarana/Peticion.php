<?php

/**
 * Created by PhpStorm.
 * User: pjarana
 * Date: 29/11/17
 * Time: 8:46
 */
class Peticion
{
    private $verb;
    private $url1;
    private $url2;
    private $url3;
    private $body1;
    private $body2;
    private $body3;
    private $body4;
    private $body5;
    private $value1;
    private $value2;
    private $value3;
    private $value4;
    private $value5;

    public function __construct()
    {
        $this->verb="";
        $this->url1="";
        $this->url2="";
        $this->url3="";
        $this->body1="";
        $this->body2="";
        $this->body3="";
        $this->body4="";
        $this->body5="";
        $this->value1="";
        $this->value2="";
        $this->value3="";
        $this->value4="";
        $this->value5="";
    }

    /**
     * @return string
     */
    public function getValue1()
    {
        return $this->value1;
    }

    /**
     * @param string $value1
     */
    public function setValue1($value1)
    {
        $this->value1 = $value1;
    }

    /**
     * @return string
     */
    public function getValue2()
    {
        return $this->value2;
    }

    /**
     * @param string $value2
     */
    public function setValue2($value2)
    {
        $this->value2 = $value2;
    }

    /**
     * @return string
     */
    public function getValue3()
    {
        return $this->value3;
    }

    /**
     * @param string $value3
     */
    public function setValue3($value3)
    {
        $this->value3 = $value3;
    }

    /**
     * @return string
     */
    public function getValue4()
    {
        return $this->value4;
    }

    /**
     * @param string $value4
     */
    public function setValue4($value4)
    {
        $this->value4 = $value4;
    }

    /**
     * @return string
     */
    public function getValue5()
    {
        return $this->value5;
    }

    /**
     * @param string $value5
     */
    public function setValue5($value5)
    {
        $this->value5 = $value5;
    }

    /**
     * @return string
     */
    public function getVerb()
    {
        return $this->verb;
    }

    /**
     * @param string $verb
     */
    public function setVerb($verb)
    {
        $this->verb = $verb;
    }

    /**
     * @return string
     */
    public function getUrl1()
    {
        return $this->url1;
    }

    /**
     * @param string $url1
     */
    public function setUrl1($url1)
    {
        $this->url1 = $url1;
    }

    /**
     * @return string
     */
    public function getUrl2()
    {
        return $this->url2;
    }

    /**
     * @param string $url2
     */
    public function setUrl2($url2)
    {
        $this->url2 = $url2;
    }

    /**
     * @return string
     */
    public function getUrl3()
    {
        return $this->url3;
    }

    /**
     * @param string $url3
     */
    public function setUrl3($url3)
    {
        $this->url3 = $url3;
    }

    /**
     * @return string
     */
    public function getBody1()
    {
        return $this->body1;
    }

    /**
     * @param string $body1
     */
    public function setBody1($body1)
    {
        $this->body1 = $body1;
    }

    /**
     * @return string
     */
    public function getBody2()
    {
        return $this->body2;
    }

    /**
     * @param string $body2
     */
    public function setBody2($body2)
    {
        $this->body2 = $body2;
    }

    /**
     * @return string
     */
    public function getBody3()
    {
        return $this->body3;
    }

    /**
     * @param string $body3
     */
    public function setBody3($body3)
    {
        $this->body3 = $body3;
    }

    /**
     * @return string
     */
    public function getBody4()
    {
        return $this->body4;
    }

    /**
     * @param string $body4
     */
    public function setBody4($body4)
    {
        $this->body4 = $body4;
    }

    /**
     * @return string
     */
    public function getBody5()
    {
        return $this->body5;
    }

    /**
     * @param string $body5
     */
    public function setBody5($body5)
    {
        $this->body5 = $body5;
    }


}