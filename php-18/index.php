<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        label {
            display: block;
            font-weight: bold;
            margin-top: 1em;
        }

        input[type="checkbox"] {
            margin-left: 2em;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend>Register</legend>
        <form action="index.php" method="post">
            <label for="name">Namn</label>
            <input type="text" name="name">
            <label for="password">Lösenord</label>
            <input type="password" name="password">
            <label for="pets">Husdjur</label>
            <input type="checkbox" name="pets[]" value="dog">Hund
            <input type="checkbox" name="pets[]" value="cat">Katt
            <input type="checkbox" name="pets[]" value="snake">Orm
            <label for="gender">Kön</label>
            Man<input type="radio" name="gender" value="male">
            Kvinna<input type="radio" name="gender" value="female" checked>
            <label for="destination">Favoritresmål</label>
            <select name="destination">
                <option value="none">Inget valt</option>
                <option value="medelhavet">Medelhavet</option>
                <option value="thailand">Thailand</option>
                <option value="alps">Alperna</option>
                <option value="sweden">Sverige</option>
            </select>
            <input type="submit" name="register" value="Registrera">
        </form>
    </fieldset>

    <?php
    echo "<pre>";

    // Kolla om någon försöker logga in.
    if (isset($_POST['register'])) {
        var_dump($_POST);
    }
    echo "</pre>";

    ?>
</body>

</html>