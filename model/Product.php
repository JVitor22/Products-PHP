<?php


abstract class Product
{
    private $code;
    private $price;
    
    public function __construct($code,$price)
    {
        $this->code = $code;
        $this->price = $price;
    }
    
    
    public function getCode()
    {
        return $this->code;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

   
    
}

