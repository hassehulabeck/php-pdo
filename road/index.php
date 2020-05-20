<?php

include 'driver.class.php';

$road = ["L", "L", "L", "R", "R", "R", "S", "S", "S"];
$guessMaterial = $road;
$correctGuesses = 0;

$driver = new Driver("Göran");


$driver->guess($guessMaterial, $correctGuesses, $road);



00b4591c-8f4d-4a51-aff3-30dc94b824c3
