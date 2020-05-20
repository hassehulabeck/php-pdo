<?php
session_start();

$pieces = ["L", "L", "L", "R"];

$road = [];

$road[] = array_splice($pieces, 3, 1);

var_dump($pieces);


// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'user.class.php';

$welcomeString = '';

// Kolla om någon är inloggad
if (isset($_SESSION['user'])) {
    $username = unserialize($_SESSION['user']['name']);
    $password = unserialize($_SESSION['user']['hashed']);
    $user = new User($username, $password);
} else {
    // Hårdkoda en användare
    $user = new User("rune", "secret");
}



if (isset($_POST['login'])) {
    if ($user->isAuthorized($_POST['password'])) {
        $_SESSION['user']['name'] = serialize($user->getUsername());
        $_SESSION['user']['hashed'] = serialize($user->getHashedPassword());
        $welcomeString = "<a href='welcome.php'>Welcome</a>";
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
            <label for="username">Användarnamn</label>
            <input type="text" name="username">
            <label for="password">Lösenord</label>
            <input type="password" name="password">
            <input type="submit" value="Logga in" name="login">
        </form>

    </fieldset>
    <?php echo "<p>" . $welcomeString; ?>
</body>

</html>