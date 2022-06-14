<?php

    function get_array($filename)
    {
        //open file
        $inputFile = fopen($filename, "r") or die("Unable to open file!");

        $fileArray= array();
        while(!feof($inputFile)){
            $textPerLine=fgets($inputFile);
            $fileArray[]=$textPerLine;
        }
        fclose($inputFile);

        // echo "get_array:";
        // print_r($fileArray);

        return $fileArray;
    }
    function convert_binary_number_array_to_decimal($array){
        //assuming format is: array [[],[],[],[],[],[],[],[],[],[],[],[]];
        $numberasbinary = implode("", $array[0]);
        return base_convert($numberasbinary, 2, 10);
    }
    function convert_array_of_binaries_to_arrayOfarray($array){
        
        $arrayOfarrays = array();
        for($i=0; $i<count($array); $i++){  
            for ($j = 0; $j < 12; $j++) {
                $arrayOfarrays[$i][$j] = $array[$i][$j];
            }
        }
        return $arrayOfarrays;
    }
    function get_array_deliminited_by_space($filename){
        //open file
        $inputFile = fopen($filename, "r") or die("Unable to open file!");

        $fileArray[] = null;
        while(($line=fgets($inputFile))!= false){
            $fileArray[] = explode(' ', $line);
        }
        return $fileArray;
    }
    function get_move_command_array_from_filename($filename){
        $inputArray = get_array_deliminited_by_space($filename);

        $arrayOfCommands[] = null;
    
        foreach($inputArray as $mov){
            $arrayOfCommands[] = new MoveCommand($mov[0], $mov[1]);
        }
        return $arrayOfCommands;
    }
    function countHowManyNextIsLargerInList($depths)
    {
        $incrCounter = 0;
        $lastDepth = null;
        foreach ($depths as $depth) {
            if (is_null($lastDepth)) {
                //no previous entry, assume start
                $lastDepth = (int)$depth;
            } elseif ((int)$lastDepth < (int)$depth) {
                //assume increase
                $incrCounter++;
            }
            $lastDepth = (int)$depth;
        }
        //count is off by 1, because at the start it was null < start which was true
        return $incrCounter - 1;
    }
    function find_max_common_element_in_col($array, $column){
        $zeroCount = 0;
        $oneCount = 0;

        $evalArray = array();
        $evalArray["0"] = $zeroCount;
        $evalArray["1"] = $oneCount;

        for($x = 0; $x < count($array); $x++){
            if((int)$array[$x][$column] == 0){
                $zeroCount++;
                $evalArray["0"] = $zeroCount;
            }
            elseif((int)$array[$x][$column] == 1){
                $oneCount++;
                $evalArray["1"] = $oneCount;
            }
        }
        if((int)$evalArray["1"] == $evalArray["0"]){ return 1; }
        else{ return array_search(max($evalArray), $evalArray); }
    }
    function find_min_common_element_in_col($array, $column){
        $zeroCount = 0;
        $oneCount = 0;

        $evalArray = array();
        $evalArray["0"] = $zeroCount;
        $evalArray["1"] = $oneCount;

        for($x = 0; $x < count($array); $x++){
            if((int)$array[$x][$column] == 0){
                $zeroCount++;
                $evalArray["0"] = $zeroCount;
            }
            elseif((int)$array[$x][$column] == 1){
                $oneCount++;
                $evalArray["1"] = $oneCount;
            }
        } 
        if((int)$evalArray["1"] == $evalArray["0"]){ return 0; }
        else{ return array_search(min($evalArray), $evalArray); }
    }
    function filter_array($array, $pos, int $value){
        $retArray = array();

        //foreach binary number in the array
        foreach($array as $binnum){
            //if this bit num is equal to the value we're seeking, save the binary number into the return list
            if((int)$binnum[$pos] == $value){
                $retArray[] = $binnum;
            }
        }
        return $retArray;
    }
    function recursive_get_max_at_each_column_in_array($array){
        $input = $array;
        $zeroCount = 0;
        $oneCount = 0;
        $key = 0;
        $evalArray["0"] = $zeroCount;
        $evalArray["1"] = $oneCount;

        //foreach of the 12 bit positions
        for($i = 0; $i < 12; $i++){
            //foreach full binary number while at that bit position
            for($j = 0; $j < count($input); $j++){
                //get the bit value for this binary number
                $row = $input[$j][$i];

                if((int)$row == 0){
                     $zeroCount++;
                     $evalArray["0"] = $zeroCount;
                }
                else {
                    $oneCount++;
                    $evalArray["1"] = $oneCount;
                }
            }

            if((int)$evalArray["0"] > (int)$evalArray["1"]){ $key = 0; }
            elseif((int)$evalArray["0"] == (int)$evalArray["1"]){ $key = 1;}
            else{ $key = 1; }

            //if more than 1 number left continue; otherwise - stop; this is the rating value
            if(count($input) > 1){ $input = filter_array($input, $i, $key); 
                $zeroCount = 0;
                $oneCount = 0;
            }
            else{ break;}
        }
        return $input;
    }
    function recursive_get_min_at_each_column_in_array($array){
        $input = $array;
        $zeroCount = 0;
        $oneCount = 0;
        $key = 0;
        $evalArray["0"] = $zeroCount;
        $evalArray["1"] = $oneCount;
        //for each of the 12 columns
        for($i = 0; $i < 12; $i++){
            //for each string while at that column
            for($j = 0; $j < count($input); $j++){
                $row = $input[$j][$i];
                if((int)$row == 0){
                     $zeroCount++;
                     $evalArray["0"] = $zeroCount;
                }
                else {
                    $oneCount++;
                    $evalArray["1"] = $oneCount;
                }
            }

            if((int)$evalArray["0"] < (int)$evalArray["1"]){ $key = 0; }
            elseif((int)$evalArray["0"] == (int)$evalArray["1"]){ $key = 0;}
            else{ $key = 1; }
            if(count($input) > 1){ $input = filter_array($input, $i, $key); 
                $zeroCount = 0;
                $oneCount = 0;
            }
            else{ break;}
        }
        return $input;
    }
?>