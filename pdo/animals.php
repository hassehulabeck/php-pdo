<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'secret.php';   // Lägg username och pw i den, se till att filen står med i .gitignore så att du inte laddar upp den till github. 

include 'animal.class.php';

// Koppla upp till databasen
$dbh = new PDO('mysql:host=localhost; dbname=zoo', $user, $pw);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// // Skicka en query till databasen.
// foreach ($dbh->query("SELECT * FROM animals") as $row) {
//     echo "<p>" . $row['name'] . "(" . $row['specimens'] . ")";
// }

$sth = $dbh->prepare("
SELECT name, specimens, categories.category
FROM animals 
JOIN categories ON categories.id = animals.category_id
WHERE animals.id = :id");
try {
    $sth->execute([":id" => 10]);
    $animal = $sth->fetchObject("Animal");
} catch (PDOException $err) {
    echo $err->getMessage();
}
echo "<p>Djurets namn: " . $animal->name;
echo "<p>Antal: " . $animal->specimens;
echo "<p>Kategori: " . $animal->category;

// // Lägg till ett djur i ett try/catch-block

// // Först lite kod så att vår database-handle kan kasta fel.
// $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// // Därefter ett try/catch-block. 
// try {
//     echo ($dbh->exec("
//     INSERT INTO animals 
//     (name, specimens, category, category_id) 
//     VALUES 
//     ('skallerorm', 4,'Däggdjur', 52)
//     "));
//     // Databasen kommer att ge fel när jag inte skickar med värden som måste finnas (category)
//     echo "<p>" . $dbh->lastInsertId();
// } catch (PDOException $err) {
//     echo $err->getCode() . ": " . $err->getMessage();
// }
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="animals.php" method="post">
        <?php
        echo $animal->getForm();
        ?>
        <input type="submit" value="Send" name="submitAnimal">
    </form>
</body>

</html>