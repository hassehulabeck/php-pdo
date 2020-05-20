<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['submit'])) {

    // Skapa filnamnet.
    $tid = new DateTime('now', new DateTimeZone('Europe/Stockholm'));
    $fileName = $tid->format('Y-m-d') . "_" . $_POST['username'] . ".txt";

    $filehandle = fopen($fileName, 'a');
    fwrite($filehandle, $_POST['message']);
    fclose($filehandle);
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <label for="username">Namn</label>
        <input type="text" name="username">
        <textarea name="message" cols="30" rows="10"></textarea>
        <input type="submit" value="Spara" name="submit">
    </form>
</body>

</html>