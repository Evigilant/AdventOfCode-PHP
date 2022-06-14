<?php
    require __DIR__ .'/shared/utils/adventUtils.php';
    
    //read input file into array 
    $initArray = get_array("input.txt");  
    //convert to an array of binary values
    $arrayOfarrays = convert_array_of_binaries_to_arrayOfarray($initArray);

    //oxy
    $oxyasarray = recursive_get_max_at_each_column_in_array($arrayOfarrays);
    print_r($oxyasarray[0]);
    $oxy = convert_binary_number_array_to_decimal($oxyasarray);
    echo $oxy;
    //2781
    echo "-----------\n";

    //co2
    $co2asarray = recursive_get_min_at_each_column_in_array($arrayOfarrays);
    print_r($co2asarray);
    $co2 = convert_binary_number_array_to_decimal($co2asarray);
    echo $co2;
    //919
    echo "-----------\n";

    //lifesupport
    echo "oxy * co2: \t";
    echo $oxy * $co2;
    echo "\n";
    //2555739
        
    //example:
        // 111111010011
        // 110011001100
        // 010011111000

        //for oxygen

            //first bit -> most common first bit amongst numbers is 1
                //leaving 111111010011 & 110011001100
            //second bit -> most common second bit number amongst remaining numbers is 1
                //leaving 111111010011 & 110011001100
            //third bit -> most common third bit number has equal occurrence, (0 occurs 1, 1 occurs 1) so number is 1
                //leaving 111111010011
            //no other numbers, thus rating is: 4051

        //for co2
            //first bit -> least common first bit amongst numbers is 0
                //leaving 010011111000
            //no other numbers, thus rating is: 1272

    //finally
        //oxy * co2 = life support
        //4051 *1272 = life support
        //5725272 = life support
