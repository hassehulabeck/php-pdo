<?php

class User
{
    private $username;
    private $hashedPassword;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    public function isAuthorized($password)
    {
        if (password_verify($password, $this->hashedPassword)) {
            return true;
        }
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }
}
