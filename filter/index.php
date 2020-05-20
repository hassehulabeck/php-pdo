<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$epost = 'rune@se';

var_dump(filter_var($epost, FILTER_VALIDATE_EMAIL));


$url = "https:/www.sr.se";

if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
    // do something
} else {
    echo "Error";
}


$smutsigEpost = '"rune@sr.se"'; //Ibland får vi med smuts från input-fält.
echo '<p>';
echo filter_var($smutsigEpost, FILTER_SANITIZE_EMAIL);

function dela($i)
{
    if ($i == 0) {
        throw new Exception("Division med noll är inte bra", 1);
    }
    return 1 / $i;
}

try {
    dela(0); // Division med 0. Borde bli fel
} catch (Exception $err) {
    if ($err->getCode() == 1) {
        echo $err->getMessage();
    }
}
// echo dela(0);
