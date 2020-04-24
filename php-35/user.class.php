<?php

class User
{

    private $name;
    private $password;
    private $role;
    private $email;

    public function __construct($name, $password, $role, $email)
    {
        $this->name = $name;
        $this->password = $password;
        $this->role = $role;
        $this->email = $email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setPassword($pw)
    {
        $this->password = $pw;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
