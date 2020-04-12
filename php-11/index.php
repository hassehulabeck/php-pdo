<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'functions.php';

echo renderTop("Exempelsida");

$info = array(
    "Tel: 08-353928",
    "Mail: info@sr.se",
    "Besöksadress: Kungsg. 5a",
    "twitter: @frontpartner",
    "linkedIn: frontpartner@linkedIn",
    "IBAN: 449932994003"
);
echo renderBottom($info);
