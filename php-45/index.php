<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$data = file("boye.csv");

foreach ($data as $line) {
    echo "<p>" . $line;
}


$filehandle = fopen('boye.csv', 'r');

while (!feof($filehandle)) {
    // fgetcsv använder kommatecken för att dela av innehållet.
    /* Använd antingen citationstecken kring meningarna/raderna
    eller ställ in funktionen att använda en annan delimiter än komma. Det är i så fall det tredje argumentet.
    */
    echo "<p>" . fgetcsv($filehandle)[0];
}
