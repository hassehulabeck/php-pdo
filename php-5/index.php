<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$suits = array("Hearts", "Clubs", "Spades", "Diamonds");
$ranks = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");

$deck = array();
$counter = 0;

// En metod att skapa en kortlek är att göra fyra arrayer som vardera består av 13 kort.
foreach ($suits as $suit) {
    foreach ($ranks as $rank) {
        $deck[$suit][] = $rank;
    }
}

// Hjärter 5
echo $deck["Hearts"][3] . " of " . array_keys($deck)[0];

// Klöver 8
echo $deck["Clubs"][6] . " of " . array_keys($deck)[1];


// En annan metod är att skapa en array med 52 kort.
$otherdeck = array();
$counter = 0;

foreach ($suits as $suit) {
    foreach ($ranks as $rank) {
        $otherdeck[] = array("suit" => $suit, "rank" => $rank);
    }
}

// Hjärter 5 - Hjärter har index 0, och 5 har index 3, så "index-summan" blir (0*13) + 3 = 3. 
echo "<h1>" . $otherdeck[3]['rank'] . " of " . $otherdeck[3]['suit'];

// Klöver 8 - Klöver har index 1, och 8 har index 6, så "index-summan" blir (1*13) + 6 = 19. 
echo "<p>" . $otherdeck[19]['rank'] . " of " . $otherdeck[19]['suit'];
