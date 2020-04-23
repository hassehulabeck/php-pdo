<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'book.class.php';

$mobyDick = new Book("Moby Dick", "Herman Melville", 1877);

echo $mobyDick->getInfo();
