<?php

class Livsmedel extends Product
{

    public $bestBeforeDate;

    public function __construct($name, $price, $image, $bestBeforeDate)
    {
        parent::__construct($name, $price, $image);
        $this->bestBeforeDate = new DateTime($bestBeforeDate);
    }
    public function render()
    {
        return '<div class="product">
            <h1>' . $this->name . '</h1>
            <img src="' . $this->image . '" width="100px">
            <p>' . $this->price . ' SEK</p>
            <p>' . $this->bestBeforeDate->format("Y-m-d") . '</div>';
    }
}
