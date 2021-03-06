<?php
session_start();

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$userName = "adam";
$password = "trello";

// Kolla om någon försöker logga in.
if (isset($_POST['login'])) {
    if ($_POST['name'] == $userName && $_POST['password'] == $password) {
        $tid = new DateTime("now", new DateTimeZone("Europe/Stockholm"));
        $slump = mt_rand(0, 25);
        $slumptecken = chr(65 + $slump);
        $_SESSION['auth'] = $tid->format("U") . $slumptecken;
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <fieldset>
        <legend>Login</legend>
        <form action="index.php" method="post">
            <label for="name">Namn</label>
            <input type="text" name="name">
            <label for="password">Lösenord</label>
            <input type="password" name="password">
            <input type="submit" name="login" value="Logga in">
        </form>
    </fieldset>
</body>

</html>