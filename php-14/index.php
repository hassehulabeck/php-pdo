<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// En array för båtens lastutrymme.
$cargoSpace = [];
$animals = [
    "Skallerorm", "sköldpadda", "krabba", "krokodil", "abborre", "elefant", "katt", "hjort", "hare", "bi", "ara", "ål", "vessla", "nektergal", "blåval", "antilop", "grävling", "mullvad", "ozelot", "jaguar"
];

function getNumOfPairs($animal)
{
    $counter = 0;
    $vowels = ["a", "e", "i", "o", "u", "y", "å", "ä", "ö"];
    for ($i = 0; $i < strlen($animal); $i++) {
        if (in_array($animal[$i], $vowels))
            $counter++;
    }
    return min($counter, strlen($animal) - $counter);
}

echo getNumOfPairs($animals[2]);
