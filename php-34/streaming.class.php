<?php

class Streaming extends Product
{

    public $filesize;
    public $length;

    public function __construct($name, $price, $image, $filesize, $length)
    {
        parent::__construct($name, $price, $image);
        $this->filesize = $filesize;
        $this->length = $length;
    }
    public function render()
    {
        return '<div class="product">
            <h1>' . $this->name . '</h1>
            <img src="' . $this->image . '" width="100px">
            <p>' . $this->price . ':-</p>
            <p>Längd (minuter): ' . $this->length . '</div>';
    }
}
