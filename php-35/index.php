<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'user.class.php';

$rune = new User("Rune", "secretPW", "admin", "rune@sr.se");

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Dessa fungerar eftersom de använder publika getters och setters.
    echo "<p>" . $rune->getPassword();
    $rune->setPassword("sdifhiefehfhshhfd");
    echo "<p>" . $rune->getPassword();

    // Dessa fungerar inte eftersom de försöker komma åt private-egenskaper direkt.
    echo "<p>" . $rune->password;
    $rune->password = "tut";
    echo "<p>" . $rune->password;
    ?>
</body>

</html>