<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function renderTop($title)
{
    return '<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $title . '</title>
</head>
<body><h1>'
        . $title . '</h1>';
}

function renderBottom($info)
{
    $returString = '<footer><ul>';

    // Slumpa fram tre info-ord
    for ($i = 0; $i < 3; $i++) {
        $slump = mt_rand(0, count($info) - 1);
        // Plocka ut ett element ur arrayen. Resultatet från array_splice är i form av en array, därför [0] i slutet.
        $returString .= '<li>' . array_splice($info, $slump, 1)[0];
    }
    $returString .= "</ul></footer></body></html>";
    return $returString;
}
