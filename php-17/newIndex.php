<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$greeting = "No";

if (isset($_POST['submit'])) {

    if ($_POST['username'] == "Hans" && $_POST['password'] == "tut") {
        $greeting = "Hello";
    }
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skicka data</title>
</head>

<body>
    <h1><?php echo $greeting; ?></h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Namn</label>
        <input type="text" name="username" value="<?php echo $_POST['username'] ?? ''; ?>">
        <label for="password">Lösenord</label>
        <input type="password" name="password">
        <input type="submit" value="Login" name="submit">
    </form>
</body>

</html>