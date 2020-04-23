<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'dog.class.php';

$wilson = new Dog("Wilson", "Foxterrier", 4);

echo $wilson->getAge();
$wilson->increaseAge();
echo "<p>" . $wilson->getAge();

// När egenskapen är private går det inte att komma åt eller ändra den direkt.
echo $wilson->age;  // Ska ge fel.

// Däremot går det att komma åt och ändra de publika egenskaperna.
$wilson->name = "Horace";
echo $wilson->name;
