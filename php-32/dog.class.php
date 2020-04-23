<?php

class Dog
{
    public $name;
    public $race;
    private $age;

    public function __construct($name, $race, $age)
    {
        $this->name = $name;
        $this->race = $race;
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function increaseAge()
    {
        $this->age++;
    }
}
