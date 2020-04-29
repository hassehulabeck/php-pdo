<?php
session_start();

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'todo.class.php';

// Hämta data
if (isset($_SESSION['todos'])) {
    $todos = unserialize($_SESSION['todos']);
}

if (isset($_POST['createtask'])) {
    $todo = new Todo($_POST['newtask']);
    $todos[] = $todo;

    // Spara data
    $_SESSION['todos'] = serialize($todos);
}

if (isset($_GET['todo'])) {
    $index = $_GET['todo'];
    $todos[$index]->setStatus();

    // Spara data
    $_SESSION['todos'] = serialize($todos);
}

if (isset($_POST['deletelist'])) {
    $todos = [];
    unset($_SESSION['todos']);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos</title>
</head>

<body>
    <ul>
        <?php
        foreach ($todos as $key => $todo) {
            $isDoneString = $todo->getStatus() ? "is done" : "is not done";
            echo "<li>" . $todo->getTaskName() . " " . $isDoneString . " <a href='index.php?todo=" . $key . "'>x</a>";
        }
        ?>
    </ul>
    <form action="index.php" method="post">
        <label for="newtask">Ny uppgift</label>
        <input type="text" name="newtask">
        <input type="submit" value="Skapa uppgift" name="createtask">
        <input type="submit" value="Släng listan" name="deletelist">
    </form>
</body>

</html>