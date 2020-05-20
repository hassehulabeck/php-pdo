<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$personer = [
    "Dr. Cooper",
    "Mrs. Dalloway",
    "Mr. Dalloway",
    "Dr. Mabuse",
    "Col. Stephens",
    "Dr. Ashcroft",
];

if (isset($_POST['submit'])) {

    $personer[] = $_POST['person'];
}

$word = "Dr";

$doctors = [];

foreach ($personer as $person) {
    if (strpos($person, $word) !== false) {
        $person = str_replace("Dr. ", "", $person);
        $doctors[] = $person;
    }
}

function render($doctors)
{
    $returnString = "";
    foreach ($doctors as $doctor) {
        $returnString .= "<li>" . strtolower($doctor) . "</li>";
    }
    return $returnString;
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php
        foreach ($personer as $person) {
            echo "<li>" . $person;
        }
        ?>
    </ul>

    <ul>
        <?php
        echo render($doctors);
        ?>
    </ul>
    <form action="index.php" method="post">
        <label for="person">Ny person</label>
        <input type="text" name="person">
        <input type="submit" name="submit" value="Lägg till person">
    </form>
</body>

</html>