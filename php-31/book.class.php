<?php

class Book
{
    public $title;
    public $author;
    public $yearPublished;

    public function __construct($title, $author, $yearPublished)
    {
        $this->title = $title;
        $this->author = $author;
        $this->yearPublished = $yearPublished;
    }

    public function getInfo()
    {
        return $this->title . " (" . $this->yearPublished . "), " . $this->author;
    }
}
