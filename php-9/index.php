<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function getNumbersInfo(...$numbers)
{
    $resultat = array();

    // Kolla om det finns några tal.
    $antal = count($numbers);
    if ($antal > 0) {

        $summa = 0;
        // Räkna ut summan.
        foreach ($numbers as $number) {
            $summa += $number;
        }
        $resultat['summa'] = $summa;

        // Räkna ut medianen. Det finns ingen inbyggd metod, så börja med att sortera arrayen.
        sort($numbers);

        if ($antal % 2 == 1) {
            // Udda antal
            $median = floor($antal / 2);
            $resultat['median'] = $numbers[$median];
        } else {
            // Jämnt antal - hitta de två mittersta talen och ta medelvärdet av dem.
            $median = ($numbers[($antal / 2) - 1] + $numbers[($antal / 2)]) / 2;
            $resultat['median'] = $median;
        }
    } else {
        $resultat['summa'] = 0;
        $resultat['median'] = 0;
    }
    return $resultat;
}

$noNumbers = getNumbersInfo();
$oneNumber = getNumbersInfo(4);
$severalNumbers = getNumbersInfo(9, 2, 1, 6, -7, 3);

echo "<pre>";
var_dump($noNumbers);
var_dump($oneNumber);
var_dump($severalNumbers);
echo "</pre>";
