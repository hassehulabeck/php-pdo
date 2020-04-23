<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// En variant med for-loop
function getLottoByFor()
{
    $lottoRad = array();
    for ($i = 0; $i < 7; $i++) {
        $slumptal = mt_rand(1, 35);
        if (in_array($slumptal, $lottoRad)) {
            // Minska iteratorn $i manuellt, så att vi gör ett varv till.
            $i--;
        } else {
            $lottoRad[] = $slumptal;
        }
    }
    sort($lottoRad);
    return $lottoRad;
}

// En variant med while-loop
function getLottoByWhile($favorit = null, $avoid = null)
{
    $lottoRad = array();
    if ($favorit != null) {
        $lottoRad[] = $favorit;
    }
    while (count($lottoRad) < 7) {
        $slumptal = mt_rand(1, 35);
        if (!in_array($slumptal, $lottoRad)) {
            if ($slumptal != $avoid) {
                $lottoRad[] = $slumptal;
            }
        }
    }
    sort($lottoRad);
    return $lottoRad;
}

echo "<pre>";
var_dump(getLottoByWhile(4, 25));
var_dump(getLottoByFor());
echo "</pre>";
