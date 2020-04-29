<?php
session_start();

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'konto.class.php';

if (isset($_POST['close'])) {
    // Avsluta kontot genom att ta bort värdet i sessionsvariabeln.
    unset($_SESSION['saldo']);
}

// Kolla om det finns något saldo - om inte, skapa ett nytt Konto-objekt och sätt sessions-variabeln saldo till värdet av detta konto.
// Om det finns ett saldovärde i sessions-variabeln, skapa ett nytt konto med detta värde, samt uppdatera sessions-variabelns saldovärde.
if (!isset($_SESSION['saldo'])) {
    $hans = new Konto(3000);
    $_SESSION['saldo'] = $hans->getSaldo();
} else {
    $hans = new Konto($_SESSION['saldo']);
    $_SESSION['saldo'] = $hans->getSaldo();
}

// Hämta växlingskurser
$rates = Konto::getExchangeRates();

if (isset($_POST['withdrawsubmit'])) {
    $hans->withdraw($_POST['withdraw']);
    $_SESSION['saldo'] = $hans->getSaldo();
}

if (isset($_POST['depositsubmit'])) {
    $hans->deposit($_POST['deposit']);
    $_SESSION['saldo'] = $hans->getSaldo();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bankomat</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Bankomat</h1>
    <p>Saldo: <?php echo $hans->getSaldo(); ?> SEK</p>
    <form action="index.php" method="post">
        <label for="withdraw">Uttag</label>
        <input type="number" name="withdraw">
        <input type="submit" value="Ta ut pengar" name="withdrawsubmit">
        <label for="deposit">Insättning</label>
        <input type="number" name="deposit">
        <input type="submit" value="Sätt in pengar" name="depositsubmit">
        <input type="submit" name="close" value="Avsluta konto">
    </form>
    <h2>växlingskurser</h2>
    <?php
    foreach ($rates as $valuta => $rate) {
        echo "<p>" . $valuta . ": " . $rate;
    }
    ?>
</body>

</html>