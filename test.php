<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$arr = array("father" => "Jimmy", "mother" => "Inga");

echo $arr["father"];

foreach ($arr as $key => $value) {
    echo "<p>My " . $key . "s name is " . $value;
}
