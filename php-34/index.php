<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'product.class.php';
include_once 'livsmedel.class.php';
include_once 'streaming.class.php';

$acer = new Product("Acer 33s", 7490, "https://static.acer.com/up/Resource/Acer/Laptops/Aspire_5/images/20190315/Acer-Aspire-5-A515-54-main.png");

$milk = new Livsmedel("Gårdsmjölk", 12.30, "https://assets.icanet.se/t_product_large_v1,f_auto/7393061000342.jpg", "2020-04-27");

$film = new Streaming("Jumanji 2", 39, "https://www.biljettkiosken.se/imgdb/biljettkiosken/alvestafolketshus/events/7944.jpg", 523, 124);

// Lägg produkterna i en array
$laptops = [$acer, $milk, $film];

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blandat sortiment</title>
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
    <h1>Olika produkter</h1>
    <section>
        <?php
        foreach ($laptops as $laptop) {
            echo $laptop->render();
        }
        ?>
    </section>
</body>

</html>