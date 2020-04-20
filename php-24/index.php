<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$educations = array("UX-designer", "Javascript-utvecklare", "IT-projektledare", ".NET-utvecklare", "Frontendutvecklare", "Javautvecklare", "Mjukvarutestare", "Webbutvecklare", "Applikationsutvecklare");

function renderEducations($educations)
{
    $renderString = "";
    foreach ($educations as $key => $education) {
        $renderString .= '<input type="checkbox" value="' . $key . '" >' . $education . '<br/>';
    }
    return $renderString;
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITHS-utbildningar</title>
</head>

<body>
    <?php
    echo renderEducations($educations);
    ?>
</body>

</html>