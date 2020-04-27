<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$data = '';
$fileName = '../content.txt';

$fileHandle = fopen($fileName, 'r');

while (($char = fgetc($fileHandle)) !== false) {
    $data .= $char;
}


fclose($fileHandle);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo $data;
    ?>
</body>

</html>