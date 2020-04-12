<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$countries = array(
    "sweden" => "+46",
    "finland" => "+358",
    "denmark" => "+45",
    "norway" => "+47"
);
$codeStr = "";
if (isset($_POST['submitCode'])) {
    $codeStr = $_POST['countrycode'];
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landskoder - telefon</title>
</head>

<body>
    <h1>Välj land</h1>
    <form action="index.php" method="post">
        <select name="countrycode">
            <option value="0">None selected</option>
            <?php
            foreach ($countries as $key => $code) {
                if ($codeStr == $code) {
                    $selektor = " selected";
                } else {
                    $selektor = "";
                }
                echo '<option value="' . $code . '" ' . $selektor . '>' . $key . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Välj" name="submitCode">
    </form>

    <?php
    echo "<p>" . $codeStr;
    ?>
</body>

</html>