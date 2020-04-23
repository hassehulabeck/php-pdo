<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$tid = new DateTime("now", new DateTimeZone("Europe/Stockholm"));
$then = new DateTime("2020-03-23");

echo $tid->format("Y M");

$skillnad = $tid->diff($then)->format("%R%a dagar");
echo "<p>";
echo $skillnad;

$then->add(new DateInterval('P2D'));
echo $then->format("U");
