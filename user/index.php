<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'user.class.php';
include_once 'admin.class.php';

$tian = new User("Tian", "secret");
$andy = new User("Andy", "non-secret");
$gun = new User("Gun", "xyz");
$admin = new Admin("Arne", "sdlfsddfjeijfei", 3);

$users = [$tian, $andy, $gun, $admin];

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    foreach ($users as $user) {
        echo "<br>" . $user->getPassword();
    }
    ?>
</body>

</html>