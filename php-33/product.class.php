<?php

class Product
{
    public $name;
    public $price;
    public $image;

    public function __construct($name, $price, $image)
    {
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }

    public function render()
    {
        return '<div class="product">
            <h1>' . $this->name . '</h1>
            <img src="' . $this->image . '" width="100px">
            <p>' . $this->price . '</p></div>';
    }
}
