<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$fileName = 'table.csv';

/*
*
* DEL 1 - Läs
**/

// Läser filen med file, för den läser rad för rad och lägger i en array.
$table = file($fileName);
$modifiedTable = [];

// Dela upp varje rad i mindre delar. Spara dem som key (namnet) och value (siffran)
foreach ($table as $row) {
    $row = explode(",", $row);
    $modifiedTable[$row[0]] = (int) ($row[1]);
    // (int): Konvertera strängen till nummer
    /* Operationen ovanför skapar ett element i arrayen med key "Lucia" och value 30.
    */
}

echo "<pre>";
var_dump($modifiedTable);
echo "</pre>";

/*
*
* DEL 2 - Modifiera innehållet
**/

// Ändra värdet på Molly (+3)
$modifiedTable['Molly'] += 3;

// Sortera arrayen fallande med key=>value-strukturen intakt - arsort
arsort($modifiedTable);
// Alla varianter på arraysortering: https://www.php.net/manual/en/array.sorting.php

echo "<pre>";
var_dump($modifiedTable);
echo "</pre>";

/*
*
* DEL 3 - Skriv
**/

// Steg 1. Omvandla array till sträng.
$stringToWrite = '';
foreach ($modifiedTable as $key => $value) {
    $stringToWrite .= $key . ", " . $value . PHP_EOL;
    // Varje rad avslutas med en radmatning.
}

// Steg 2. Öppna filen för att skriva över - mode w.
$fileHandle = fopen($fileName, "w");

// Steg 3. Skriv.
fwrite($fileHandle, $stringToWrite);

// Steg 4. Close
fclose($fileHandle);
