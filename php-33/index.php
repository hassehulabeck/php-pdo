<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'product.class.php';

$acer = new Product("Acer 33s", 7490, "https://static.acer.com/up/Resource/Acer/Laptops/Aspire_5/images/20190315/Acer-Aspire-5-A515-54-main.png");

$asus = new Product("Asus 73-lke", 6399, "https://www.asus.com/media/global/products/ybcgqktzijewzzf5/P_setting_F5F5F5_1_90_end_225.png");

$hp = new Product("HP 6BB-x72", 12990, "https://www.netonnet.se/GetFile/ProductImagePrimary/dator-surfplatta/laptop/laptop-14-16-tum/hp-laptop-15s-eq0093no(1012309)_380410_1_Normal_Large.jpg");

// Lägg datorerna i en array
$laptops = [$acer, $asus, $hp];

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fräsha laptops</title>
    <style>
        section {
            display: flex;
        }

        .product {
            flex: 0 1 auto;
            border: thin solid gray;
            box-shadow: 4px 4px 9px silver;
            padding: 1em;
            margin: 0 1px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
    </style>
</head>

<body>
    <h1>Fräscha laptops</h1>
    <section>
        <?php
        foreach ($laptops as $laptop) {
            echo $laptop->render();
        }
        ?>
    </section>
</body>

</html>