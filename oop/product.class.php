<?php

class Product
{
    public $name;
    private $price;
    public $producer;

    public function __construct($name, $price, $producer)
    {
        $this->name = $name;
        $this->price = $price;
        $this->producer = $producer;
    }

    public function setPrice($newPrice)
    {
        $this->price = $newPrice;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class Dairy extends product
{
    public $fetthalt;

    public function __construct($name, $price, $producer, $fetthalt)
    {
        parent::__construct($name, $price, $producer);
        $this->fetthalt = $fetthalt;
    }
}
