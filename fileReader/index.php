<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$fileName = 'table.csv';
$tempTable = [];
$tableString = '';

// Läs in befintlig fil.
$data = file($fileName);

echo '<pre>';
echo '<p>Före modifikation</p>';
var_dump($data);
echo '</pre>';

// Modifiera tabellen
foreach ($data as $row) {
    $player = explode(",", $row);
    $tempTable[$player[0]] = (int) ($player[1]);
}

$tempTable['Diana'] += 4;
arsort($tempTable);


echo '<pre>';
echo '<p>Efter modifikation</p>';
var_dump($tempTable);
echo '</pre>';



// Spara tabellen, dvs skriv till fil.
$fileHandle = fopen($fileName, 'w');

foreach ($tempTable as $key => $value) {
    $tableString .= $key . ', ' . $value . PHP_EOL;
}

echo fwrite($fileHandle, $tableString);

fclose($fileHandle);
