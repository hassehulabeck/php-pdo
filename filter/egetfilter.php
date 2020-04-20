<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Funktion som kollar om ett postnummer är OK. OK = antingen fem siffror mellan 0-9 i följd, eller tre siffror + mellanslag + två siffror.
// Min regex går säkerligen att skriva snyggare. Tips: Lär dig grunderna i regex, det dyker alltid upp problem där du har nytta av det.
function postNummer(string $pnr)
{
    return preg_match('/[0-9]{5}|[0-9]{3} [0-9]{2}/', $pnr);
    /* preg_match returnerar 1 om pattern finns i subject, annars 0 (eller Error) */
}

$pnr = "12334";
var_dump(filter_var($pnr, FILTER_CALLBACK, array('options' => 'postNummer')));
