<?php
session_start();

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['auth'])) {

    // Kontrollera om värdet i denna sessions-variabel är korrekt.

    // Börja med att ta bort ev tecken i slutet.
    $then = rtrim($_SESSION['auth'], 'A..z');

    $tid = new DateTime("now", new DateTimeZone("Europe/Stockholm"));

    if ($tid > $then) {
        echo "secret";
    }
}
