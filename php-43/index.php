<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$allTheContent;     // Hit ska vi läsa in hela filen.
$oneRowString = '';      // Hit läser vi en rad i taget, i form av en sträng
$oneRowArray;       // Hit läser vi en rad i taget, i form av en array
$fileName = '../php-42/usercontent.txt';

// Läs hela filen
$allTheContent = file($fileName);

$filehandle = fopen($fileName, 'r');

// Läs en rad i taget - sträng
while (($row = fgets($filehandle)) !== false) {
    $oneRowString .= $row;
}

// Nollställ filpekaren - så slipper jag stänga och öppna filen.
rewind($filehandle);

while (($row = fgetcsv($filehandle, 0)) !== false) {
    $oneRowArray[] = $row;
}

fclose($filehandle);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>All the content</h1>
    <?php
    foreach ($allTheContent as $row) {
        echo "<p>$row";
    }
    ?>
    <h1>One row at a time - string</h1>
    <?php echo "<p>$oneRowString"; ?>
    <h1>One row at a time - array</h1>
    <?php
    foreach ($oneRowArray as $row) {
        echo "<p>$row[0]";
    }
    ?>
</body>

</html>