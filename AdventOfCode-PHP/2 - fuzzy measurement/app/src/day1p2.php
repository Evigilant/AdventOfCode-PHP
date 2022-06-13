<html>

<head>
    <title> Advent of Code 2021 - Day 1p2- Depth Measurement </title>
</head>

<body>
    <?php
    require __DIR__ . '/utils/adventUtils.php';

    $depths = getArray("input.txt");
    
    $incrCounter = 0;
    $index = 0;
    $depthSets[] = null;
    while($index < sizeof($depths)-2){
        $depthSets[] = $depths[$index]+$depths[$index+1]+$depths[$index+2]; 
        $index++;
    }
    echo countHowManyNextIsLargerInList($depthSets);

?>
</body>

</html>