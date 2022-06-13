<html>

<head>
    <title> Advent of Code 2021 - Day 1 - Depth Measurement </title>
</head>

<body>
    <?php
    require __DIR__ . '/utils/adventUtils.php';

    $depths = getArray("input.txt");
    echo countHowManyNextIsLargerInList($depths);
    // echo $array;
    ?>
</body>

</html>