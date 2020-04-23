<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'product.class.php';

$milk = new Product("Mjölk", 13.40, "Arla");
$kaffe = new Product("Zoega Hacienda", 44, "Zoega");

echo "<p>Nuvarande pris för " . $milk->name;
echo $milk->getPrice();

echo "<p>Sänker priset till 12 kr";
$milk->setPrice(12);

echo "<p>Nytt pris för " . $milk->name;
echo $milk->getPrice();
