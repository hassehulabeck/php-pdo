<?php

class Admin extends User
{

    public $adminLevel;

    public function __construct($name, $password, $adminLevel = 0)
    {
        parent::__construct($name, $password);
        $this->adminLevel = $adminLevel;
    }

    public function getPassword()
    {
        return "Lösenord: " . $this->password;
    }
}
