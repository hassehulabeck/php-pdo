<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$population = array(
    "Hönö" => 1504,
    "Öckerö" => 4972,
    "Björkö" => 340,
    "Grötö" => 182,
    "Kalvsund" => 31,
    "Rörö" => 59,
    "Källö-Knippla" => 16,
    "Hyppeln" => 0,
    "Hälsö" => 72,
    "Fotö" => 488
);

$informationFromSkatteverket = array(
    "Björkö" => -3,
    "Fotö" => +19,
    "Grötö" => 0,
    "Hyppeln" => 0,
    "Hälsö" => -21,
    "Hönö" => -132,
    "Kalvsund" => 2,
    "Källö-Knippla" => 0,
    "Rörö" => -1,
    "Öckerö" => 48
);

echo "<pre>";
var_dump($population);
echo "</pre>";


// Gå igenom population och jämför med key i informationFromSkatteverket

foreach ($population as $island => $antal) {
    $change = $informationFromSkatteverket[$island];
    $population[$island] = $antal + $change;
}

echo "<pre>";
var_dump($population);
echo "</pre>";
