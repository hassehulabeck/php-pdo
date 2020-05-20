<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'driver.class.php';


function buildRoad()
{
    $road = [];
    $pieces = ["L", "L", "L", "L", "R", "R", "R", "R", "S", "S", "S", "S"];
    $direction = 0; // Noll är rakt fram, minus är vänster och plus är höger.

    while (count($pieces) > 0) {
        $slump = mt_rand(0, count($pieces) - 1);
        // Kolla om biten är lämplig.
        if ($slump == 'L') {
            $direction--;
        }
        if ($slump == 'R') {
            $direction++;
        }
        // Villkoret funkar inte.
        if ($direction > -3 && $direction < 3) {
            $road[] = array_splice($pieces, $slump, 1)[0];
        }
    }

    return $road;
}

$tid = new DateTime('now', new DateTimeZone("Europe/Stockholm"));
echo "<p>" . $tid->format('Y-m-d H:i:s');


$road = buildRoad();
echo "<p>";
foreach ($road as $bits) {
    echo $bits . "-";
}
echo "</p>";

$johnny = new Driver("Johnny");

while ($johnny->getProgressMeter() < 12) {
    echo $johnny->guess($road[$johnny->getProgressMeter()]);
}
