<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Variabler */
$menu = 'Meny';
$footer = 'Footer';
$headlines = ['Sten', 'Sax', 'Påse'];
$rubriker = '';
$headerColor = 'blue';

foreach ($headlines as $headline) {
    $rubriker .= '<div><h1>' . $headline . '</h1></div>';
}

$content = '<div id="content">' . $rubriker . '</div>';

$tid = new DateTime('now');
$seconds = $tid->format("s");

if ($seconds % 2 == 0) {
    $headerColor = '';
}

include 'string.php';

echo $result;
