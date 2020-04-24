<?php

class User
{

    public $name;
    protected $password;

    public function __construct($name, $password)
    {
        $this->name = $name;
        self::setPassword($password);
    }

    public function setPassword($pw)
    {
        $this->password = self::isPasswordValid($pw);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function isPasswordValid($pw)
    {
        if (strlen($pw) > 5) {
            return $pw;
        } else {
            return "skjfsdjlsfjlfdjf";
        }
    }
}
