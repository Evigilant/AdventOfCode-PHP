<?php
    require __DIR__ .'/shared/utils/adventUtils.php';

    $binaryArray = get_array("input.txt");  

    $arrayOfarrays = array();

    for($i=0; $i<count($binaryArray); $i++){  
        for ($j = 0; $j < 12; $j++) {
            $arrayOfarrays[$i][$j] = $binaryArray[$i][$j];
        }
    }
    // print_r($arrayOfarrays);

    $resultArrayMax = array();
    for($x = 0; $x < 12; $x++){
        $resultArrayMax[] = find_max_common_element_in_col($arrayOfarrays, $x);
    }
    print_r($resultArrayMax);
    $maxNumber = implode("", $resultArrayMax);
    // echo implode("", $resultArray);
    $maxN = base_convert($maxNumber, 2, 10);
    echo "$maxN \n";

    $resultArrayMin = array();
    for($x = 0; $x < 12; $x++){
        $resultArrayMin[] = find_min_common_element_in_col($arrayOfarrays, $x);
    }
    print_r($resultArrayMin);
    $minNumber = implode("", $resultArrayMin);
    $minN = base_convert($minNumber, 2, 10);
    echo "$minN \n";

    echo "$maxN * $minN:\t";
    echo $maxN*$minN;
?>