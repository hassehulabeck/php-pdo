<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$week = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

// Repetition 1
for ($i = 0; $i < count($week); $i++) {
    echo "<p>" . $week[$i];
}

// Repetetion 2
foreach ($week as $index => $day) {
    echo "<p>" . $index . ": " . $day;
}

// Repetition 3
$counter = 0;
while (count($week) > 0) {
    echo "<p>" . array_splice($week, $counter, 1);
    $counter++;
}
