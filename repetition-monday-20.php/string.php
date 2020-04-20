<?php

$result = '<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .blue {
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <header class="' . $headerColor . '">' . $menu . '</header>'
    . $content .
    '<footer>' . $footer . '</footer>
</body>
</html>';
