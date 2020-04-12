<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Skapa ett tidsobjekt av classen DateTime, samt sätt aktuell tidszon.
$tid = new DateTime("now", new DateTimeZone("Europe/Stockholm"));

// Skriv ut tiden så att vi kan kontrollera att koden är rätt.
echo $tid->format("Y-m-d H:i:s") . "<p>";

// Odd/even
if ($tid->format("i") % 2 == 0) {
    echo "even";
} else {
    echo "odd";
}

echo "<p>";

// Lösning med if-elseif-else
/* Nackdelen med if-else är att den är lite långsammare än switch-case, plus att när jag skriver som nedan, så gör vi en uträkning/jämförelse i varje del av if-else-satsen, vilket blir lite oekonomiskt... */

if ($tid->format("s") <= 20) {
    echo "0-20";
} elseif ($tid->format("s") > 20 && $tid->format("s") <= 40) {
    echo "21-40";
} else {
    echo "41-60";
}

// Lösning med case-switch
/* Switch kan hantera enkla värden ("Är $i == 1?"), men har svårare med intervall ("Är $i större än 3 men mindre än 6?"), så i det senare fallet kan man "fuska" lite genom att skriva true i själva switch-satsen, och sedan skriva intervall-villkoret i case-delen. 
Problemet i vårt fall är att switch-case-koden blir mer svårläst.
*/
echo "<p>";
$sekund = $tid->format("s");
switch (true) {
    case ($sekund <= 20):
        echo "0-20";
        break;
    case ($sekund > 20 && $sekund <= 40):
        echo "21-40";
        break;
    default:
        echo "41-60";
}
